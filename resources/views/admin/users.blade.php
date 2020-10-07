@extends('layouts.home')
@section('header')
@include('admin.navegacion')
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('web.admin_header_usuarios')
        </h2>
    </div>
</header>
@endsection
@section('content')
    <div class="container">
        <p>Usuarios</p>
    </div>
@endsection
