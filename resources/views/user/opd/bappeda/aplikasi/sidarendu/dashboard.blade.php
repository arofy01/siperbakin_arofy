@extends('layouts.user.app')

@section('judul-halaman', 'Sidarendu')


@push('css')
    @livewireStyles
    
@endpush


@section('navbar')
   
        @livewire('user.opd.bappeda.aplikasi.sidarendu.dashboardnav')
   
@endsection
 

@section('content')
   
        @livewire('user.opd.bappeda.aplikasi.sidarendu.dashboard')
   
@endsection

@push('java-script')
    @livewireScripts
@endpush


