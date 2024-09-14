@extends('layouts.user.app')

@section('judul-halaman', 'SIPEKA')

@section('copyright', 'copyright @ 2023 BAPPEDA Kab. Aceh Tamiang')

@section('team', 'BAPPEDA Team')




@push('css')
    @livewireStyles
@endpush

@section('navbar')

    @livewire('user.opd.bappeda.aplikasi.sipeka.dashboardnav')

@endsection


@section('content')

    @livewire('user.opd.bappeda.aplikasi.sipeka.agregatperklasifikasiusiakecamatan')

@endsection

@push('java-script')
    @livewireScripts

    {{-- untuk chart --}} 
    <script src="{{ asset('') }}storage/admin_template/mazer/assets/extensions/chart.js/Chart.min.js"></script>
    <script src="{{ asset('') }}storage/admin_template/mazer/assets/js/pages/ui-chartjs.js"></script>


    <script>

    
        document.addEventListener('livewire:load', function () {
            const ctx = document.getElementById('kecamatanChart').getContext('2d');
            const chartData = document.getElementById('chart-data').getAttribute('data-chart-data');

            window.kecamatanChart7tahun = new Chart(ctx, {
                type: 'bar',
                data: JSON.parse(chartData),
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            stepSize: 1,
                        }
                    }
                },
            });
        });


    </script>
@endpush
