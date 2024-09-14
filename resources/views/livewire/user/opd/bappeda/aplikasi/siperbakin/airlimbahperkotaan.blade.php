<div>
    <section class="section container">

        <div class="page-heading">
            <b>
                <p>Hai, {{ Auth::user()->name }} </p>
            </b>

            <p>Sistem Pengelolaan Air Limbah Perkotaan</p>
        </div>


        <div class="card">
            <div class="card-header">


                @if (session()->has('message'))
                    <h5 class="alert alert-success ">{{ session('message') }}</h5>
                @endif

                <!-- Button trigger for modal untuk tambah pengguna -->
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                    wire:click="TampilModalTambahAirLimbahPerkotaan">
                    <i class="bi bi-file-earmark-plus"></i> Tambah Sistem Air Limbah Perkotaan
                </button>

                {{-- Pencarian --}}
                <input type="search" wire:model="search" class="form-control float-end mx-2" placeholder="Cari Desa"
                    style="width:230px;">

                <div class="mt-4">
                    <b>
                        <label class="text-primary">Total Sistem Pengelolaan Air Limbah Perkotaan :
                            {{ $TotalAirlimbahperkotaan }}</label>
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
                            <th>Desa</th>
                            <th>Dusun</th>

                            <th>Uraian</th>
                            <th>Pengelola</th>

                            <th>Jenis Sarana Infrastruktur</th>
                            <th>Cakupan Layanan</th>
                            <th>Kondisi</th>

                            <th>Sumber Dipa</th>
                            <th>Pelaksanaan dan Peluncuran</th>
                            <th>Alokasi Anggaran</th>

                            <th>Kondisi Eksisting dan Peta</th>

                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @forelse ($airlimbahperkotaan as $data)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $data->kecamatan->name }}</td>
                                <td>{{ $data->desa->name }}</td>
                                <td>{{ $data->dusun }}</td>

                                <td>{{ $data->uraian }}</td>
                                <td>{{ $data->pengelola }}</td>

                                <td>{{ $data->jenis_sarana_infrastruktur }}</td>
                                <td>{{ $data->cakupan_layanan }}</td>
                                <td>{{ $data->kondisi }}</td>

                                <td>{{ $data->sumber_dipa }}</td>
                                <td>{{ $data->pelaksanaan_dan_peluncuran }}</td>
                                <td>{{ $data->alokasi_anggaran }}</td>

                                <td>{{ $data->kondisi_eksisting }}</td>


                                <td style="text-align: right;">
                                    <div class="modal-success me-1 mb-1 d-inline-block">
                                        <button type="button"
                                            wire:click="LihatAirlimbahperkotaan({{ $data->id }})"
                                            class="btn btn-sm btn-info rounded-pill">
                                            Lihat
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <div class="modal-success me-1 mb-1 d-inline-block">
                                        <button type="button" wire:click="EditAirlimbahperkotaan({{ $data->id }})"
                                            class="btn btn-sm btn-warning rounded-pill">
                                            Edit
                                        </button>
                                    </div>
                                </td>


                                <td>
                                    <div class="modal-success me-1 mb-1 d-inline-block">
                                        <button wire:click='PDFAirlimbahperkotaan({{ $data->id }})'
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
                                <td colspan="13">Data tidak ditemukan!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>


            </div>

            <div class="mt-4">
                {{ $airlimbahperkotaan->links() }}
            </div>

        </div>
    </section>




    <!--Modal Tambah -->
    <div wire:ignore.self class="modal fade" id="ModalTambahAirLimbahPerkotaan" tabindex="-1"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-scrollable modal-full" role="document">


            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah Sistem Pengelolaan Air Limbah
                        Perkotaan</h5>
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
                    <form wire:submit.prevent="SimpanAirlimbahperkotaan">
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


                                    <label>Desa:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <select class="form-select" wire:model="KodeDesa">
                                            <option value="">--Pilih Desa--</option>
                                            @foreach ($Desa as $desa)
                                                <option value="{{ $desa->id }}">
                                                    {{ $desa->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @error('KodeDesa')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>Dusun :</label>
                                    <div class="form-group mt-2 col-md-6">
                                        <input type="text" wire:model="Dusun" class="form-control">
                                        @error('Dusun')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Uraian :</label>
                                    <div class="form-group mt-2 col-md-6">
                                        <input type="text" wire:model="Uraian" class="form-control">
                                        @error('Uraian')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>



                                    <label>Pengelola:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="Pengelola" class="form-control">
                                        @error('Pengelola')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Jenis Sarana Infrastruktur:</label>
                                    <div class="form-group mt-2 col-md-6">
                                        <select class="form-select" wire:model="JenisSaranaInfrastruktur">
                                            <option value="">--Pilih Jenis Sarana Infrastruktur--</option>
                                            <option value="">IPAL Komunal dengan Perpipaan</option>
                                            <option value="">Kombinasi MCK dan IPAL Komunal dengan Perpipaan
                                            </option>
                                            <option value="">IPAL Komunal dengan Perpipaan</option>
                                            <option value=""> Perpipaan</option>
                                        </select>

                                        @error('JenisSaranaInfrastruktur')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Cakupan Layanan :</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="CakupanLayanan" class="form-control">
                                        @error('CakupanLayanan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col">
                                    <label>Kondisi :</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <select class="form-select" wire:model="Kondisi">
                                            <option value="">--Pilih--</option>
                                            <option value="Berfungsi">Berfungsi</option>
                                            <option value="Tidak Berfungsi">Tidak Berfungsi</option>
                                        </select>


                                        @error('Kondisi')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>Sumber Dipa:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="SumberDipa" class="form-control">
                                        @error('SumberDipa')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Pelaksanaan dan Luncuran:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="PelaksanaandanLuncuran"
                                            class="form-control">
                                        @error('PelaksanaandanLuncuran')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Alokasi Anggaran :</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="AlokasiAnggaran" class="form-control">
                                        @error('AlokasiAnggaran')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>Kondisi Eksisting dan Peta :</label>
                                    <div class="form-group mt-2 col-md-6">
                                        <input type="file" wire:model="KondisiEksisting"
                                            placeholder="Kondisi Eksisting" class="form-control">
                                        @error('KondisiEksisting')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>



                                    <div class="mt-3 mb-3">
                                        @if ($KondisiEksisting && is_object($KondisiEksisting))
                                            {{-- <img src="{{ $this->Gambar }}" alt="Uploaded Image" width="300"> --}}
                                            <img src="{{ $KondisiEksisting->temporaryUrl() }}" alt="Uploaded Image"
                                                width="300">
                                        @else
                                            <span>No image uploaded</span>
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
    <div wire:ignore.self class="modal fade" id="ModalEditAirlimbahPerkotaan" tabindex="-1"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-scrollable modal-full" role="document">

            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">
                        Edit Sistem Pengelolaan Air Limbah Perkotaan</h5>
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
                    <form wire:submit.prevent="UpdatePamsimas">
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


                                    <label>Desa:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <select class="form-select" wire:model="KodeDesa">
                                            <option value="">--Pilih Desa--</option>
                                            @foreach ($Desa as $desa)
                                                <option value="{{ $desa->id }}">
                                                    {{ $desa->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @error('KodeDesa')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>Dusun :</label>
                                    <div class="form-group mt-2 col-md-6">
                                        <input type="text" wire:model="Dusun" class="form-control">
                                        @error('Dusun')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Uraian :</label>
                                    <div class="form-group mt-2 col-md-6">
                                        <input type="text" wire:model="Uraian" class="form-control">
                                        @error('Uraian')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Pengelola:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="Pengelola" class="form-control">
                                        @error('Pengelola')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Jenis Sarana Infrastruktur:</label>
                                    <div class="form-group mt-2 col-md-6">
                                        <select class="form-select" wire:model="JenisSaranaInfrastruktur">
                                            <option value="">--Pilih Jenis Sarana Infrastruktur--</option>
                                            <option value="">IPAL Komunal dengan Perpipaan</option>
                                            <option value="">Kombinasi MCK dan IPAL Komunal dengan Perpipaan
                                            </option>
                                            <option value="">IPAL Komunal dengan Perpipaan</option>
                                            <option value=""> Perpipaan</option>
                                        </select>

                                        @error('JenisSaranaInfrastruktur')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Cakupan Layanan :</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="CakupanLayanan" class="form-control">
                                        @error('CakupanLayanan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col">
                                    <label>Kondisi :</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <select class="form-select" wire:model="Kondisi">
                                            <option value="">--Pilih--</option>
                                            <option value="Berfungsi">Berfungsi</option>
                                            <option value="Tidak Berfungsi">Tidak Berfungsi</option>
                                        </select>


                                        @error('Kondisi')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>Sumber Dipa:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="SumberDipa" class="form-control">
                                        @error('SumberDipa')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Pelaksanaan dan Luncuran:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="PelaksanaandanLuncuran"
                                            class="form-control">
                                        @error('PelaksanaandanLuncuran')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Alokasi Anggaran :</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="AlokasiAnggaran" class="form-control">
                                        @error('AlokasiAnggaran')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>Kondisi Eksisting dan Peta :</label>
                                    <div class="form-group mt-2 col-md-6">
                                        <input type="file" wire:model="KondisiEksisting"
                                            placeholder="Kondisi Eksisting" class="form-control">
                                        @error('KondisiEksisting')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>



                                    <div class="mt-3 mb-3">
                                        @if ($KondisiEksisting && is_object($KondisiEksisting))
                                            {{-- <img src="{{ $this->Gambar }}" alt="Uploaded Image" width="300"> --}}
                                            <img src="{{ $KondisiEksisting->temporaryUrl() }}" alt="Uploaded Image"
                                                width="300">
                                        @else
                                            <span>No image uploaded</span>
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
    <div wire:ignore.self class="modal fade" id="ModalLihatAirLimbahPerkotaan" tabindex="-1"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title">
                        Lihat Sistem Pengelolaan Air Limbah Perkotaan</h5>
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

                        <h4 class="text-center mb-4">DETAIL SISTEM PENGELOLAAN AIR LIMBAH PERKOTAAN</h4>

                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">

                                <tbody>
                                    <tr>
                                        <td><b>Kecamatan :</b></td>
                                        <td>{{ $KodeKecamatan }} </td>
                                    </tr>
                                    <tr>
                                        <td><b>Desa:</b></td>
                                        <td>{{ $KodeDesa }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Dusun: </b> </td>
                                        <td>{{ $Dusun }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Pengelola: </b> </td>
                                        <td>{{ $Pengelola }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Jenis Sarana Infrastruktur : </b> </td>
                                        <td>{{ $JenisSaranaInfrastruktur }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Cakupan Layanan: </b> </td>
                                        <td>{{ $CakupanLayanan }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Kondisi : </b> </td>
                                        <td>{{ $Kondisi }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Sumber Dipa: </b> </td>
                                        <td>{{ $SumberDipa }}</td>
                                    </tr>


                                    <tr>
                                        <td><b>Pelaksanaan dan Peluncuran: </b> </td>
                                        <td>{{ $PelaksanaandanPeluncuran }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Alokasi Anggaran: </b> </td>
                                        <td>{{ $AlokasiAnggaran }}</td>
                                    </tr>


                                    <tr>
                                        <td><b>Kondisi Eksisting dan Peta : </b> </td>
                                        <td>{{ $KondisiEksisting }}</td>
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
