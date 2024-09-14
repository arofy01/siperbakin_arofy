@extends('layouts.user.app')

@section('judul-halaman', 'SIPEKA')

@section('copyright', 'copyright @ 2023 BAPPEDA Kab. Aceh Tamiang')

@section('team', 'BAPPEDA Team')




@push('css')
    @livewireStyles
@endpush

@section('navbar')

    @livewire('user.opd.bappeda.aplikasi.sipeka.dashboardnav')

@endsection


@section('content')

    @livewire('user.opd.bappeda.aplikasi.sipeka.konvergensiopd')

@endsection

@push('java-script')
    @livewireScripts

    {{-- untuk chart --}} 
    <script src="{{ asset('') }}storage/admin_template/mazer/assets/extensions/chart.js/Chart.min.js"></script>
    <script src="{{ asset('') }}storage/admin_template/mazer/assets/js/pages/ui-chartjs.js"></script>


    
@endpush
