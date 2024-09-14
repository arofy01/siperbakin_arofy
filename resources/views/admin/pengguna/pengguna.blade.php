@extends('layouts.admin.app')

@section('judul-halaman', 'Pengguna (Users)')

@section('keterangan-halaman', 'Halaman ini untuk memanajemen data Pengguna (Users)')

@push('css')
    @livewireStyles
@endpush

@section('content')

    @livewire('admin.pengguna.pengguna')

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
            $('#EditPenggunaModal').modal('show');

            var myText = document.getElementById("SelectEdit").value;

            // Memperbarui teks dalam elemen select
            var selectElement = document.getElementById("SelectEdit");
            selectElement.value = myText;


        });

        window.addEventListener('tampilModalLihat', e => {
            $('#LihatPenggunaModal').modal('show');
        });


        window.addEventListener('closeModal', e => {
            $('#EditPenggunaModal').modal('hide');
            $('#TambahPenggunaModal').modal('hide');
            $('#LihatPenggunaModal').modal('hide');
        });
    </script>
@endpush
