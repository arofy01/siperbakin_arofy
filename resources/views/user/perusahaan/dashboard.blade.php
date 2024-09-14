@extends('layouts.user.app')

@section('judul-halaman', 'Dashboard Perusahaan')


@push('css')
    @livewireStyles
   
@endpush

@section('navbar')
  
        @livewire('user.perusahaan.dashboardnav')
@endsection


@section('content')
   
        @livewire('user.perusahaan.dashboard')
  
@endsection

@push('java-script')
    @livewireScripts
@endpush
