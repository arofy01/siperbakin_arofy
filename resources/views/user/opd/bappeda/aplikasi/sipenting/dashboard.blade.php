@extends('layouts.user.app')

@section('judul-halaman', 'Sipenting')
@section('keterangan-halaman', 'Halaman ini untuk melihat entitas pada aplikasi sipenting.')

@push('css')
    @livewireStyles
    {{-- <link rel="stylesheet" href="{{ asset('') }}storage/admin_template/mazer/assets/css/shared/iconly.css"> --}}
@endpush

@section('navbar')
   
        @livewire('user.opd.bappeda.aplikasi.sipenting.dashboardnav')
   
@endsection


@section('content')
   
        @livewire('user.opd.bappeda.aplikasi.sipenting.dashboard')
   
@endsection

@push('java-script')
    @livewireScripts
@endpush


