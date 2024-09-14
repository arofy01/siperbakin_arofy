@extends('layouts.user.app')

@section('judul-halaman', 'Sidarendu')


@push('css')
    @livewireStyles
@endpush

@section('navbar')
    @livewire('user.opd.bappeda.aplikasi.sidarendu.client.dashboardnav')
@endsection


@section('content')
    @livewire('user.opd.bappeda.aplikasi.sidarendu.client.kese100001')
@endsection

@push('java-script')
    <script>
        window.addEventListener('tampilkonfirmasihapus', e => {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Menghapus data dengan Kode Referensi KESE100001, pertimbangkan kembali!",
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



        window.addEventListener('TampilModalTambahkese100001', e => {
            $('#ModalTambahkese100001').modal({
                backdrop: 'static',
                keyboard: false
            }).modal('show');
        });



        window.addEventListener('TampilModalEditkese100001', e => {
            $('#ModalEditkese100001').modal({
                backdrop: 'static',
                keyboard: false
            }).modal('show');
        });

        window.addEventListener('TampilModalLihatkese100001', e => {
            $('#ModalLihatkese100001').modal({
                backdrop: 'static',
                keyboard: false
            }).modal('show');
        });

        window.addEventListener('TutupModal', e => {
            $('#ModalTambahkese100001').modal('hide');
            $('#ModalEditkese100001').modal('hide');
            $('#ModalLihatkese100001').modal('hide');
        });


        function isNumberOrDot(event) {
            // Mendapatkan kode tombol
            var keyCode = event.keyCode || event.which;

            // Izinkan angka (0-9), titik (.), backspace (8), dan tab (9)
            return /[0-9\.]/.test(event.key) || keyCode === 8 || keyCode === 9;
        }



       
    </script>
@endpush
