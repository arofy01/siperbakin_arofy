@extends('layouts.user.app')

@section('judul-halaman', 'Sidarendu')


@push('css')
    @livewireStyles
@endpush

@section('navbar')
    @livewire('user.opd.bappeda.aplikasi.sidarendu.client.dashboardnav')
@endsection


@section('content')
    @livewire('user.opd.bappeda.aplikasi.sidarendu.client.pete100001') 
@endsection

@push('java-script')
    @livewireScripts

    <script>
        window.addEventListener('tampilkonfirmasihapus', e => {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Menghapus data dengan Kode Referensi PETE100001, pertimbangkan kembali!",
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

    

        window.addEventListener('TampilModalTambahpete100001', e => {
            $('#ModalTambahpete100001').modal({
                backdrop: 'static',
                keyboard: false
            }).modal('show');
        });



        window.addEventListener('TampilModalEditpete100001', e => {
            $('#ModalEditpete100001').modal({
                backdrop: 'static',
                keyboard: false
            }).modal('show');
        });

        window.addEventListener('TampilModalLihatpete100001', e => {
            $('#ModalLihatpete100001').modal({
                backdrop: 'static',
                keyboard: false
            }).modal('show');
        });

        window.addEventListener('TutupModal', e => {
            $('#ModalTambahpete100001').modal('hide');
            $('#ModalEditpete100001').modal('hide');
            $('#ModalLihatpete100001').modal('hide');
        });

          
        function isNumberOrDot(event) {
            // Mendapatkan kode tombol
            var keyCode = event.keyCode || event.which;

            // Izinkan angka (0-9), titik (.), backspace (8), dan tab (9)
            return /[0-9\.]/.test(event.key) || keyCode === 8 || keyCode === 9;
        }

        
    </script>

    
@endpush
