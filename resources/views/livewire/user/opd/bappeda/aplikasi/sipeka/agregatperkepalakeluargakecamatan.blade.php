<div>
    <div class="content-wrapper container">

        <div class="page-heading">
            <b>
                <p>Hai, {{ Auth::user()->name }} </p>
            </b>

            <p>Data Agregat, Grafik dan Peta Kemiskinan Extrim berdasarkan Jenis Kelamin Kepala Keluarga di Kab. Aceh Tamiang</p>

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
                                            <th class="text-center" colspan="2">Kepala Keluarga</th>
                                        </tr>

                                        <tr>
                                            <th class="text-center">Laki-Laki</th>
                                            <th class="text-center">Perempuan</th>
                                        </tr>

                                    </thead>

                                    <tbody>
                                        <?php $no = 1; ?>

                                        @forelse ($datahasilfilteragregatkepalakeluarga as $data)
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $data->kecamatan }}</td>
                                                <td class="text-center">
                                                    {{ $data->lakilaki }}
                                                </td>
                                                <td class="text-center">{{ $data->perempuan }}</td>
                                            </tr>
                                            <?php $no++; ?>
                                        @empty
                                            <tr>
                                                <td colspan="4">Data keluarga tidak ditemukan!</td>
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
                            <b>Grafik Kepala Keluarga</b>
                        </div>


                        {{-- Tempat Tampil Grafik --}}

                        <div class="card-body">
                            <canvas id="kepalakeluargaChart" style="10px: 10px;"></canvas>
                            <div id="chart-data" data-chart-data="{{ json_encode($chartData) }}" style="display: none;">
                            </div>
                        </div>
                    </div>
                </div>


            </section>





        </div>
    </div>
</div>
