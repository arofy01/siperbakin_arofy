@extends('layouts.admin.app')

@section('judul-halaman', 'Aparatur / Apparatus')
@section('keterangan-halaman', 'Halaman ini digunakan untuk memanajemen data aparatur di Kab. Aceh Tamiang')


@push('css')
@endpush


@section('content')
    @livewire('admin.aparatur.aparatur')
@endsection


@push('java-script')
    <script>
        window.addEventListener('tampilkonfirmasihapus', e => {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Menghapus data aparatur akan berakibat terhapusnya keseluruhan data yang terkait, pertimbangkan kembali!",
                icon: 'Peringatan',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    livewire.emit('hapusmulai')
                }
            })
        });


        window.addEventListener('dataterhapussukses', e => {
            Swal.fire(
                'Terhapus!',
                'Data berhasil dihapus.',
                'Sukses'
            )
        });


        window.addEventListener('TampilModalTambahAparatur', e => {
            $('#ModalTambahAparatur').modal({
                backdrop: 'static',
                keyboard: false
            }).modal('show');
        });



        window.addEventListener('TampilModalEditAparatur', e => {
            $('#ModalEditAparatur').modal({
                backdrop: 'static',
                keyboard: false
            }).modal('show');
        });

        window.addEventListener('TampilModalLihatAparatur', e => {
            $('#ModalLihatAparatur').modal({
                backdrop: 'static',
                keyboard: false
            }).modal('show');
        });

        window.addEventListener('TutupModal', e => {
            $('#ModalTambahAparatur').modal('hide');
            $('#ModalEditAparatur').modal('hide');
            $('#ModalLihatAparatur').modal('hide');
        });
    </script>
@endpush
