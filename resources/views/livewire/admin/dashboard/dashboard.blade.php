<div>
    <section class="row">
        {{-- Bagian Kiri --}}
        <div class="col-12 col-lg-9">
            {{-- Penduduk --}}
            <h5>Penduduk</h5>
            <hr>
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body text-center d-flex flex-column align-items-center">
                            <div class="stats-icon red mb-3">
                                <i class="iconly-boldGraph"></i>
                            </div>
                            <h6 class="text-muted font-semibold">Penduduk</h6>
                            <h6 class="font-extrabold mb-0">{{ $penduduk ?? 0 }}</h6>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Lembaga --}}
            <h5>Lembaga</h5>
            <hr>
            <div class="row">
                @foreach ([
                    ['title' => 'Dinas', 'value' => $dinas ?? 0],
                    ['title' => 'Badan', 'value' => $badan ?? 0],
                    ['title' => 'Kecamatan', 'value' => $kecamatan ?? 0],
                    ['title' => 'Sekretariat', 'value' => $sekretariat ?? 0],
                    ['title' => 'SMP', 'value' => $smp ?? 0],
                    ['title' => 'SD', 'value' => $sd ?? 0],
                    ['title' => 'TK', 'value' => $tk ?? 0],
                    ['title' => 'PAUD', 'value' => $paud ?? 0],
                    ['title' => 'DAYAH', 'value' => $dayah ?? 0],
                    ['title' => 'Desa', 'value' => $desa ?? 0],
                    ['title' => 'Puskesmas', 'value' => $puskesmas ?? 0],
                    ['title' => 'Posyandu', 'value' => $posyandu ?? 0],
                ] as $item)
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body text-center d-flex flex-column align-items-center">
                                <div class="stats-icon mb-3">
                                    <i class="iconly-boldGraph"></i>
                                </div>
                                <h6 class="text-muted font-semibold">{{ $item['title'] }}</h6>
                                <h6 class="font-extrabold mb-0">{{ $item['value'] }}</h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Aparatur --}}
            <h5>Aparatur</h5>
            <hr>
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body text-center d-flex flex-column align-items-center">
                            <div class="stats-icon purple mb-3">
                                <i class="iconly-boldGraph"></i>
                            </div>
                            <h6 class="text-muted font-semibold">Aparatur</h6>
                            <h6 class="font-extrabold mb-0">{{ $aparatur ?? 0 }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bagian Kanan --}}
        <div class="col-12 col-lg-3">
            {{-- Profil Pengguna --}}
            <div class="card">
                <div class="card-body py-4 px-4 text-center">
                    <div class="avatar avatar-xl mb-3">
                        <img src="{{ asset('storage/admin_template/mazer/assets/images/faces/1.jpg') }}" 
                             alt="User Avatar" class="rounded-circle">
                    </div>
                    <h5 class="font-bold">{{ Auth::user()->name }}</h5>
                    <p class="text-muted mb-0">{{ Auth::user()->email ?? '' }}</p>
                </div>
            </div>
        </div>
    </section>
</div>
