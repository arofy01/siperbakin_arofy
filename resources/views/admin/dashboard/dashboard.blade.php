@extends('layouts.admin.app')

@section('judul-halaman', 'Dashboard')
@section('keterangan-halaman',
    'Halaman ini untuk melihat/memanajeman rangkuman-rangkuman entitas yang terdapat didalam
    aplikasi.')

    @push('css')
        @livewireStyles
        
    @endpush


@section('content')

    @livewire('admin.dashboard.dashboard')

@endsection

@push('java-script')
    @livewireScripts

    
@endpush
