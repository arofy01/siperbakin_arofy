<div>
    <div class="content-wrapper container">

        <div class="page-heading">
            <b>
                <p>Hai, {{ Auth::user()->name }} </p>
            </b>

            <p>Percepatan Penghapusan Kemiskinan Ekstrem (PPKE) adalah upaya yang terarah, terpadu, dan berkelanjutan yang dilakukan pemerintah, pemerintah daerah, dan/atau masyarakat dalam bentuk kebijakan, program dan kegiatan pemberdayaan, pendampingan, serta fasilitasi untuk memenuhi kebutuhan dasar setiap warga negara.</p>

        </div>


        <div class="page-content">
            

            <div class="card row text-center">
                <h3>Rangkuman Penduduk Miskin Extrim Berdasarkan Individu</h3>
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
                                            <h6 class="text-muted font-semibold">Total Individu</h6>
                                            <h6 class="font-extrabold mb-0">{{ number_format($totalindividu,0,'.') }}</h6>
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
                                            <h6 class="text-muted font-semibold">Perempuan</h6>
                                            <h6 class="font-extrabold mb-0">{{ number_format($totalperempuan,0,'.') }}</h6>
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
                                            <h6 class="text-muted font-semibold">Laki-laki</h6>
                                            <h6 class="font-extrabold mb-0">{{ number_format($totallakilaki,0,'.') }}</h6>
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
                                            <h6 class="text-muted font-semibold">Usia < 7 Tahun</h6>
                                                    <h6 class="font-extrabold mb-0">{{ number_format($total7tahun,0,'.') }}</h6>
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
                                        <h6 class="text-muted font-semibold">Usia 7-12 Tahun</h6>
                                        <h6 class="font-extrabold mb-0">{{ number_format($total712tahun,0,'.') }}</h6>
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
                                        <h6 class="text-muted font-semibold">Usia 13-15 Tahun</h6>
                                        <h6 class="font-extrabold mb-0">{{ number_format($total1315tahun,0,'.') }}</h6>
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
                                        <h6 class="text-muted font-semibold">Usia 16-18 Tahun</h6>
                                        <h6 class="font-extrabold mb-0">{{ number_format($total1618tahun,0,'.') }}</h6>
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
                                        <h6 class="text-muted font-semibold">Usia 19-21 Tahun</h6>
                                        <h6 class="font-extrabold mb-0">{{ number_format($total1921tahun,0,'.') }}</h6>
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
                                        <h6 class="text-muted font-semibold">Usia 22-59 Tahun</h6>
                                        <h6 class="font-extrabold mb-0">{{ number_format($total2259tahun,0,'.') }}</h6>
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
                                        <h6 class="text-muted font-semibold">Usia > 60 Tahun</h6>
                                        <h6 class="font-extrabold mb-0">{{ number_format($total60tahun,0,'.') }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <!-- Card samping-->
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

            <hr>

            <div class="card row text-center">
                <h3>Rangkuman Penduduk Miskin Extrim Berdasarkan Kepala Keluarga</h3>
            </div>
            <section class="row">
                <div class="col-12 col-lg-9">
                    <div class="row">
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">

                                <div
                                    class="card-body px-4 py-4-5 d-flex flex-column align-items-center justify-content-center">
                                    <div class="stats-icon green mb-2">
                                        <i class="iconly-boldGraph" style="margin: auto;"></i>
                                    </div>

                                    <div class="row text-center">
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-12 ">
                                            <h6 class="text-muted font-semibold">Total Kepala Keluarga</h6>
                                            <h6 class="font-extrabold mb-0">{{ number_format($totalkeluarga,0,'.') }}</h6>
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
                                            <h6 class="text-muted font-semibold">Desil I</h6>
                                            <h6 class="font-extrabold mb-0">{{ number_format($totaldesil1,0,'.') }}</h6>
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
                                            <h6 class="text-muted font-semibold">Desil II</h6>
                                            <h6 class="font-extrabold mb-0">{{ number_format($totaldesil2,0,'.') }}</h6>
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
                                            <h6 class="text-muted font-semibold">Desil III</h6>
                                                    <h6 class="font-extrabold mb-0">{{ number_format($totaldesil3,0,'.') }}</h6>
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
                                        <h6 class="text-muted font-semibold">Laki-Laki</h6>
                                        <h6 class="font-extrabold mb-0">{{ number_format($totallakilakikeluarga,0,'.') }}</h6>
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
                                        <h6 class="text-muted font-semibold">Perempuan</h6>
                                        <h6 class="font-extrabold mb-0">{{ number_format($totalperempuankeluarga,0,'.') }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                        


                    </div>
                </div>

               

            </section>

        </div>
    </div>


</div>






