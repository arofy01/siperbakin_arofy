<div>
    <div class="content-wrapper container">

        <div class="page-heading">
            <p>Hai, {{ Auth::user()->name }} </p>
        </div>
        <div class="page-content">
            <section class="row">

                <div class="col-12 col-lg-9">
                    <div class="row">

                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <a href="/user/opd/bappeda/aplikasi/siperbakin/pamsimas">
                                    <div
                                        class="card-body px-4 py-4-5 d-flex flex-column align-items-center justify-content-center">
                                        <div class="stats-icon red mb-2">
                                            <i class="iconly-boldGraph" style="margin: auto;"></i>
                                        </div>

                                        <div class="row text-center">
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-12 ">
                                                <h6 class="text-muted font-semibold">Pamsimas</h6>
                                                {{-- <h6 class="font-extrabold mb-0">{{ $pamsimas }}</h6> --}}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>


                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <a href="/user/opd/bappeda/aplikasi/siperbakin/sanimas">
                                    <div
                                        class="card-body px-4 py-4-5 d-flex flex-column align-items-center justify-content-center">
                                        <div class="stats-icon red mb-2">
                                            <i class="iconly-boldGraph" style="margin: auto;"></i>
                                        </div>

                                        <div class="row text-center">
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-12 ">
                                                <h6 class="text-muted font-semibold">Sanimas</h6>
                                                {{-- <h6 class="font-extrabold mb-0">{{ $pamsimas }}</h6> --}}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>


                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <a href="/user/opd/bappeda/aplikasi/siperbakin/tps3r">
                                    <div
                                        class="card-body px-4 py-4-5 d-flex flex-column align-items-center justify-content-center">
                                        <div class="stats-icon red mb-2">
                                            <i class="iconly-boldGraph" style="margin: auto;"></i>
                                        </div>

                                        <div class="row text-center">
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-12 ">
                                                <h6 class="text-muted font-semibold">TPS3R</h6>
                                                {{-- <h6 class="font-extrabold mb-0">{{ $pamsimas }}</h6> --}}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>


                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <a href="/user/opd/bappeda/aplikasi/siperbakin/wtp">
                                    <div
                                        class="card-body px-4 py-4-5 d-flex flex-column align-items-center justify-content-center">
                                        <div class="stats-icon red mb-2">
                                            <i class="iconly-boldGraph" style="margin: auto;"></i>
                                        </div>

                                        <div class="row text-center">
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-12 ">
                                                <h6 class="text-muted font-semibold">WTP</h6>
                                                {{-- <h6 class="font-extrabold mb-0">{{ $pamsimas }}</h6> --}}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>



                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <a href="/user/opd/bappeda/aplikasi/siperbakin/airlimbahperkotaan">
                                    <div
                                        class="card-body px-4 py-4-5 d-flex flex-column align-items-center justify-content-center">
                                        <div class="stats-icon red mb-2">
                                            <i class="iconly-boldGraph" style="margin: auto;"></i>
                                        </div>

                                        <div class="row text-center">
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-12 ">
                                                <h6 class="text-muted font-semibold">Air Limbah Perkotaan</h6>
                                                {{-- <h6 class="font-extrabold mb-0">{{ $pamsimas }}</h6> --}}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>


                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <a href="/user/opd/bappeda/aplikasi/siperbakin/ipaldanseptictank">
                                    <div
                                        class="card-body px-4 py-4-5 d-flex flex-column align-items-center justify-content-center">
                                        <div class="stats-icon red mb-2">
                                            <i class="iconly-boldGraph" style="margin: auto;"></i>
                                        </div>

                                        <div class="row text-center">
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-12 ">
                                                <h6 class="text-muted font-semibold">IPAL dan Septic Tank</h6>
                                                {{-- <h6 class="font-extrabold mb-0">{{ $pamsimas }}</h6> --}}
                                            </div>
                                        </div>
                                    </div>
                                </a>
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
