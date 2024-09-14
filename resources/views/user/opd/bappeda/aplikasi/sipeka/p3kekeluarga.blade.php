@extends('layouts.user.app')

@section('judul-halaman', 'Sipeka')
@section('keterangan-halaman', 'Halaman ini untuk memanajemen data kemiskinan di Kab. Aceh Tamiang.')

@push('css')
    @livewireStyles
   
@endpush


@section('navbar')
        @livewire('user.opd.bappeda.aplikasi.sipeka.dashboardnav')
@endsection



@section('content')
        @livewire('user.opd.bappeda.aplikasi.sipeka.p3kekeluarga')
@endsection



@push('java-script')
    @livewireScripts

    <script>
        window.addEventListener('TampilModalLihatP3kekeluarga', e => {
            $('#ModalLihatP3kekeluarga').modal({
                backdrop: 'static',
                keyboard: false
            }).modal('show');
        });

        window.addEventListener('TutupModal', e => {
           
            $('#ModalLihatP3kekeluarga').modal('hide');
        });


    </script>

@endpush
 