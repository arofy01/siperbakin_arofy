<div>
    <div class="content-wrapper container">

        <div class="page-heading">
            <b>
                <p>Hai, {{ Auth::user()->name }} </p>
            </b>

            <p>Data Agregat, Grafik dan Peta Kemiskinan Extrim berdasarkan Keluarga dan Individu Di Kab. Aceh Tamiang</p>

        </div>





        <div class="page-content">

            <section class="row">

                <div class="col-12 col-lg-9">

                    <div class="card">
                        <div class="card-header">
                            <b>Data Agregat Keluarga dan Individu</b>
                        </div>


                        {{-- Tempat Tampil Data Agregat --}}


                        <div class="card-body mt-2">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center" rowspan="2">No</th>
                                            <th class="text-center" rowspan="2">Kecamatan</th>
                                            <th class="text-center" colspan="4">Keluarga</th>
                                            <th class="text-center" colspan="4">Individu</th>
                                            
                                        </tr>

                                        <tr>
                                            <th class="text-center">Jumlah</th>
                                            <th class="text-center">Desil1</th>
                                            <th class="text-center">Desil2</th>
                                            <th class="text-center">Desil3</th>

                                            <th class="text-center">Jumlah</th>
                                            <th class="text-center">Desil1</th>
                                            <th class="text-center">Desil2</th>
                                            <th class="text-center">Desil3</th>
                                        </tr>

                                    </thead>

                                    <tbody>
                                        <?php $no = 1; ?>

                                        {{-- @forelse ($datahasilfilteragregatkeluarga as $data)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $data->kecamatan }}</td>
                                            <td class="text-center">
                                                {{ $data->desil1keluarga + $data->desil2keluarga + $data->desil3keluarga }}
                                            </td>
                                            <td class="text-center">{{ $data->desil1keluarga }}</td>
                                            <td class="text-center">{{ $data->desil2keluarga }}</td>
                                            <td class="text-center">{{ $data->desil3keluarga }}</td>

                                            @forelse ($datahasilfilteragregatindividu as $data1)
                                                <td class="text-center">
                                                    {{ $data1->desil1individu + $data1->desil2individu + $data1->desil3individu }}
                                                </td>
                                                <td class="text-center">{{ $data1->desil1individu }}</td>
                                                <td class="text-center">{{ $data1->desil2individu }}</td>
                                                <td class="text-center">{{ $data1->desil3individu }}</td>
                                            @empty
                                                <td colspan="4">Data individu tidak ditemukan!</td>
                                            @endforelse
                                        </tr>
                                        <?php $no++; ?>
                                    @empty
                                        <tr>
                                            <td colspan="4">Data keluarga tidak ditemukan!</td>
                                        </tr>
                                    @endforelse --}}


                                        @php
                                            $count = max(count($datahasilfilteragregatkeluarga), count($datahasilfilteragregatindividu));
                                        @endphp

                                        @for ($i = 0; $i < $count; $i++)
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>
                                                    @if (isset($datahasilfilteragregatkeluarga[$i]))
                                                        {{ $datahasilfilteragregatkeluarga[$i]->kecamatan }}
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if (isset($datahasilfilteragregatkeluarga[$i]))
                                                        {{ $datahasilfilteragregatkeluarga[$i]->desil1keluarga + $datahasilfilteragregatkeluarga[$i]->desil2keluarga + $datahasilfilteragregatkeluarga[$i]->desil3keluarga }}
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if (isset($datahasilfilteragregatkeluarga[$i]))
                                                        {{ $datahasilfilteragregatkeluarga[$i]->desil1keluarga }}
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if (isset($datahasilfilteragregatkeluarga[$i]))
                                                        {{ $datahasilfilteragregatkeluarga[$i]->desil2keluarga }}
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if (isset($datahasilfilteragregatkeluarga[$i]))
                                                        {{ $datahasilfilteragregatkeluarga[$i]->desil3keluarga }}
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if (isset($datahasilfilteragregatindividu[$i]))
                                                        {{ $datahasilfilteragregatindividu[$i]->desil1individu + $datahasilfilteragregatindividu[$i]->desil2individu + $datahasilfilteragregatindividu[$i]->desil3individu }}
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if (isset($datahasilfilteragregatindividu[$i]))
                                                        {{ $datahasilfilteragregatindividu[$i]->desil1individu }}
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if (isset($datahasilfilteragregatindividu[$i]))
                                                        {{ $datahasilfilteragregatindividu[$i]->desil2individu }}
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if (isset($datahasilfilteragregatindividu[$i]))
                                                        {{ $datahasilfilteragregatindividu[$i]->desil3individu }}
                                                    @endif
                                                </td>
                                            </tr>
                                            <?php $no++; ?>
                                        @endfor

                                        @if (count($datahasilfilteragregatkeluarga) === 0 && count($datahasilfilteragregatindividu) === 0)
                                            <tr>
                                                <td colspan="4">Data keluarga dan individu tidak ditemukan!</td>
                                            </tr>
                                        @endif


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
                            <b>Grafik Individu</b>
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
