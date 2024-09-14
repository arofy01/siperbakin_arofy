<div>
    <div class="content-wrapper container">

        <div class="page-heading">
            <b>
                <p>Hai, {{ Auth::user()->name }} </p>
            </b>

            <p>Lokasi Fokus (Lokus) Pensasaran Kecamatan</p>

        </div>





        <div class="page-content">
            <section class="row">
                <div class="col-12 col-lg-9">

                    <div class="card">
                        <div class="card-header">

                        </div>


                        {{-- Tempat Tampil Data Agregat --}}

                        <div class="card-body mt-2" style="overflow-x:auto;">

                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center" rowspan="2">No</th>
                                            <th class="text-center" rowspan="2">Kecamatan</th>
                                            <th class="text-center" colspan="2">Data Pensasaran Kemiskinan Ekstrim
                                            </th>
                                            <th class="text-center" rowspan="2">%</th>
                                            <th class="text-center" colspan="3">Prioritas</th>
                                        </tr>

                                        <tr>
                                            <th class="text-center">P3KE</th>
                                            <th>Kecamatan</th>
                                            {{-- <th class="text-center"></th> --}}
                                            <th class="text-center">1</th>
                                            <th class="text-center">2</th>
                                            <th class="text-center">3</th>
                                            
                                        </tr>

                                    </thead>

                                    <tbody>
                                        <?php $no = 1; ?>

                                        @forelse ($datahasilfilter as $data)
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td class="text-center">{{ $data->kecamatan }}</td>
                                                <td class="text-center">{{ $data->pensasaran }}</td>
                                                <td class="text-center">{{ $data->intervensi }}</td>
                                                <td class="text-center">
                                                    @if ($data->intervensi != 0)
                                                        {{ number_format(($data->intervensi / $data->pensasaran) * 100, 2) }}%
                                                    @else
                                                        N/A
                                                    @endif
                                                <td @if ($data->kecamatan === 'KEJURUAN MUDA' || $data->kecamatan === 'MANYAK PAYED' || $data->kecamatan === 'SERUWAY') class="table-danger" @endif></td>
                                                <td @if (
                                                    $data->kecamatan === 'KARANG BARU' ||
                                                        $data->kecamatan === 'KOTA KUALASINPANG' ||
                                                        $data->kecamatan === 'TENGGULUN' ||
                                                        $data->kecamatan === 'TAMIANG HULU' ||
                                                        $data->kecamatan === 'BANDAR PUSAKA' ||
                                                        $data->kecamatan === 'SEKERAK' ||
                                                        $data->kecamatan === 'RANTAU' ||
                                                        $data->kecamatan === 'BENDAHARA') class="table-warning" @endif></td>
                                                <td @if ($data->kecamatan === 'BANDA MULIA') class="table-success" @endif></td>
                                                

                                            </tr>

                                            <?php $no++; ?>

                                        @empty
                                            <tr>
                                                <td colspan="4">Data tidak ditemukan!</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                        </div>


                        {{-- {{ $datahasilfilter->links() }} --}}

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
