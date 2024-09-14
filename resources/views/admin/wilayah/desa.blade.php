@extends('layouts.admin.app')

@section('judul-halaman', 'Desa')


@push('css')
@endpush




@section('content')
    @livewire('admin.wilayah.desa')
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

        window.addEventListener('TampilModalTambahDesa', e => {
            $('#ModalTambahDesa').modal('show');
        });


        window.addEventListener('TampilModalEditDesa', e => {
            $('#ModalEditDesa').modal('show');
        });

        window.addEventListener('TampilModalLihatDesa', e => {
            $('#ModalLihatDesa').modal('show');
        });

        window.addEventListener('TutupModal', e => {
            $('#ModalTambahDesa').modal('hide');
            $('#ModalEditDesa').modal('hide');
            $('#ModalLihatDesa').modal('hide');
        });
    </script>
@endpush
