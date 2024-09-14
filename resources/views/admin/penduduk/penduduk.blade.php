@extends('layouts.admin.app')

@section('judul-halaman', 'Penduduk')
@section('keterangan-halaman', 'Halaman ini untuk memanajemen data Penduduk')


@push('css')
  
@endpush




@section('content')
    @livewire('admin.penduduk.penduduk')
@endsection



@push('java-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>



    <script>
        window.addEventListener('tampilkonfirmasihapus', e => {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Menghapus data Penduduk dapat menghapus data yang berkaitan, pertimbangkan kembali!",
                icon: 'Peringatan',
                // color: 'white',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                imageUrl: 'https://unsplash.it/400/200',
                // background: 'black',

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

        window.addEventListener('TampilModalTambahPenduduk', e => {
            $('#ModalTambahPenduduk').modal({
                backdrop: 'static',
                keyboard: false
            }).modal('show');
        });


        window.addEventListener('TampilModalEditPenduduk', e => {
            $('#ModalEditPenduduk').modal({
                backdrop: 'static',
                keyboard: false
            }).modal('show');
        });

        window.addEventListener('TampilModalLihatPenduduk', e => {
            $('#ModalLihatPenduduk').modal({
                backdrop: 'static',
                keyboard: false
            }).modal('show');
        });

        window.addEventListener('TutupModal', e => {
            $('#ModalTambahPenduduk').modal('hide');
            $('#ModalEditPenduduk').modal('hide');
            $('#ModalLihatPenduduk').modal('hide');
        });
    </script>
@endpush
