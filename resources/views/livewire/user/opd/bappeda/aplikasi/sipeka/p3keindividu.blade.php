<div>
    <section class="section container">

        <div class="page-heading">
            <b>
                <p>Hai, {{ Auth::user()->name }} </p>
            </b>

            <p>Data Penduduk Miskin Ekstrim (Individu) di Kabupaten Aceh Tamiang</p>

        </div>


        <div class="card">
            <div class="card-header">
                @if (session()->has('message'))
                    <h5 class="alert alert-success ">{{ session('message') }}</h5>
                @endif

                <!-- Button trigger for modal untuk tambah pengguna -->
                {{-- <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                    wire:click="TampilModalTambahPenduduk">
                    Tambah Penduduk Miskin +
                </button> --}}

                {{-- <hr> --}}


                <div class="row">
                    <div class="col">
                        {{-- Pencarian berdasarkan NIK --}}
                        <b><label class="text-success">Cari berdasarkan NIK :</label></b>
                        <input type="search" wire:model="carinik" class="form-control col-6 col-lg-3 col-md-6"
                            placeholder="Cari NIK" style="width:230px;">

                    </div>


                    <div class="col">
                        {{-- Pencarian berdasarkan Nama Kepala Keluarga --}}
                        <b><label class="text-success">Cari berdasarkan Nama :</label></b>
                        <input type="search" wire:model="carinama" class="form-control col-6 col-lg-3 col-md-6"
                            placeholder="Cari Nama" style="width:230px;">
                    </div>


                    <div class="col">

                        {{-- Filter berdasarkan kolom --}}
                        <b><label class="text-success">Cari berdasarkan Kolom Lain :</label></b>
                        <div class="form-group col-12 col-lg-12 col-md-12">
                            <select class="form-select" wire:ignore wire:model="kolomfilter">
                                <option value="" selected>--Pilih Kolom Pencarian--</option>
                                <option value="kecamatan">Kecamatan</option>
                                <option value="desa">Desa</option>
                                <option value="desil_kesejahteraan">Desil Kesejahteraan</option>
                                <option value="padan_dukcapil">Padan DUKCAPIL</option>
                                <option value="jenis_kelamin">Jenis Kelamin</option>
                                <option value="hub_dgn_kpl_keluarga">Hubungan dengan Kepala Keluarga</option>
                                <option value="status_kawin">Status Kawin</option>
                                <option value="pekerjaan">Pekerjaan</option>
                                <option value="pendidikan">Pendidikan</option>
                            </select>
                        </div>


                        {{-- Nilai Kolom Filter --}}
                        @if (!is_null($kolomfilter) && strlen($kolomfilter) > 0)
                            <div class="form-group mt-2 col-12 col-lg-12 col-md-12">
                                <select class="form-select" wire:model="nilaifilter">
                                    <option value="" selected>--Pilih Nilai Pencarian--</option>
                                    @foreach ($datahasilfilter as $item)
                                        <option value="{{ $item->$kolomfilter }}">
                                            {{ $item->$kolomfilter }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    </div>

                </div>

                <div class="mt-4">
                    <b>
                        <label class="text-primary">Total Penduduk : {{ $TotalPendudukMiskin }}</label>
                    </b>


                    {{-- <button type="button" class="btn btn-outline-success mt-2 float-end" data-bs-toggle="modal"
                        wire:click="DownloadExcelData">
                        <i class="bi-file-earmark-excel"></i> Download
                    </button>  --}}


                </div>

            </div>


            {{-- Menambahkan garis --}}
            <hr>

            <div class="card-body mt-2" style="overflow-x:auto;">

                <table class="table table-striped" style="width:100%; white-space: nowrap;">
                    <thead>
                        <tr>
                            {{-- <th></th> --}}
                            <th></th>
                            <th></th>
                            <th>No</th>
                            <th>ID Keluarga</th>
                            <th>Kecamatan</th>
                            <th>Desa</th>
                            <th>Desil Kesejahteraan</th>
                            <th>Alamat </th>
                            <th>ID Individu</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Padan DUKCAPIL</th>
                            <th>Jenis Kelamin</th>
                            <th>Hub. dgn. Kpl Keluarga</th>
                            <th>Tanggal Lahir</th>
                            <th>Setatus Kawin</th>
                            <th>Pekerjaan</th>
                            <th>Pendidikan</th>
                            <th>Usia < 7 Tahun</th>
                            <th>Usia 13-15 Tahun</th>
                            <th>Usia 16-18 Tahun</th>
                            <th>Usia 19-21 Tahun</th>
                            <th>Usia 22-59 Tahun</th>
                            <th>> 60 Tahun</th>
                            <th>Penerima BNBT</th>
                            <th>Penerima BPUM</th>
                            <th>Penerima BST</th>
                            <th>Penerima PKH</th>
                            <th>Penerima SEMBAKO</th>
                            <th>Resiko Stunting</th>
                            <th>Pensasaran</th>

                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @forelse ($pendudukmiskin as $data)
                            <tr>
                                <td style="text-align: right;">
                                    <div class="modal-success me-1 mb-1 d-inline-block">
                                        <button type="button" wire:click="LihatP3keindividu({{ $data->id }})"
                                            class="btn btn-sm btn-info rounded-pill">
                                            Lihat
                                        </button>
                                    </div>
                                </td>
{{--                                 
                                <td>
                                    <div class="modal-success me-1 mb-1 d-inline-block">
                                        <button type="button" wire:click="Editp3keindividu({{ $data->id }})"
                                            class="btn btn-sm btn-warning rounded-pill">
                                            Edit
                                        </button>
                                    </div>
                                </td> --}}


                                <td>
                                    <div class="modal-success me-1 mb-1 d-inline-block">
                                        <button wire:click='PDFP3keindividu({{ $data->id }})'
                                            class="btn btn-sm btn-danger rounded pill">PDF</button>
                                    </div>
                                </td>


                                <td>{{ $no }}</td>
                                <td>{{ $data->id_keluarga }}</td>
                                <td>{{ $data->kecamatan }}</td>
                                <td>{{ $data->desa }}</td>
                                <td>{{ $data->desil_kesejahteraan }}</td>
                                <td>{{ $data->alamat }}</td>
                                <td>{{ $data->id_individu }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->nik }}</td>
                                <td>{{ $data->padan_dukcapil }}</td>
                                <td>{{ $data->jenis_kelamin }}</td>
                                <td>{{ $data->hub_dgn_kpl_keluarga }}</td>
                                <td>{{ $data->tanggal_lahir }}</td>
                                <td>{{ $data->status_kawin }}</td>
                                <td>{{ $data->pekerjaan }}</td>
                                <td>{{ $data->pendidikan }}</td>
                                <td>{{ $data->tujuh_tahun }}</td>
                                <td>{{ $data->tigabelas_limabelas_tahun }}</td>
                                <td>{{ $data->enambelas_delapanbelas_tahun }}</td>
                                <td>{{ $data->sembilanbelas_duapuluhsatu_tahun }}</td>
                                <td>{{ $data->duapuluhdua_limapuluhsembilan_tahun }}</td>
                                <td>{{ $data->enampuluh_tahun }}</td>

                                <td>{{ $data->bnpt }}</td>
                                <td>{{ $data->bpum }}</td>
                                <td>{{ $data->bst }}</td>
                                <td>{{ $data->pkh }}</td>
                                <td>{{ $data->sembako }}</td>
                                <td>{{ $data->resiko_stunting }}</td>
                                <td>{{ $data->pensasaran }}</td>


                                

                                {{-- <td>
                                    <div class="modal-success me-1 mb-1 d-inline-block">
                                        <button wire:click='konfirmasihapus({{ $data->id }})'
                                            class="btn btn-sm btn-danger rounded pill">Hapus</button>
                                    </div>
                                </td> --}}
                            </tr>

                            <?php $no++; ?>

                        @empty
                            <tr>
                                <td colspan="29">Data tidak ditemukan!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>


            </div>

            <div class="mt-4">
                {{ $pendudukmiskin->links() }}
            </div>


        </div>




        <!--Modal Tambah -->
        {{-- <div wire:ignore.self class="modal fade" id="ModalTambahPendudukMiskin" tabindex="-1"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">


                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah Penduduk Miskin</h5>
                        <button wire:click="resetInput" type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form wire:submit.prevent="SimpanPendudukMiskin">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col">
                                        
                                        
                                        <label>NIK :</label>
                                        <div class="form-group mt-2">
                                            <input type="text" wire:model="NIK" placeholder="NIK"
                                                class="form-control">
                                            @error('NIK')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <label>Instansi:</label>
                                        <div class="form-group mt-2">
                                            <select class="form-select" wire:model="KodeInstansi">
                                                <option value="" selected>--Pilih Instansi--</option>
                                                @foreach ($instansi as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->nama_instansi }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('KodeInstansi')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <label>Lingkup Jabatan:</label>
                                        <div class="form-group mt-2">
                                            <select class="form-select" wire:model="KodeLingkupJabatan">
                                                <option value="" selected>--Pilih Lingkup Jabatan--</option>
                                                @foreach ($lingkupjabatan as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->nama_lingkup_jabatan }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('KodeLingkupJabatan')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <label>Jenis Jabatan:</label>
                                        <div class="form-group mt-2">
                                            <select class="form-select" wire:model="KodeJenisJabatan">
                                                <option value="" selected>--Pilih Jenis Jabatan--</option>
                                                @foreach ($jenisjabatan as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->nama_jenis_jabatan }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('KodeLingkupJabatan')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        
                                    </div>

                                </div>
                            </div>


                            <div class="modal-footer">
                                <button wire:click="resetInput" type="button" class="btn btn-light-secondary"
                                    data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Tutup</span>
                                </button>

                                <button type="submit" class="btn btn-primary ml-1">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Simpan</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}


        <!--Modal Edit -->
        {{-- <div wire:ignore.self class="modal fade" id="ModalEditPendudukMiskin" tabindex="-1"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-scrollable modal-full" role="document">

                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">
                            Edit Aparatur</h5>
                        <button wire:click="resetInput" type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form wire:submit.prevent="UpdatePendudukMiskin">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col">
                                        <label>NIK :</label>
                                        <div class="form-group mt-2">
                                            <input type="text" wire:model="NIK" placeholder="NIK"
                                                class="form-control">
                                            @error('NIK')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <label>Instansi:</label>
                                        <div class="form-group mt-2">
                                            <select class="form-select" wire:model="KodeInstansi">
                                                <option value="" selected>--Pilih Instansi--</option>
                                                @foreach ($instansi as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->nama_instansi }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('KodeInstansi')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <label>Lingkup Jabatan:</label>
                                        <div class="form-group mt-2">
                                            <select class="form-select" wire:model="KodeLingkupJabatan">
                                                <option value="" selected>--Pilih Lingkup Jabatan--</option>
                                                @foreach ($instansi as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->nama_lingkup_jabatan }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('KodeLingkupJabatan')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button wire:click="resetInput" type="button" class="btn btn-light-secondary"
                                    data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Tutup</span>
                                </button>

                                <button type="submit" class="btn btn-primary ml-1">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Update</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}


        <!--Modal Lihat-->
        <div wire:ignore.self class="modal fade" id="ModalLihatP3keindividu" tabindex="-1"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h5 class="modal-title">
                            Lihat Detail Individu</h5>
                        <button wire:click="resetInput" type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="modal-body" style="text-align: left;">


                            <div class="table-responsive">
                                <h4 class="text-center">DETAIL INDIVIDU MISKIN EKSTRIM</h4>
                                <table class="table table-bordered mb-0">

                                    <tbody>
                                        <tr>
                                            <td><b>ID Keluarga :</b></td>
                                            <td>{{ $IdKeluarga }} </td>
                                        </tr>
                                        <tr>
                                            <td><b>Provinsi :</b></td>
                                            <td>{{ $Provinsi }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Kabupaten : </b> </td>
                                            <td>{{ $Kabupaten }}</td>
                                        </tr>
                            
                                        <tr>
                                            <td><b>Kecamatan : </b> </td>
                                            <td>{{ $Kecamatan }}</td>
                                        </tr>
                            
                                        <tr>
                                            <td><b>Desa : </b> </td>
                                            <td>{{ $Desa }}</td>
                                        </tr>
                            
                                        <tr>
                                            <td><b>Kode Kemdagri : </b> </td>
                                            <td>{{ $KodeKemdagri }}</td>
                                        </tr>
                            
                                        <tr>
                                            <td><b>Desil Kesejahteraan: </b> </td>
                                            <td>{{ $DesilKesejahteraan }}</td>
                                        </tr>
                            
                                        <tr>
                                            <td><b>Alamat: </b> </td>
                                            <td>{{ $Alamat }}</td>
                                        </tr>
                            
                            
                                        <tr>
                                            <td><b>ID Individu: </b> </td>
                                            <td>{{ $IdIndividu }}</td>
                                        </tr>
                            
                                        <tr>
                                            <td><b>Nama : </b> </td>
                                            <td>{{ $Nama }}</td>
                                        </tr>
                            
                            
                                        <tr>
                                            <td><b>NIK : </b> </td>
                                            <td>{{ $NIK }}</td>
                                        </tr>
                            
                                        <tr>
                                            <td><b>Padan Dukcapil : </b> </td>
                                            <td>{{ $PadanDukcapil}}</td>
                                        </tr>
                            
                                        <tr>
                                            <td><b>Jenis Kelamin : </b> </td>
                                            <td>{{ $JenisKelamin }}</td>
                                        </tr>
                            
                            
                                        <tr>
                                            <td><b>Hubungan dengan Kpl. Keluarga : </b> </td>
                                            <td>{{ $HubuganDgnKepalaKeluarga }}</td>
                                        </tr>
                            
                                        <tr>
                                            <td><b>Tanggal Lahir : </b> </td>
                                            <td>{{ $TanggalLahir}}</td>
                                        </tr>
                            
                                        <tr>
                                            <td><b>Status Kawin : </b> </td>
                                            <td>{{ $StatusKawin}}</td>
                                        </tr>
                            
                                        <tr>
                                            <td><b>Pekerjaan : </b> </td>
                                            <td>{{ $Pekerjaan }}</td>
                                        </tr>
                            
                                        <tr>
                                            <td><b>Pendidikan : </b> </td>
                                            <td>{{ $Pendidikan }}</td>
                                        </tr>
                            
                                        <tr>
                                            <td><b>Usia dibawah 7 tahun : </b> </td>
                                            <td>{{ $TujuhTahun }}</td>
                                        </tr>
                            
                                        <tr>
                                            <td><b>Usia 7-12 : </b> </td>
                                            <td>{{ $TujuhDuaBelasTahun }}</td>
                                        </tr>
                            
                                        <tr>
                                            <td><b>Usia 13-15 : </b> </td>
                                            <td>{{ $TigaBelasLimaBelasTahun }}</td>
                                        </tr>
                            
                                        <tr>
                                            <td><b>Usia 16-18 : </b> </td>
                                            <td>{{ $EnamBelasDelapanBelasTahun }}</td>
                                        </tr>
                            
                                        <tr>
                                            <td><b>Usia 19-21 : </b> </td>
                                            <td>{{ $SembilanBelasDuapuluhsatuTahun}}</td>
                                        </tr>
                            
                                        <tr>
                                            <td><b>Usia 22-59 : </b> </td>
                                            <td>{{ $DuaPuluhDuaLimaPuluhSembilanTahun}}</td>
                                        </tr>
                            
                                        <tr>
                                            <td><b>Usia 60 tahun keatas : </b> </td>
                                            <td>{{ $EnamPuluhTahun}}</td>
                                        </tr>
                            
                                        <tr>
                                            <td><b>Penerima BPNT : </b> </td>
                                            <td>{{ $PenerimaBnpt }}</td>
                                        </tr>
                            
                                        <tr>
                                            <td><b>Penerima BPUM : </b> </td>
                                            <td>{{ $PenerimaBpum }}</td>
                                        </tr>
                            
                                        <tr>
                                            <td><b>Penerima BST : </b> </td>
                                            <td>{{  $PenerimaBst }}</td>
                                        </tr>
                            
                                        <tr>
                                            <td><b>Penerima PKH : </b> </td>
                                            <td>{{ $PenerimaPkh }}</td>
                                        </tr>
                            
                                        <tr>
                                            <td><b>Penerima Sembako : </b> </td>
                                            <td>{{ $PenerimaSembako }}</td>
                                        </tr>
                            
                                        <tr>
                                            <td><b>Resiko Stunting : </b> </td>
                                            <td>{{ $ResikoStunting }}</td>
                                        </tr>
                            
                                        <tr>
                                            <td><b>Pensasaran : </b> </td>
                                            <td>{{ $Pensasaran }}</td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary"
                                data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Tutup</span>
                            </button>
                        </div>

                    </div>

                </div>
            </div>
        </div>



    </section>
</div>
