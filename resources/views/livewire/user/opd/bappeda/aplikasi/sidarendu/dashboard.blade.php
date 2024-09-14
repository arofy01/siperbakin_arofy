<div>
    <div class="content-wrapper container">

        <div class="page-heading">
            <p><b>Hai, {{ Auth::user()->name }}</b> </p>
        </div>
        <div class="page-content">

            <div class="mt-2 mb-2">
                Berikut Lembaga/instansi di Kab. Aceh Tamiang
            </div>

            <section class="row">
                <div class="col-12 col-lg-9">
                    <div class="row">
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div
                                    class="card-body px-4 py-4-5 d-flex flex-column align-items-center justify-content-center">
                                    <div class="stats-icon red mb-2">
                                        <i class="iconly-boldGraph" style="margin: auto;"></i>
                                    </div>

                                    <div class="row text-center">
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-12 ">
                                            <h6 class="text-muted font-semibold">Dinas</h6>
                                            <h6 class="font-extrabold mb-0">{{ $dinas }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div
                                    class="card-body px-4 py-4-5 d-flex flex-column align-items-center justify-content-center">
                                    <div class="stats-icon red mb-2">
                                        <i class="iconly-boldGraph" style="margin: auto;"></i>
                                    </div>

                                    <div class="row text-center">
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-12 ">
                                            <h6 class="text-muted font-semibold">Badan</h6>
                                            <h6 class="font-extrabold mb-0">{{ $badan }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div
                                    class="card-body px-4 py-4-5 d-flex flex-column align-items-center justify-content-center">
                                    <div class="stats-icon red mb-2">
                                        <i class="iconly-boldGraph" style="margin: auto;"></i>
                                    </div>

                                    <div class="row text-center">
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-12 ">
                                            <h6 class="text-muted font-semibold">Kecamatan</h6>
                                            <h6 class="font-extrabold mb-0">{{ $kecamatan }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div
                                    class="card-body px-4 py-4-5 d-flex flex-column align-items-center justify-content-center">
                                    <div class="stats-icon green mb-2">
                                        <i class="iconly-boldGraph" style="margin: auto;"></i>
                                    </div>

                                    <div class="row text-center">
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-12 ">
                                            <h6 class="text-muted font-semibold">Sekretariat</h6>
                                            <h6 class="font-extrabold mb-0">{{ $sekretariat }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div
                                    class="card-body px-4 py-4-5 d-flex flex-column align-items-center justify-content-center">
                                    <div class="stats-icon green mb-2">
                                        <i class="iconly-boldGraph" style="margin: auto;"></i>
                                    </div>

                                    <div class="row text-center">
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-12 ">
                                            <h6 class="text-muted font-semibold">SMP</h6>
                                            <h6 class="font-extrabold mb-0">{{ $smp }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div
                                    class="card-body px-4 py-4-5 d-flex flex-column align-items-center justify-content-center">
                                    <div class="stats-icon green mb-2">
                                        <i class="iconly-boldGraph" style="margin: auto;"></i>
                                    </div>

                                    <div class="row text-center">
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-12 ">
                                            <h6 class="text-muted font-semibold">SD</h6>
                                            <h6 class="font-extrabold mb-0">{{ $sd }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div
                                    class="card-body px-4 py-4-5 d-flex flex-column align-items-center justify-content-center">
                                    <div class="stats-icon green mb-2">
                                        <i class="iconly-boldGraph" style="margin: auto;"></i>
                                    </div>

                                    <div class="row text-center">
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-12 ">
                                            <h6 class="text-muted font-semibold">TK</h6>
                                            <h6 class="font-extrabold mb-0">{{ $tk }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div
                                    class="card-body px-4 py-4-5 d-flex flex-column align-items-center justify-content-center">
                                    <div class="stats-icon purple mb-2">
                                        <i class="iconly-boldGraph" style="margin: auto;"></i>
                                    </div>

                                    <div class="row text-center">
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-12 ">
                                            <h6 class="text-muted font-semibold">PAUD</h6>
                                            <h6 class="font-extrabold mb-0">{{ $paud }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div
                                    class="card-body px-4 py-4-5 d-flex flex-column align-items-center justify-content-center">
                                    <div class="stats-icon purple mb-2">
                                        <i class="iconly-boldGraph" style="margin: auto;"></i>
                                    </div>

                                    <div class="row text-center">
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-12 ">
                                            <h6 class="text-muted font-semibold">DAYAH</h6>
                                            <h6 class="font-extrabold mb-0">{{ $dayah }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div
                                    class="card-body px-4 py-4-5 d-flex flex-column align-items-center justify-content-center">
                                    <div class="stats-icon purple mb-2">
                                        <i class="iconly-boldGraph" style="margin: auto;"></i>
                                    </div>

                                    <div class="row text-center">
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-12 ">
                                            <h6 class="text-muted font-semibold">Desa</h6>
                                            <h6 class="font-extrabold mb-0">{{ $desa }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div
                                    class="card-body px-4 py-4-5 d-flex flex-column align-items-center justify-content-center">
                                    <div class="stats-icon purple mb-2">
                                        <i class="iconly-boldGraph" style="margin: auto;"></i>
                                    </div>

                                    <div class="row text-center">
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-12 ">
                                            <h6 class="text-muted font-semibold">Puskesmas</h6>
                                            <h6 class="font-extrabold mb-0">{{ $puskesmas }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div
                                    class="card-body px-4 py-4-5 d-flex flex-column align-items-center justify-content-center">
                                    <div class="stats-icon purple mb-2">
                                        <i class="iconly-boldGraph" style="margin: auto;"></i>
                                    </div>

                                    <div class="row text-center">
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-12 ">
                                            <h6 class="text-muted font-semibold">Posyandu</h6>
                                            <h6 class="font-extrabold mb-0">{{ $posyandu }}</h6>
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
</div>
