<div class="content-wrapper container">

    <div class="page-heading">
        <p>Hai, {{ Auth::user()->name }} </p>
    </div>
    <div class="page-content">

        <div class="mt-2 mb-2">
            Selamat Datang di Halaman Dashboard Organisasi Perangkat Daerah.
        </div>

        <section class="row">

            <div class="col-12 col-lg-9">
                <div class="row">
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5 d-flex flex-column align-items-center justify-content-center">
                                    <div class="stats-icon red mb-2">
                                        <i class="iconly-boldGraph" style="margin: auto;"></i>
                                    </div>
        
                                    <div class="row text-center">
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-12 ">
                                            <h6 class="text-muted font-semibold">Jumlah Pegawai</h6>
                                            <h6 class="font-extrabold mb-0"></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5 d-flex flex-column align-items-center justify-content-center">
                                    <div class="stats-icon red mb-2">
                                        <i class="iconly-boldGraph" style="margin: auto;"></i>
                                    </div>
        
                                    <div class="row text-center">
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-12 ">
                                            <h6 class="text-muted font-semibold">Struktur Organiasi</h6>
                                            <h6 class="font-extrabold mb-0"></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5 d-flex flex-column align-items-center justify-content-center">
                                    <div class="stats-icon red mb-2">
                                        <i class="iconly-boldGraph" style="margin: auto;"></i>
                                    </div>
        
                                    <div class="row text-center">
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-12 ">
                                            <h6 class="text-muted font-semibold">Regulasi</h6>
                                            <h6 class="font-extrabold mb-0"></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5 d-flex flex-column align-items-center justify-content-center">
                                    <div class="stats-icon green mb-2">
                                        <i class="iconly-boldGraph" style="margin: auto;"></i>
                                    </div>
        
                                    <div class="row text-center">
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-12 ">
                                            <h6 class="text-muted font-semibold">Jadwal Pimpinan</h6>
                                            <h6 class="font-extrabold mb-0"></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                </div>
            </div>

            {{-- card samping --}}
            <div class="col-12 col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Profil Pengguna</h4>
                    </div>
                    <div class="card-body py-4 px-5">
                        <div class="d-flex align-items-center">
                            <div class="ms-3 name">
                                {{-- <h6 class="font-bold">{{$user->lembaga->nama_lembaga}}</h6> --}}
                                <b>
                                    <h6 class="text-muted mb-0">Nama Lembaga : </h6>
                                </b>
                                <h6> {{ ucwords(strtolower($userinfo->lembaga->nama_lembaga)) }}</h6><br>
                                <b>
                                    <h6 class="text-muted mb-0">Alamat : </h6>
                                </b>
                                <h6> {{ ucwords(strtolower($userinfo->lembaga->alamat)) }}</h6>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>

</div>
