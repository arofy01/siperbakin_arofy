@extends('layouts.admin.app')

@section('judul-halaman', 'Dusun')



@push('css')
@endpush




@section('content')
    @livewire('admin.wilayah.dusun')
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

        window.addEventListener('TampilModalTambahDusun', e => {
            $('#ModalTambahDusun').modal('show');
        });


        window.addEventListener('TampilModalEditDusun', e => {
            $('#ModalEditDusun').modal('show');
        });

        window.addEventListener('TampilModalLihatDusun', e => {
            $('#ModalLihatDusun').modal('show');
        });

        window.addEventListener('TutupModal', e => {
            $('#ModalTambahDusun').modal('hide');
            $('#ModalEditDusun').modal('hide');
            $('#ModalLihatDusun').modal('hide');
        });
    </script>
@endpush
