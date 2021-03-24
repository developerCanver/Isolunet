@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background: #033c73 !important; color: #FFFFFF !important;">{{ __('Adminsitracion de Usuario') }}</div>
                <div class="card-body">
                   @include('administracion_usuarios.usuarios.list')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- @stack('css') --}}
@push('scripts')
	<script src="{{ asset('vendors/fontawesome-5.14.0/js/all.js') }}" ></script>
    
@endpush 

@push('css')
	<link rel="stylesheet" href="{{ asset('vendors/fontawesome-5.14.0/css/all.css') }}">
    
@endpush 