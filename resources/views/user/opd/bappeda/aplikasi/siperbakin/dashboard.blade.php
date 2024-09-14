@extends('layouts.user.app')

@section('judul-halaman', 'Siperbakin')


@push('css')
    @livewireStyles
   
@endpush

@section('navbar')
   
        @livewire('user.opd.bappeda.aplikasi.siperbakin.dashboardnav')
   
@endsection


@section('content')
   
        @livewire('user.opd.bappeda.aplikasi.siperbakin.dashboard')
   
@endsection

@push('java-script')
    @livewireScripts
@endpush


