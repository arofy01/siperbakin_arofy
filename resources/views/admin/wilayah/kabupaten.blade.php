@extends('layouts.admin.app')

@section('judul-halaman', 'Kabupaten')



@push('css')

@endpush




@section('content')
    @livewire('admin.wilayah.Kabupaten')
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

        window.addEventListener('TampilModalTambahKabupaten', e => {
            $('#ModalTambahKabupaten').modal('show');
        });


        window.addEventListener('TampilModalEditKabupaten', e => {
            $('#ModalEditKabupaten').modal('show');
        });

        window.addEventListener('TampilModalLihatKabupaten', e => {
            $('#ModalLihatKabupaten').modal('show');
        });

        window.addEventListener('TutupModal', e => {
            $('#ModalTambahKabupaten').modal('hide');
            $('#ModalEditKabupaten').modal('hide');
            $('#ModalLihatKabupaten').modal('hide');
        });
    </script>
@endpush
