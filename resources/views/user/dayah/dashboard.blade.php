@extends('layouts.user.app')

@section('judul-halaman', 'Dashboard Dayah/Pesantren')
@section('keterangan-halaman', 'Halaman ini untuk melihat rangkuman-rangkuman entitas bagi Dayah/Pesantren.')

@push('css')
    @livewireStyles
    <link rel="stylesheet" href="{{ asset('') }}storage/admin_template/mazer/assets/css/shared/iconly.css">
@endpush


@section('navbar')
   
        @livewire('user.dayah.dashboardnav')
   
@endsection


@section('content')

    @livewire('user.dayah.dashboard')

@endsection

@push('java-script')
    @livewireScripts

    <!-- Need: Apexcharts -->
    <script src="{{ asset('') }}storage/admin_template/mazer/assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset('') }}storage/admin_template/mazer/assets/js/pages/dashboard.js"></script>
@endpush
