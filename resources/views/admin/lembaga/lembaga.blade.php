@extends('layouts.admin.app')

@section('judul-halaman', 'Lembaga / Institutions')
@section('keterangan-halaman', 'Halaman ini digunakan untuk memanajemen lembaga di Kab. Aceh Tamiang')


@push('css')
@endpush


@section('content')
    @livewire('admin.lembaga.lembaga')
@endsection


@push('java-script')
    <script>
        window.addEventListener('tampilkonfirmasihapus', e => {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Menghapus data lembaga akan berakibat terhapusnya data yang berkaitan, pertimbangkan kembali!",
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

        // window.addEventListener('TampilModalTambahOPD', e => {
        //     $('#ModalTambahOPD').modal('show');
        // });

        window.addEventListener('TampilModalTambahLembaga', e => {
            $('#ModalTambahLembaga').modal({
                backdrop: 'static',
                keyboard: false
            }).modal('show');
        });



        window.addEventListener('TampilModalEditLembaga', e => {
            $('#ModalEditLembaga').modal({
                backdrop: 'static',
                keyboard: false
            }).modal('show');
        });

        window.addEventListener('TampilModalLihatLembaga', e => {
            $('#ModalLihatLembaga').modal({
                backdrop: 'static',
                keyboard: false
            }).modal('show');
        });

        window.addEventListener('TutupModal', e => {
            $('#ModalTambahLembaga').modal('hide');
            $('#ModalEditLembaga').modal('hide');
            $('#ModalLihatLembaga').modal('hide');
        });
    </script>
@endpush
