@extends('layouts.user.app')

@section('judul-halaman', 'Dashboard TK')
@section('keterangan-halaman', 'Halaman ini untuk melihat rangkuman-rangkuman entitas bagi OPD.')

@push('css')
    @livewireStyles
   
@endpush


@section('navbar')
   
        @livewire('user.tk.dashboardnav')
   
@endsection


@section('content')

    @livewire('user.tk.dashboard')

@endsection

@push('java-script')
    @livewireScripts

    
@endpush
