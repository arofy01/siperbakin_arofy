<div>
    <section class="section container">

        <div class="page-heading">
            <b>
                <p>Hai, {{ Auth::user()->name }} </p>
            </b>

            <p>WTP (Water Treatment Plant) / (IPA) Instalasi Pengolahan Air </p>
        </div>


        <div class="card">
            <div class="card-header">


                @if (session()->has('message'))
                    <h5 class="alert alert-success ">{{ session('message') }}</h5>
                @endif

                <!-- Button trigger for modal untuk tambah pengguna -->
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                    wire:click="TampilModalTambahWTP">
                    <i class="bi bi-file-earmark-plus"></i> Tambah WTP
                </button>

                {{-- Pencarian --}}
                <input type="search" wire:model="search" class="form-control float-end mx-2" placeholder="Cari Desa"
                    style="width:230px;">

                <div class="mt-4">
                    <b>
                        <label class="text-primary">Total WTP : {{ $TotalWTP }}</label>
                    </b>

                    <button type="button" class="btn btn-outline-success mt-2 float-end" data-bs-toggle="modal"
                        wire:click="DownloadExcelData">
                        <i class="bi-file-earmark-excel"></i> Download
                    </button>

                </div>

            </div>




            {{-- Menambahkan garis --}}
            <hr>

            <div class="card-body mt-2" style="overflow-x:auto;">

                <table class="table table-striped" style="width:100%; white-space: nowrap;">
                    <thead>
                        <tr>

                            <th>No</th>
                            <th>Kecamatan</th>
                            <th>Nama SPAM</th>
                            <th>Pengelola</th>

                            <th>Latitude</th>
                            <th>Longitude</th>

                            <th>Kondisi</th>
                            <th>Permasalahan</th>
                            <th class="text-wrap text-center">Jam Operasi</th>

                            <th class="text-wrap text-center">Kapasitas Terpasang (L/dt)</th>
                            <th class="text-wrap text-center">Kapasitas Produksi (L/dt)</th>
                            <th class="text-wrap text-center">Kapasitas Distribusi (L/dt)</th>

                            <th class="text-wrap text-center">Kapasitas Air Terjual (m3)</th>
                            <th class="text-wrap text-center">Kapasitas Belum Terpakai (L/dt)</th>
                            <th class="text-wrap text-center">Kehilangan Air (%)</th>

                            <th class="text-wrap text-center">SR (Unit)</th>
                            <th class="text-wrap text-center">Wilayah Pelayanan</th>

                            <th class="text-wrap text-center">Keterangan</th>
                            <th class="text-wrap text-center">Kondisi Eksisting dan Peta</th>


                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @forelse ($wtp as $data)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $data->kecamatan->name }}</td>
                                <td>{{ $data->nama_spam }}</td>
                                <td class="text-wrap">{{ $data->pengelola }}</td>

                                <td>{{ $data->latitude }}</td>
                                <td>{{ $data->longitude }}</td>

                                <td>{{ $data->berfungsi }}</td>
                                <td>{{ $data->permasalahan }}</td>
                                <td>{{ $data->jam_operasi }}</td>

                                <td>{{ $data->kapasitas_terpasang }}</td>
                                <td>{{ $data->kapasitas_produksi }}</td>
                                <td>{{ $data->kapasitas_distribusi }}</td>

                                <td>{{ $data->kapasitas_air_terjual }}</td>
                                <td>{{ $data->kapasitas_belum_terpakai }}</td>
                                <td>{{ $data->kehilangan_air }}</td>


                                <td>{{ $data->sr }}</td>
                                <td>{{ $data->wilayah_pelayanan }}</td>

                                <td>{{ $data->keterangan }}</td>
                                <td>
                                    <div>
                                        @if ($data->kondisi_eksisting)
                                            <a href="{{ asset('storage/images/siperbakin/wtp/' . $data->kondisi_eksisting) }}"
                                                download>
                                                <img src="{{ asset('storage/images/siperbakin/wtp/' . $data->kondisi_eksisting) }}"
                                                    width="100">
                                            </a>
                                        @endif
                                    </div>
                                </td>



                                <td style="text-align: right;">
                                    <div class="modal-success me-1 mb-1 d-inline-block">
                                        <button type="button" wire:click="LihatWTP({{ $data->id }})"
                                            class="btn btn-sm btn-info rounded-pill">
                                            Lihat
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <div class="modal-success me-1 mb-1 d-inline-block">
                                        <button type="button" wire:click="EditWTP({{ $data->id }})"
                                            class="btn btn-sm btn-warning rounded-pill">
                                            Edit
                                        </button>
                                    </div>
                                </td>


                                <td>
                                    <div class="modal-success me-1 mb-1 d-inline-block">
                                        <button wire:click='PDFWTP({{ $data->id }})'
                                            class="btn btn-sm btn-danger rounded pill">PDF</button>
                                    </div>
                                </td>


                                <td>
                                    <div class="modal-success me-1 mb-1 d-inline-block">
                                        <button wire:click='konfirmasihapus({{ $data->id }})'
                                            class="btn btn-sm btn-danger rounded pill">Hapus</button>
                                    </div>
                                </td>

                            </tr>

                            <?php $no++; ?>

                        @empty
                            <tr>
                                <td colspan="19">Data tidak ditemukan!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>


            </div>

            <div class="mt-4">
                {{ $wtp->links() }}
            </div>

        </div>
    </section>




    <!--Modal Tambah -->
    <div wire:ignore.self class="modal fade" id="ModalTambahWTP" tabindex="-1"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-scrollable modal-full" role="document">


            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah WTP</h5>
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
                    <form wire:submit.prevent="SimpanWTP">
                        <div class="modal-body">

                            <div class="row">

                                <div class="col">

                                    <label>Kecamatan:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <select class="form-select" wire:model="KodeKecamatan">
                                            <option value="">--Kecamatan--</option>
                                            @foreach ($Kecamatan as $kecamatan)
                                                <option value="{{ $kecamatan->id }}">
                                                    {{ $kecamatan->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @error('KodeKecamatan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>Nama SPAM :</label>
                                    <div class="form-group mt-2 col-md-6">
                                        <input type="text" wire:model="NamaSpam" class="form-control">
                                        @error('NamaSpam')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>Pengelola :</label>
                                    <div class="form-group mt-2 col-md-6">
                                        <input type="text" wire:model="Pengelola" class="form-control">
                                        @error('Pengelola')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>Latitude:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="Latitude" class="form-control">
                                        @error('Latitude')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>Longitude:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="Longitude" class="form-control">
                                        @error('Longitude')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>Kondisi :</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <select class="form-select" wire:model="Berfungsi">
                                            <option value="">--Pilih--</option>
                                            <option value="Berfungsi">Berfungsi</option>
                                            <option value="Tidak Berfungsi">Tidak Berfungsi</option>
                                        </select>
                                        @error('Berfungsi')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>Permasalahan:</label>
                                    <div class="form-group mt-2 col-md-8">
                                        <textarea class="form-control" wire:model="Permasalahan" rows="3"></textarea>
                                        @error('Permasalahan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>Jam Operasi :</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JamOperasi" class="form-control">
                                        @error('JamOperasi')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>Kapasitas Terpasang :</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="KapasitasTerpasang" class="form-control">
                                        @error('KapasitasTerpasang')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="col">

                                    <label>Kapasitas Produksi :</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="KapasitasProduksi" class="form-control">
                                        @error('KapasitasProduksi')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>Kapasitas Distribusi :</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="KapasitasDistribusi" class="form-control">
                                        @error('KapasitasDistribusi')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>Kapasitas Air Terjual :</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="KapasitasAirTerjual" class="form-control">
                                        @error('KapasitasAirTerjual')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>Kapasitas Belum Terpakai :</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="KapasitasBelumTerpakai"
                                            class="form-control">
                                        @error('KapasitasBelumTerpakai')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>Kehilangan Air:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="KehilanganAir" class="form-control">
                                        @error('KehilanganAir')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>SR :</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="Sr" class="form-control">
                                        @error('Sr')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>Wilayah Pelayanan:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="WilayahPelayanan" class="form-control">
                                        @error('WilayahPelayanan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>Keterangan :</label>
                                    <div class="form-group mt-2 col-md-8">

                                        <textarea class="form-control" wire:model="Keterangan" rows="3"></textarea>

                                        @error('Keterangan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>Kondisi Eksisting dan Peta:</label>
                                    <div class="form-group mt-2 col-md-6">
                                        <input type="file" wire:model="KondisiEksisting" class="form-control">
                                        @error('KondisiEksisting')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mt-3 mb-3">
                                        @if ($KondisiEksisting && is_object($KondisiEksisting))
                                            {{-- <img src="{{ $this->Gambar }}" alt="Uploaded Image" width="300"> --}}
                                            <img src="{{ $KondisiEksisting->temporaryUrl() }}" alt="Uploaded Image"
                                                width="300">
                                        
                                        @endif
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
    </div>

    <!--Modal Edit -->
    <div wire:ignore.self class="modal fade" id="ModalEditWTP" tabindex="-1"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-scrollable modal-full" role="document">

            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">
                        Edit WTP</h5>
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
                    <form wire:submit.prevent="UpdateWTP">
                        <div class="modal-body">
                            <div class="row">


                                <div class="col">

                                    <label>Kecamatan:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <select class="form-select" wire:model="KodeKecamatan">
                                            <option value="">--Kecamatan--</option>
                                            @foreach ($Kecamatan as $kecamatan)
                                                <option value="{{ $kecamatan->id }}">
                                                    {{ $kecamatan->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @error('KodeKecamatan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>Nama SPAM :</label>
                                    <div class="form-group mt-2 col-md-6">
                                        <input type="text" wire:model="NamaSpam" class="form-control">
                                        @error('NamaSpam')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>Pengelola :</label>
                                    <div class="form-group mt-2 col-md-6">
                                        <input type="text" wire:model="Pengelola" class="form-control">
                                        @error('Pengelola')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>Latitude:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="Latitude" class="form-control">
                                        @error('Latitude')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>Longitude:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="Longitude" class="form-control">
                                        @error('Longitude')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>Kondisi :</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <select class="form-select" wire:model="Berfungsi">
                                            <option value="">--Pilih--</option>
                                            <option value="Berfungsi">Berfungsi</option>
                                            <option value="Tidak Berfungsi">Tidak Berfungsi</option>
                                        </select>
                                        @error('Berfungsi')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>Permasalahan:</label>
                                    <div class="form-group mt-2 col-md-8">
                                        <textarea class="form-control" wire:model="Permasalahan" rows="3"></textarea>
                                        @error('Permasalahan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>Jam Operasi :</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JamOperasi" class="form-control">
                                        @error('JamOperasi')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>Kapasitas Terpasang :</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="KapasitasTerpasang" class="form-control">
                                        @error('KapasitasTerpasang')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="col">

                                    <label>Kapasitas Produksi :</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="KapasitasProduksi" class="form-control">
                                        @error('KapasitasProduksi')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>Kapasitas Distribusi :</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="KapasitasDistribusi" class="form-control">
                                        @error('KapasitasDistribusi')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>Kapasitas Air Terjual :</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="KapasitasAirTerjual" class="form-control">
                                        @error('KapasitasAirTerjual')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>Kapasitas Belum Terpakai :</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="KapasitasBelumTerpakai"
                                            class="form-control">
                                        @error('KapasitasBelumTerpakai')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>Kehilangan Air:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="KehilanganAir" class="form-control">
                                        @error('KehilanganAir')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>SR :</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="Sr" class="form-control">
                                        @error('Sr')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>Wilayah Pelayanan:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="WilayahPelayanan" class="form-control">
                                        @error('WilayahPelayanan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>Keterangan :</label>
                                    <div class="form-group mt-2 col-md-8">

                                        <textarea class="form-control" wire:model="Keterangan" rows="3"></textarea>

                                        @error('Keterangan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>Kondisi Eksisting dan Peta :</label>
                                    <div class="form-group mt-2 col-md-6">
                                        <input type="file" wire:model="KondisiEksisting" class="form-control">
                                        @error('KondisiEksisting')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mt-3 mb-3">
                                        @if ($Filename)
                                            <img src="{{ asset('storage/images/siperbakin/wtp/' . $Filename) }}"
                                                alt="Uploaded Image" width="300">
                                       
                                        @endif
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
    </div>



    <!--Modal Lihat-->
    <div wire:ignore.self class="modal fade" id="ModalLihatWTP" tabindex="-1"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title">
                        Lihat WTP</h5>
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
                    <div class="modal-body" style="text-align: left;">

                        <h4 class="text-center mb-4">DETAIL WTP</h4>

                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">

                                <tbody>
                                    <tr>
                                        <td><b>Kecamatan :</b></td>
                                        <td>{{ $KodeKecamatan }} </td>
                                    </tr>
                                    <tr>
                                        <td><b>Nama SPAM :</b></td>
                                        <td>{{ $NamaSpam }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Pengelola: </b> </td>
                                        <td>{{ $Pengelola }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Latitude : </b> </td>
                                        <td>{{ $Latitude }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Longitude : </b> </td>
                                        <td>{{ $Longitude }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Kondisi : </b> </td>
                                        <td>{{ $Berfungsi }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Permasalahan: </b> </td>
                                        <td>{{ $Permasalahan }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Jam Operasi: </b> </td>
                                        <td>{{ $JamOperasi }}</td>
                                    </tr>


                                    <tr>
                                        <td><b>Kapasitas Terpasang: </b> </td>
                                        <td>{{ $KapasitasTerpasang }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Kapasitas Produksi: </b> </td>
                                        <td>{{ $KapasitasProduksi }}</td>
                                    </tr>


                                    <tr>
                                        <td><b>Kapasitas Distribusi: </b> </td>
                                        <td>{{ $KapasitasDistribusi }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Kapasitas Air Terjual: </b> </td>
                                        <td>{{ $KapasitasAirTerjual }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Kapasitas Belum Terpakai: </b> </td>
                                        <td>{{ $KapasitasBelumTerpakai }}</td>
                                    </tr>


                                    <tr>
                                        <td><b>Kehilangan Air: </b> </td>
                                        <td>{{ $KehilanganAir }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>SR : </b> </td>
                                        <td>{{ $Sr }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Wilayah Pelayanan : </b> </td>
                                        <td>{{ $WilayahPelayanan }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Keterangan : </b> </td>
                                        <td>{{ $Keterangan }}</td>
                                    </tr>


                                    <tr>
                                        <td><b>Kondisi Eksisting dan Peta : </b> </td>
                                        <td>
                                            <div class="mt-3 mb-3">
                                                @if ($Filename)
                                                    <a href="{{ asset('storage/images/siperbakin/wtp/' . $Filename) }}"
                                                        download>
                                                        <img src="{{ asset('storage/images/siperbakin/wtp/' . $Filename) }}"
                                                            alt="Uploaded Image" width="300">
                                                    </a>
                                                @else
                                                    <span>No image uploaded</span>
                                                @endif
                                            </div>

                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button wire:click="resetInput" type="button" class="btn btn-light-secondary"
                            data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Tutup</span>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
