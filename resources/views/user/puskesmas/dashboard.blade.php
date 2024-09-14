@extends('layouts.user.app')

@section('judul-halaman', 'Dashboard Puskesmas')
@section('keterangan-halaman', 'Halaman ini untuk melihat rangkuman-rangkuman entitas bagi Puskesmas.')

@push('css')
    @livewireStyles
    <link rel="stylesheet" href="{{ asset('') }}storage/admin_template/mazer/assets/css/shared/iconly.css">
@endpush

@section('navbar')
   
        @livewire('user.puskesmas.dashboardnav')
   
@endsection


@section('content')

    @livewire('user.puskesmas.dashboard')

@endsection

@push('java-script')
    @livewireScripts

    <!-- Need: Apexcharts -->
    <script src="{{ asset('') }}storage/admin_template/mazer/assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset('') }}storage/admin_template/mazer/assets/js/pages/dashboard.js"></script>
@endpush
