@extends('layouts.admin.app')

@section('judul-halaman', 'Provinsi')



@push('css')
@endpush




@section('content')
    @livewire('admin.wilayah.provinsi')
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

        window.addEventListener('TampilModalTambahProvinsi', e => {
            $('#ModalTambahProvinsi').modal('show');
        });


        window.addEventListener('TampilModalEditProvinsi', e => {
            $('#ModalEditProvinsi').modal('show');
        });

        window.addEventListener('TampilModalLihatProvinsi', e => {
            $('#ModalLihatProvinsi').modal('show');
        });

        window.addEventListener('TutupModal', e => {
            $('#ModalTambahProvinsi').modal('hide');
            $('#ModalEditProvinsi').modal('hide');
            $('#ModalLihatProvinsi').modal('hide');
        });
    </script>
@endpush
