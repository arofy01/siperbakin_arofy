@extends('layouts.admin.app')

@section('judul-halaman', 'Jenis Pengguna (Type of User)')
@section('keterangan-halaman', 'Halaman ini untuk memanajemen data Jenis Pengguna (Type of Users)')



@push('css')
    @livewireStyles
@endpush

@section('content')

    @livewire('admin.pengguna.jenispengguna')

@endsection



@push('java-script')
    @livewireScripts

    <script>
        window.addEventListener('tampilkonfirmasihapus', e => {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Menghapus salah satu Jenis Pengguna akan berakibat terhapusnya beberapa akun pengguna, pertimbangkan kembali!",
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

        window.addEventListener('TambahJenisPengguna', e => {
            $('#TambahJenisPenggunaModal').modal('show');
        });


        window.addEventListener('EditJenisPengguna', e => {
            $('#EditJenisPenggunaModal').modal('show');
        });

        window.addEventListener('LihatJenisPengguna', e => {
            $('#LihatJenisPenggunaModal').modal('show');
        });

        window.addEventListener('closeModal', e => {
            $('#EditJenisPenggunaModal').modal('hide');
            $('#TambahJenisPenggunaModal').modal('hide');
            $('#LihatJenisPenggunaModal').modal('hide');


        });
    </script>
@endpush
