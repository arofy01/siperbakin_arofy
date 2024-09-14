@extends('layouts.user.app')

@section('judul-halaman', 'Dashboard Desa')
@section('keterangan-halaman', 'Halaman ini untuk melihat rangkuman-rangkuman entitas bagi Desa.')

@push('css')
    @livewireStyles
   
@endpush


{{-- Bagian Navbar --}}

@section('navbar')
   
        @livewire('user.desa.dashboardnav')
    
@endsection


{{-- Bagian Content --}}

@section('content')
    @livewire('user.desa.dashboard')
@endsection



@push('java-script')
    @livewireScripts
@endpush
