<div>
    <div class="content-wrapper container">

        <div class="page-heading">
            <b>
                <p>Hai, {{ Auth::user()->name }} </p>
            </b>

            <p>Agregat, Grafik dan Peta Kemiskinan Extrim berdasarkan Penerima Bantuan dan Kecamatan</p>

        </div>





        <div class="page-content">
            <section class="row">
                <div class="col-12 col-lg-9">

                    <div class="card">
                        <div class="card-header">
                            
                        </div>

 
                        {{-- Tempat Tampil Grafik --}}

                        {{-- <div class="card-body">
                            <canvas id="kecamatanChart" style="10px: 10px;"></canvas>
                            <div id="chart-data" data-chart-data="{{ json_encode($chartData) }}" style="display: none;">
                            </div>
                        </div> --}}

                        {{-- Tempat Tampil Data Agregat --}}




                        {{-- Tempat Tampil Peta --}}




                        
                    </div>
                </div>




                {{-- Card Samping --}}
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
