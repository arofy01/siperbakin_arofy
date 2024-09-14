<div>
    <div class="content-wrapper container">

        <div class="page-heading">
            <b>
                <p>Hai, {{ Auth::user()->name }} </p>
            </b>

            <p>Grafik Kemiskinan Extrim berdasarkan Klasifikasi Usia</p>

        </div>

        <div class="page-content">
            
            <section class="row">

                <div class="col-12 col-lg-9">

                    <div class="card">
                        <div class="card-header">
                            <b>Data Agregat Kepala Keluarga</b>
                        </div>


                        {{-- Tempat Tampil Data Agregat --}}


                        <div class="card-body mt-2">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center" rowspan="2">No</th>
                                            <th class="text-center" rowspan="2">Kecamatan</th>
                                            <th class="text-center" colspan="7">Klasifikasi Usia</th>
                                        </tr>

                                        <tr>
                                            <th class="text-center">< 7 Tahun</th>
                                            <th class="text-center">7-12 Tahun</th>
                                            <th class="text-center">13-15 Tahun</th>
                                            <th class="text-center">16-18 Tahun</th>
                                            <th class="text-center">19-21 Tahun</th>
                                            <th class="text-center">22-59 Tahun</th>
                                            <th class="text-center">60 Tahun</th>
                                        </tr>

                                    </thead>

                                    <tbody>
                                        <?php $no = 1; ?>

                                        @forelse ($agregatklasifikasiusia as $data)
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $data->kecamatan }}</td>
                                                <td class="text-center">{{ $data->tujuh_tahun }}</td>
                                                <td class="text-center">{{ $data->tujuh_duabelas_tahun }}</td>
                                                <td class="text-center">{{ $data->tigabelas_limabelas_tahun }}</td>
                                                <td class="text-center">{{ $data->enambelas_delapanbelas_tahun }}</td>
                                                <td class="text-center">{{ $data->sembilanbelas_duapuluhsatu_tahun }}</td>
                                                <td class="text-center">{{ $data->duapuluhdua_limapuluhsembilan_tahun }}</td>
                                                <td class="text-center">{{ $data->enampuluh_tahun }}</td>
                                            </tr>
                                            <?php $no++; ?>
                                        @empty
                                            <tr>
                                                <td colspan="9">Data keluarga tidak ditemukan!</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

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
            
            
            
            <section class="row">
                <div class="col-12 col-lg-9">
                    
                    <div class="card">
                        <div class="card-header">
                            <h4><b>Klasifikasi Usia</b></h4>
                        </div>


                        {{-- Tempat Tampil Grafik --}}

                        <div class="card-body">
                            <canvas id="kecamatanChart" style="10px: 10px;"></canvas>
                            <div id="chart-data" data-chart-data="{{ json_encode($chartData) }}"
                                style="display: none;">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
