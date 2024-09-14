@extends('layouts.user.app')

@section('judul-halaman', 'Dashboard OPD')


@push('css')
    @livewireStyles
   
@endpush

@section('navbar')
   
    @livewire('user.lsm.dashboardnav')
    
@endsection


@section('content')
    
    @livewire('user.lsm.dashboard')
    
@endsection

@push('java-script')
    @livewireScripts
@endpush
