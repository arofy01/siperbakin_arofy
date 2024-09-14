@extends('layouts.user.app')

@section('judul-halaman', 'Dashboard OPD')


@push('css')
    @livewireStyles
@section('navbar')
   
        @livewire('user.opd.dashboardnav')
@endsection


@section('content')
   
        @livewire('user.opd.dashboard')
   
@endsection

@push('java-script')
    @livewireScripts

  
@endpush
