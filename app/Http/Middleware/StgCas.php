<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StgCas
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $cas_simulate = env('CAS_SIMULATE', false); // Variable para activar la simulación

        // Si CAS_SIMULATE está activo y existe el archivo JSON, simulamos la autenticación
        if ($cas_simulate && file_exists(storage_path('app/cas_user_data.json'))) {
            $userData = json_decode(file_get_contents(storage_path('app/cas_user_data.json')), true);

            // Simular autenticación estableciendo las variables de sesión de phpCAS
            $_SESSION['phpCAS']['user'] = $userData['user'];
            $_SESSION['phpCAS']['attributes'] = $userData['attributes'];
            $user = $userData['user'];
            $attributes = $userData['attributes'];

            // Hacer que los datos del usuario estén disponibles en la solicitud o sesión de Laravel
            $request->attributes->set('user', $user);
            $request->attributes->set('attributes', $attributes);

            // Continuar con la solicitud sin inicializar phpCAS
            return $next($request);
        }

        // STG CAS config (solo si no estamos simulando)
        $cas_host = env('CAS_HOST', 'dsso.santafe.gob.ar');
        $cas_context = env('CAS_CONTEXT', '/service-auth');
        $cas_port = (int)env('CAS_PORT', 443);
        $client_service_name = env('CAS_CLIENT_SERVICE_NAME', 'http://localhost:8000');

        // Initialize phpCAS solo si la simulación no está activa
        \phpCAS::client(CAS_VERSION_2_0, $cas_host, $cas_port, $cas_context, $client_service_name);
        \phpCAS::setLang(PHPCAS_LANG_SPANISH);
        \phpCAS::setNoCasServerValidation();

        // Intentar autenticación CAS si la simulación no está activa
        if (\phpCAS::isAuthenticated()) {
            $user = \phpCAS::getUser();
            $attributes = \phpCAS::getAttributes();

            // Guardar los datos en un archivo JSON para su uso en simulación
            $userData = [
                'user' => $user,
                'attributes' => $attributes,
            ];
            file_put_contents(storage_path('app/cas_user_data.json'), json_encode($userData));

            // Hacer que los datos del usuario estén disponibles en la solicitud
            $request->attributes->set('user', $user);
            $request->attributes->set('attributes', $attributes);
        } else {
            \phpCAS::forceAuthentication();
        }

        return $next($request);
    }
}
