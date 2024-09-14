@extends('layouts.user.app')

@section('judul-halaman', 'Sidarendu')


@push('css')
    @livewireStyles
@endpush

@section('navbar')
   
        @livewire('user.opd.bappeda.aplikasi.sidarendu.dashboardnav')
   
@endsection


@section('content')
   
        @livewire('user.opd.bappeda.aplikasi.sidarendu.daftardata')
   
@endsection

@push('java-script')
    @livewireScripts
@endpush
