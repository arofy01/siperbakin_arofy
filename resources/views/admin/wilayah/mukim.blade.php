@extends('layouts.admin.app')

@section('judul-halaman', 'Mukim')



@push('css')
@endpush




@section('content')
    @livewire('admin.wilayah.mukim')
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

        window.addEventListener('TampilModalTambahMukim', e => {
            $('#ModalTambahMukim').modal('show');
        });


        window.addEventListener('TampilModalEditMukim', e => {
            $('#ModalEditMukim').modal('show');
        });

        window.addEventListener('TampilModalLihatMukim', e => {
            $('#ModalLihatMukim').modal('show');
        });

        window.addEventListener('TutupModal', e => {
            $('#ModalTambahMukim').modal('hide');
            $('#ModalEditMukim').modal('hide');
            $('#ModalLihatMukim').modal('hide');
        });
    </script>
@endpush
