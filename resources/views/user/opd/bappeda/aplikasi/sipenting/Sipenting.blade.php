@extends('layouts.user.app')

@section('judul-halaman', 'Sipenting')
@section('keterangan-halaman', 'Halaman ini untuk memanajemen Infrastruktur Kab. Aceh Tamiang.')

@push('css')
    @livewireStyles
    {{-- <link rel="stylesheet" href="{{ asset('') }}storage/admin_template/mazer/assets/css/shared/iconly.css"> --}}
@endpush




@section('content')
   
        @livewire('user.opd.aplikasi.sipenting.sipenting')
   
@endsection

@push('java-script')
    @livewireScripts

    {{-- <!-- Need: Apexcharts -->
    <script src="{{ asset('') }}storage/admin_template/mazer/assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset('') }}storage/admin_template/mazer/assets/js/pages/dashboard.js"></script> --}}
@endpush
