@extends('layouts.admin.app')

@section('judul-halaman', 'Peran Pengguna (Roles of User)')
@section('keterangan-halaman', 'Halaman ini untuk memanajemen data Peran Pengguna (Role of User)')

@push('css')
    @livewireStyles
@endpush


@section('content')

    @livewire('admin.pengguna.peranpengguna')

@endsection


@push('java-script')
    @livewireScripts

    <script>
        window.addEventListener('tampilkonfirmasihapus', e => {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda tidak dapat mengembalikan data yang dihapus!",
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

        window.addEventListener('tampilModalEdit', e => {
            $('#EditPeranPenggunaModal').modal('show');

        });

        window.addEventListener('tampilModalLihat', e => {
            $('#LihatPeranPenggunaModal').modal('show');
        });


        window.addEventListener('closeModal', e => {
            $('#EditPeranPenggunaModal').modal('hide');
            $('#TambahPeranPenggunaModal').modal('hide');
            $('#LihatPeranPenggunaModal').modal('hide');
        });
    </script>
@endpush
