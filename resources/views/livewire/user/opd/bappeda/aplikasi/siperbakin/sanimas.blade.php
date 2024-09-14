<div>
    <section class="section container">

        <div class="page-heading">
            <b>
                <p>Hai, {{ Auth::user()->name }} </p>
            </b>

            <p>SANIMAS (Sanitasi Berbasis Masyarakat) Di Kabupaten Aceh Tamiang</p>
        </div>


        <div class="card">
            <div class="card-header">


                @if (session()->has('message'))
                    <h5 class="alert alert-success ">{{ session('message') }}</h5>
                @endif

                <!-- Button trigger for modal untuk tambah pengguna -->
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                    wire:click="TampilModalTambahSanimas">
                    <i class="bi bi-file-earmark-plus"></i> Tambah Sanimas
                </button>

                {{-- Pencarian --}}
                <input type="search" wire:model="search" class="form-control float-end mx-2" placeholder="Cari Desa"
                    style="width:230px;">

                <div class="mt-4">
                    <b>
                        <label class="text-primary">Total Sanimas : {{ $TotalSanimas }}</label>
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

                            <th class="text-wrap text-center">Jumlah Terbangun Septic Tank</th>
                            <th class="text-wrap text-center">Jumlah Terbangun Sambungan Rumah</th>

                            <th class="text-wrap text-center">Jumlah Penduduk KK</th>
                            <th class="text-wrap text-center">Jumlah Penduduk Jiwa</th>


                            <th>Latitude</th>
                            <th>Longitude</th>

                            <th>Permasalahan</th>
                            <th class="text-wrap text-center">Tahun Pembangunan</th>
                            <th class="text-wrap text-center">Jumlah Anggaran</th>

                            <th class="text-wrap text-center">Kondisi Eksisting dan Peta</th>

                            <th class="text-wrap text-center">Jumlah BABS KK</th>
                            <th class="text-wrap text-center">Jumlah BABS Jiwa</th>

                            <th class="text-wrap text-center">Penduduk Memiliki Jamban KK</th>
                            <th class="text-wrap text-center">Penduduk Memiliki Jamban Jiwa</th>

                            <th class="text-wrap text-center">Penduduk Tidak Memiliki Jamban KK</th>
                            <th class="text-wrap text-center">Penduduk Tidak Memiliki Jamban Jiwa</th>

                            <th class="text-wrap text-center">Tangki Septic Tank + Jamban</th>
                            <th class="text-wrap text-center">Sambungan Rumah</th>

                            <th>Keterangan</th>


                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @forelse ($sanimas as $data)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $data->kecamatan->name }}</td>
                                <td>{{ $data->desa->name }}</td>
                                <td class="text-center">{{ $data->tangki_septic }}</td>

                                <td class="text-center">{{ $data->sambungan_rumah }}</td>
                                <td class="text-center">{{ $data->jumlah_penduduk_kk }}</td>
                                <td class="text-center">{{ $data->jumlah_penduduk_jiwa }}</td>


                                <td class="text-center">{{ $data->latitude }}</td>
                                <td class="text-center">{{ $data->longitude }}</td>
                                <td>{{ $data->permasalahan }}</td>

                                <td class="text-center">{{ $data->tahun_pembangunan }}</td>
                                {{-- <td>{{ $data->jumlah_anggaran }}</td> --}}
                                <td>Rp. {{ number_format((float) $data->jumlah_anggaran, 0, ',', '.') }}</td>

                                <td>
                                    <div>
                                        @if ($data->kondisi_eksisting)
                                            <a href="{{ asset('storage/images/siperbakin/sanimas/' . $data->kondisi_eksisting) }}"
                                                download>
                                                <img src="{{ asset('storage/images/siperbakin/sanimas/' . $data->kondisi_eksisting) }}"
                                                    width="100">
                                            </a>
                                        @endif
                                    </div>
                                </td>

                                <td class="text-center">{{ $data->jumlah_babs_kk }}</td>
                                <td class="text-center">{{ $data->jumlah_babs_jiwa }}</td>
                                <td class="text-center">{{ $data->memiliki_jamban_kk }}</td>
                                <td class="text-center">{{ $data->memiliki_jamban_jiwa }}</td>

                                <td class="text-center">{{ $data->tidak_memiliki_jamban_kk }}</td>
                                <td class="text-center">{{ $data->tidak_memiliki_jamban_jiwa }}</td>

                                <td class="text-center">{{ $data->rencana_pembangunan_tangki_septic }}</td>
                                <td class="text-center">{{ $data->rencana_pembangunan_sambungan_rumah }}</td>

                                <td class="text-wrap">{{ $data->keterangan }}</td>



                                <td style="text-align: right;">
                                    <div class="modal-success me-1 mb-1 d-inline-block">
                                        <button type="button" wire:click="LihatSanimas({{ $data->id }})"
                                            class="btn btn-sm btn-info rounded-pill">
                                            Lihat
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <div class="modal-success me-1 mb-1 d-inline-block">
                                        <button type="button" wire:click="EditSanimas({{ $data->id }})"
                                            class="btn btn-sm btn-warning rounded-pill">
                                            Edit
                                        </button>
                                    </div>
                                </td>


                                <td>
                                    <div class="modal-success me-1 mb-1 d-inline-block">
                                        <button wire:click='PDFSanimas({{ $data->id }})'
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
                                <td colspan="22">Data tidak ditemukan!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>


            </div>

            <div class="mt-4">
                {{ $sanimas->links() }}
            </div>

        </div>
    </section>




    <!--Modal Tambah -->
    <div wire:ignore.self class="modal fade" id="ModalTambahSanimas" tabindex="-1"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-scrollable modal-full" role="document">


            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah Sanimas</h5>
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
                    <form wire:submit.prevent="SimpanSanimas">
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



                                    <label>Jumlah Terbangun Septic Tank :</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JumlahTerbangunSepticTank"
                                            class="form-control">
                                        @error('JumlahTerbangunSepticTank')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Jumlah Terbangun Sambungan Rumah:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JumlahTerbangunSambunganRumah"
                                            class="form-control" onkeydown="return isNumberOrDot(event)">
                                        @error('JumlahTerbangunSambunganRumah')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>



                                    <label>Jumlah Penduduk KK:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JumlahPendudukKK" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('JumlahPendudukKK')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>



                                    <label>Jumlah Penduduk Jiwa:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JumlahPendudukJiwa" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('TargetPemanfaatanSR')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Latitude:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="Latitude" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('Latitude')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Longitude:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="Longitude" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('Longitude')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Permasalahan :</label>
                                    <div class="form-group mt-2 col-md-6">
                                        <textarea class="form-control" wire:model="Permasalahan" rows="3"></textarea>

                                        @error('Permasalahan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Tahun Pembangunan:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="TahunPembangunan" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('TahunPembangunan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Jumlah Anggaran:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JumlahAnggaran" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('JumlahAnggaran')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col">

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


                                    <label>Jumlah Babs KK:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JumlahBabsKK" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('JumlahBabsKK')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Jumlah Babs Jiwa:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JumlahBabsJiwa" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('JumlahBabsKK')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Penduduk Memiliki Jamban KK:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="MemilikiJambanKK" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('MemilikiJambanKK')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>Penduduk Memiliki Jamban Jiwa:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="MemilikiJambanJiwa" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('MemilikiJambanJiwa')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>Penduduk Tidak Memiliki Jamban KK:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="TidakMemilikiJambanKK" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('TidakMemilikiJambanKK')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>Penduduk Tidak Memiliki Jamban Jiwa:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="TidakMemilikiJambanJiwa"
                                            class="form-control" onkeydown="return isNumberOrDot(event)">
                                        @error('TidakMemilikiJambanJiwa')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Rencana Pembangunan Septic Tank + Jamban:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="RencanaPembangunanSepticTankJamban"
                                            class="form-control" onkeydown="return isNumberOrDot(event)">
                                        @error('RencanaPembangunanSepticTankJamban')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Rencana Pembangunan Sambungan Rumah:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="RencanaPembangunanSambunganRumah"
                                            class="form-control" onkeydown="return isNumberOrDot(event)">
                                        @error('RencanaPembangunanSambunganRumah')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Keterangan:</label>
                                    <div class="form-group mt-2 col-md-8">
                                        <textarea class="form-control" wire:model="Keterangan" rows="3"></textarea>
                                        @error('Keterangan')
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
    </div>

    <!--Modal Edit -->
    <div wire:ignore.self class="modal fade" id="ModalEditSanimas" tabindex="-1"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-scrollable modal-full" role="document">

            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">
                        Edit Sanimas</h5>
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
                    <form wire:submit.prevent="UpdateSanimas">
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



                                    <label>Jumlah Terbangun Septic Tank :</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JumlahTerbangunSepticTank"
                                            class="form-control">
                                        @error('JumlahTerbangunSepticTank')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Jumlah Terbangun Sambungan Rumah:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JumlahTerbangunSambunganRumah"
                                            class="form-control" onkeydown="return isNumberOrDot(event)">
                                        @error('JumlahTerbangunSambunganRumah')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>



                                    <label>Jumlah Penduduk KK:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JumlahPendudukKK" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('JumlahPendudukKK')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>



                                    <label>Jumlah Penduduk Jiwa:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JumlahPendudukJiwa" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('TargetPemanfaatanSR')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Latitude:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="Latitude" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('Latitude')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Longitude:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="Longitude" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('Longitude')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Permasalahan :</label>
                                    <div class="form-group mt-2 col-md-6">
                                        <textarea class="form-control" wire:model="Permasalahan" rows="3"></textarea>

                                        @error('Permasalahan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Tahun Pembangunan:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="TahunPembangunan" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('TahunPembangunan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Jumlah Anggaran:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JumlahAnggaran" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('JumlahAnggaran')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col">

                                    <label>Kondisi Eksisting dan Peta:</label>
                                    <div class="form-group mt-2 col-md-6">
                                        <input type="file" wire:model="KondisiEksisting"
                                            placeholder="Kondisi Eksisting" class="form-control">
                                        @error('KondisiEksisting')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mt-3 mb-3">
                                        @if ($Filename)
                                            <img src="{{ asset('storage/images/siperbakin/sanimas/' . $Filename) }}"
                                                width="300">
                                        @endif
                                    </div>


                                    <label>Jumlah Babs KK:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JumlahBabsKK" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('JumlahBabsKK')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Jumlah Babs Jiwa:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JumlahBabsJiwa" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('JumlahBabsKK')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Penduduk Memiliki Jamban KK:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="MemilikiJambanKK" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('MemilikiJambanKK')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>Penduduk Memiliki Jamban Jiwa:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="MemilikiJambanJiwa" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('MemilikiJambanJiwa')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label>Penduduk Tidak Memiliki Jamban KK:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="TidakMemilikiJambanKK" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('TidakMemilikiJambanKK')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Penduduk Tidak Memiliki Jamban Jiwa:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="TidakMemilikiJambanJiwa"
                                            class="form-control" onkeydown="return isNumberOrDot(event)">
                                        @error('TidakMemilikiJambanJiwa')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Rencana Pembangunan Septic Tank + Jamban:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="RencanaPembangunanSepticTankJamban"
                                            class="form-control" onkeydown="return isNumberOrDot(event)">
                                        @error('RencanaPembangunanSepticTankJamban')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Rencana Pembangunan Sambungan Rumah:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="RencanaPembangunanSambunganRumah"
                                            class="form-control" onkeydown="return isNumberOrDot(event)">
                                        @error('RencanaPembangunanSambunganRumah')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Keterangan:</label>
                                    <div class="form-group mt-2 col-md-8">
                                        <textarea class="form-control" wire:model="Keterangan" rows="3"></textarea>
                                        @error('Keterangan')
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
    </div>


    
    <!--Modal Lihat-->
    <div wire:ignore.self class="modal fade" id="ModalLihatSanimas" tabindex="-1"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title">
                        Lihat Sanimas</h5>
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

                        <h4 class="text-center mb-4">DETAIL SANIMAS</h4>

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
                                        <td><b>Jumlah Terbangun Septic Tank: </b> </td>
                                        <td>{{ $JumlahTerbangunSepticTank }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Jumlah Terbangun Sambungan Rumah: </b> </td>
                                        <td>{{ $JumlahTerbangunSambunganRumah }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Jumlah Penduduk KK: </b> </td>
                                        <td>{{ $JumlahPendudukKK }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Jumlah Penduduk Jiwa: </b> </td>
                                        <td>{{ $JumlahPendudukJiwa }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Latitude: </b> </td>
                                        <td>{{ $Latitude }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Longitude: </b> </td>
                                        <td>{{ $Longitude }}</td>
                                    </tr>


                                    <tr>
                                        <td><b>Permasalahan : </b> </td>
                                        <td>{{ $Permasalahan }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Tahun Pembangunan : </b> </td>
                                        <td>{{ $TahunPembangunan }}</td>
                                    </tr>


                                    <tr>
                                        <td><b>Jumlah Anggaran : </b> </td>
                                        <td>{{ $JumlahAnggaran }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Kondisi Eksisting dan Peta: </b> </td>
                                        <td>
                                            <div class="mt-3 mb-3">
                                                @if ($Filename)
                                                    <a href="{{ asset('storage/images/siperbakin/sanimas/' . $Filename) }}"
                                                        download>
                                                        <img src="{{ asset('storage/images/siperbakin/sanimas/' . $Filename) }}"
                                                            alt="Uploaded Image" width="300">
                                                    </a>
                                                @else
                                                    <span>No image uploaded</span>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><b>Jumlah BABS KK: </b> </td>
                                        <td>{{ $JumlahBabsKK }}</td>
                                    </tr>


                                    <tr>
                                        <td><b>Jumlah BABS Jiwa: </b> </td>
                                        <td>{{ $JumlahBabsJiwa }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Memiliki Jamban KK: </b> </td>
                                        <td>{{ $MemilikiJambanKK }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Memiliki Jamban Jiwa: </b> </td>
                                        <td>{{ $MemilikiJambanJiwa }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Tidak Memiliki Jamban KK : </b> </td>
                                        <td>{{ $TidakMemilikiJambanKK }}</td>
                                    </tr>


                                    <tr>
                                        <td><b>Tidak Memiliki Jamban Jiwa : </b> </td>
                                        <td>{{ $TidakMemilikiJambanJiwa }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Rencana Pembangunan Septic Tank + Jamban : </b> </td>
                                        <td>{{ $RencanaPembangunanSepticTankJamban }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Rencana Pembangunan Sambungan Rumah : </b> </td>
                                        <td>{{ $RencanaPembangunanSambunganRumah }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Keterangan : </b> </td>
                                        <td>{{ $Keterangan }}</td>
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
