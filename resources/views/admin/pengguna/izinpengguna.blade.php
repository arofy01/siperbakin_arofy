@extends('layouts.admin.app')

@section('judul-halaman', 'Izin Pengguna (Permissions)')
@section('keterangan-halaman', 'Halaman ini untuk memanajemen Perizinan Pengguna (User Permission)')



@push('css')
@endpush

@section('content')

    @livewire('admin.pengguna.izinpengguna')

@endsection

@push('java-script')
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

        window.addEventListener('TampilModalTambahIzinPengguna', e => {
            $('#TambahIzinPenggunaModal').modal('show');
        });


        window.addEventListener('Tampil ModalEditIzinPengguna', e => {
            $('#EditIzinPenggunaModal').modal('show');
        });

        window.addEventListener('TampilLihatIzinPengguna', e => {
            $('#LihatIzinPenggunaModal').modal('show');
        });

        window.addEventListener('closeModal', e => {
            $('#TambahIzinPenggunaModal').modal('hide');
            $('#EditIzinPenggunaModal').modal('hide');
            $('#LihatIzinPenggunaModal').modal('hide');


        });
    </script>
@endpush
