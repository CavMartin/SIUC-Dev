<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use phpCas;

class StgCas
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // STG CAS config
        $cas_host = env('CAS_HOST', 'dsso.santafe.gob.ar');
        $cas_context = env('CAS_CONTEXT','/service-auth');
        $cas_port = (int)env('CAS_PORT',443);
        $client_service_name = env('CAS_CLIENT_SERVICE_NAME','http://localhost:8000');

        // Initialize phpCAS
        phpCAS::client(CAS_VERSION_2_0, $cas_host, $cas_port, $cas_context, $client_service_name);
        phpCAS::setLang(PHPCAS_LANG_SPANISH);

        // For production use set the CA certificate that is the issuer of the cert
        // on the CAS server and uncomment the line below
        // phpCAS::setCasServerCACert($cas_server_ca_cert_path);

        // For quick testing you can disable SSL validation of the CAS server.
        // THIS SETTING IS NOT RECOMMENDED FOR PRODUCTION.
        // VALIDATING THE CAS SERVER IS CRUCIAL TO THE SECURITY OF THE CAS PROTOCOL!
        phpCAS::setNoCasServerValidation();

        // phpCAS::logout(); // Logout

        // Forzar autenticación CAS en cada solicitud
        if (phpCAS::isAuthenticated()) {
            $user = phpCAS::getUser(); // ID del usuario
            $attributes = phpCAS::getAttributes(); // Atributos adicionales (si están disponibles)
        } else {
            phpCAS::forceAuthentication(); // Forzar autenticación si no lo está
        }
        
        return $next($request);
    }
}
