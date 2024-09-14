@extends('layouts.admin.app')

@section('judul-halaman', 'Kecamatan')



@push('css')
@endpush




@section('content')
    @livewire('admin.wilayah.kecamatan')
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

        window.addEventListener('TampilModalTambahKecamatan', e => {
            $('#ModalTambahKecamatan').modal('show');
        });


        window.addEventListener('TampilModalEditKecamatan', e => {
            $('#ModalEditKecamatan').modal('show');
        });

        window.addEventListener('TampilModalLihatKecamatan', e => {
            $('#ModalLihatKecamatan').modal('show');
        });

        window.addEventListener('TutupModal', e => {
            $('#ModalTambahKecamatan').modal('hide');
            $('#ModalEditKecamatan').modal('hide');
            $('#ModalLihatKecamatan').modal('hide');
        });
    </script>
@endpush
