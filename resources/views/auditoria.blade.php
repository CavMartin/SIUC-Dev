@extends('layouts.app')

@section('title', 'Formulario de carga')

@section('content')

<x-header :links="[
    ['title' => 'Página de inicio', 'url' => route('dashboard')]
]" />

@endsection
