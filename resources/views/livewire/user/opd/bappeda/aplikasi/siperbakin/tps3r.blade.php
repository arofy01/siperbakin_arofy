<div>
    <section class="section container">

        <div class="page-heading">
            <b>
                <p>Hai, {{ Auth::user()->name }} </p>
            </b>

            <p>TPS3R (Tempat Pengolahan Sampah Reduce-Reuse-Recycle) Di Kabupaten Aceh Tamiang</p>
        </div>


        <div class="card">
            <div class="card-header">

                @if (session()->has('message'))
                    <h5 class="alert alert-success ">{{ session('message') }}</h5>
                @endif

                <!-- Button trigger for modal untuk tambah pengguna -->
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                    wire:click="TampilModalTambahTPS3R">
                    <i class="bi bi-file-earmark-plus"></i> Tambah TPS3R
                </button>

                {{-- Pencarian --}}
                <input type="search" wire:model="search" class="form-control float-end mx-2" placeholder="Cari Desa"
                    style="width:230px;">

                <div class="mt-4">
                    <b>
                        <label class="text-primary">Total TPS3R : {{ $TotalTps3r }}</label>
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
                            <th>Pengelola</th>

                            <th class="text-wrap text-center">Jumlah Penduduk KK</th>
                            <th class="text-wrap text-center">Jumlah Penduduk Jiwa</th>

                            <th class="text-wrap text-center">Timbunan Sampah</th>
                            <th class="text-wrap text-center">Kapasitas TPS3R</th>
                            <th class="text-wrap text-center">Sampah Dikelola</th>

                            <th class="text-wrap text-center">Sampah Belum Dikelola</th>
                            <th class="text-wrap text-center">Kapasitas TPS3R Belum Digunakan</th>
                            <th class="text-wrap text-center">Latitude</th>

                            <th class="text-wrap text-center">Longitude</th>
                            <th class="text-wrap text-center">Jarak TPS3R Ke Pemukiman</th>
                            <th>Kondisi</th>

                            <th>Permasalahan</th>
                            <th class="text-wrap text-center">Jam Operasi</th>
                            <th class="text-wrap text-center">Tahun Pembangunan</th>

                            <th class="text-wrap text-center">Jumlah Anggaran</th>
                            <th class="text-wrap text-center">Kondisi Eksisting dan Peta</th>

                            <th class="text-wrap text-center">Rencana Pengembangan</th>

                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @forelse ($tps3r as $data)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $data->kecamatan->name }}</td>
                                <td>{{ $data->desa->name }}</td>
                                <td>{{ $data->pengelola }}</td>

                                <td class="text-center">{{ $data->jumlah_penduduk_kk }}</td>
                                <td class="text-center">{{ $data->jumlah_penduduk_jiwa }}</td>

                                <td class="text-center">{{ $data->timbunan_sampah }}</td>
                                <td class="text-center">{{ $data->kapasitas_tps3r }}</td>
                                <td class="text-center">{{ $data->sampah_dikelola }}</td>

                                <td class="text-center">{{ $data->sampah_belum_dikelola }}</td>
                                <td class="text-center">{{ $data->kapasitas_tps3r_belum_digunakan }}</td>
                                <td class="text-center">{{ $data->latitude }}</td>

                                <td>{{ $data->longitude }}</td>
                                <td>{{ $data->jarak_tps3r_ke_pemukiman }}</td>
                                <td>{{ $data->kondisi }}</td>

                                <td>{{ $data->permasalahan }}</td>
                                <td class="text-center">{{ $data->jam_operasi }}</td>

                                <td class="text-center">{{ $data->tahun_pembangunan }}</td>
                                <td class="text-center">Rp. {{ number_format($data->jumlah_anggaran, 0, ',', '.') }}
                                </td>


                                <td>
                                    <div>
                                        @if ($data->kondisi_eksisting)
                                            <a href="{{ asset('storage/images/siperbakin/tps3r/' . $data->kondisi_eksisting) }}"
                                                download>

                                                <img src="{{ asset('storage/images/siperbakin/tps3r/' . $data->kondisi_eksisting) }}"
                                                    a width="100">

                                            </a>
                                        @endif
                                    </div>
                                </td>

                                
                                <td  title="{{ $data->rencana_pengembangan }}">
                                    {{ \Illuminate\Support\Str::limit($data->rencana_pengembangan, 40) }}
                                </td>


                                <td style="text-align: right;">
                                    <div class="modal-success me-1 mb-1 d-inline-block">
                                        <button type="button" wire:click="LihatTps3r({{ $data->id }})"
                                            class="btn btn-sm btn-info rounded-pill">
                                            Lihat
                                        </button>
                                    </div>
                                </td>


                                <td>
                                    <div class="modal-success me-1 mb-1 d-inline-block">
                                        <button type="button" wire:click="EditTps3r({{ $data->id }})"
                                            class="btn btn-sm btn-warning rounded-pill">
                                            Edit
                                        </button>
                                    </div>
                                </td>


                                <td>
                                    <div class="modal-success me-1 mb-1 d-inline-block">
                                        <button wire:click='PDFTps3r({{ $data->id }})'
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
                                <td colspan="21">Data tidak ditemukan!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>


            </div>

            <div class="mt-4">
                {{ $tps3r->links() }}
            </div>

        </div>
    </section>


    <!--Modal Tambah -->
    <div wire:ignore.self class="modal fade" id="ModalTambahTPS3R" tabindex="-1"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-scrollable modal-full" role="document">


            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah TPS3R</h5>
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
                    <form wire:submit.prevent="SimpanTps3r">
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



                                    <label>Pengelola :</label>
                                    <div class="form-group mt-2 col-md-6">
                                        <input type="text" wire:model="Pengelola"
                                            class="form-control">
                                        @error('Pengelola')
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
                                        @error('JumlahPendudukJiwa')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>



                                    <label>Timbunan Sampah:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="TimbunanSampah" class="form-control">
                                        @error('TimbunanSampah')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Kapasitas TPS3R:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="KapasitasTPS3R" class="form-control">
                                        @error('KapasitasTPS3R')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Sampah Dikelola :</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="SampahDikelola" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('SampahDikelola')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Sampah Belum Dikelola:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="SampahBelumDikelola" class="form-control">
                                        @error('SampahBelumDikelola')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Kapasitas TPS3R Belum Digunakan :</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="KapasitasTPS3RBelumDigunakan"
                                            class="form-control">
                                        @error('KapasitasTPS3RBelumDigunakan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col">

                                    <label>Latitude :</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="Latitude" class="form-control">
                                        @error('Latitude')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>



                                    <label>Longitude :</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="Longitude" class="form-control">
                                        @error('Longitude')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>



                                    <label>Jarak TPS3R Ke Pemukiman:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JarakTPS3RKePemukiman"
                                            class="form-control">
                                        @error('JarakTPS3RKePemukiman')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


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


                                    <label>Permasalahan:</label>
                                    <div class="form-group mt-2 col-md-8">

                                        <textarea class="form-control" wire:model="Permasalahan" rows="3"></textarea>

                                        @error('Permasalahan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Jam Operasi:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JamOperasi" class="form-control">
                                        @error('JamOperasi')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Tahun Pembangunan :</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="TahunPembangunan" class="form-control">
                                        @error('TahunPembangunan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Jumlah Anggaran :</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JumlahAnggaran" class="form-control">
                                        @error('JumlahAnggaran')
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
                                            <img src="{{ $KondisiEksisting->temporaryUrl() }}" alt="Uploaded Image"
                                                width="300">
                                        @endif
                                    </div>



                                    <label>Rencana Pengembangan :</label>
                                    <div class="form-group mt-2 col-md-8">
                                        <textarea class="form-control" wire:model="RencanaPengembangan" rows="3"></textarea>
                                        @error('RencanaPengembangan')
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
    <div wire:ignore.self class="modal fade" id="ModalEditTPS3R" tabindex="-1"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-scrollable modal-full" role="document">

            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">
                        Edit TPS3R</h5>
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
                    <form wire:submit.prevent="UpdateTps3r">
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



                                    <label>Pengelola :</label>
                                    <div class="form-group mt-2 col-md-6">
                                        <input type="text" wire:model="Pengelola" 
                                            class="form-control">
                                        @error('Pengelola')
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
                                        @error('JumlahPendudukJiwa')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>



                                    <label>Timbunan Sampah:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="TimbunanSampah" class="form-control">
                                        @error('TimbunanSampah')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Kapasitas TPS3R:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="KapasitasTPS3R" class="form-control">
                                        @error('KapasitasTPS3R')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Sampah Dikelola :</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="SampahDikelola" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('SampahDikelola')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Sampah Belum Dikelola:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="SampahBelumDikelola" class="form-control">
                                        @error('SampahBelumDikelola')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Kapasitas TPS3R Belum Digunakan :</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="KapasitasTPS3RBelumDigunakan"
                                            class="form-control">
                                        @error('KapasitasTPS3RBelumDigunakan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col">

                                    <label>Latitude :</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="Latitude" class="form-control">
                                        @error('Latitude')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>



                                    <label>Longitude :</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="Longitude" class="form-control">
                                        @error('Longitude')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>



                                    <label>Jarak TPS3R Ke Pemukiman:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JarakTPS3RKePemukiman"
                                            class="form-control">
                                        @error('JarakTPS3RKePemukiman')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


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


                                    <label>Permasalahan:</label>
                                    <div class="form-group mt-2 col-md-8">

                                        <textarea class="form-control" wire:model="Permasalahan" rows="3"></textarea>

                                        @error('Permasalahan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Jam Operasi:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JamOperasi" class="form-control">
                                        @error('JamOperasi')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Tahun Pembangunan :</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="TahunPembangunan" class="form-control">
                                        @error('TahunPembangunan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Jumlah Anggaran :</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JumlahAnggaran" class="form-control">
                                        @error('JumlahAnggaran')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Kondisi Eksisting dan Peta:</label>
                                    <div class="form-group mt-2 col-md-6">
                                        <input type="file" wire:model="KondisiEksisting"
                                            placeholder="Kondisi Eksisting" class="form-control">
                                        @error('KondisiEksisting')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <div class="mt-3 mb-3">
                                            @if ($Filename)
                                                <img src="{{ asset('storage/images/siperbakin/tps3r/' . $Filename) }}"
                                                     width="300">
                                            @endif
                                        </div>

                                    </div>



                                    <label>Rencana Pengembangan :</label>
                                    <div class="form-group mt-2 col-md-8">
                                        <textarea class="form-control" wire:model="RencanaPengembangan" rows="3"></textarea>
                                        @error('RencanaPengembangan')
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
    <div wire:ignore.self class="modal fade" id="ModalLihatTPS3R" tabindex="-1"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title">
                        Lihat TPS3R</h5>
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

                        <h4 class="text-center mb-4">DETAIL TPS3R</h4>

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
                                        <td><b>Pengelola: </b> </td>
                                        <td>{{ $Pengelola }}</td>
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
                                        <td><b>Timbunan Sampah: </b> </td>
                                        <td>{{ $TimbunanSampah }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Kapasitas TPS3R: </b> </td>
                                        <td>{{ $KapasitasTPS3R }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Sampah Dikelola: </b> </td>
                                        <td>{{ $SampahDikelola }}</td>
                                    </tr>


                                    <tr>
                                        <td><b>Sampah Belum Dikelola: </b> </td>
                                        <td>{{ $SampahBelumDikelola }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Kapasitas TPS3R Belum Digunakan: </b> </td>
                                        <td>{{ $KapasitasTPS3RBelumDigunakan }}</td>
                                    </tr>


                                    <tr>
                                        <td><b>Latitude : </b> </td>
                                        <td>{{ $Latitude }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Longitude: </b> </td>
                                        <td>{{ $Longitude }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Jarak TPS3R Ke Pemukiman: </b> </td>
                                        <td>{{ $JarakTPS3RKePemukiman }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Kondisi: </b> </td>
                                        <td>{{ $Kondisi }}</td>
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
                                        <td><b>Jam Operasi : </b> </td>
                                        <td>{{ $JamOperasi }}</td>
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
                                        <td><b>Kondisi Eksisting dan Peta : </b> </td>
                                        <td>
                                            <div class="mt-3 mb-3">
                                                @if ($Filename)
                                                    <a href="{{ asset('storage/images/siperbakin/tps3r/' . $Filename) }}"
                                                        download>
                                                        <img src="{{ asset('storage/images/siperbakin/tps3r/' . $Filename) }}"
                                                            alt="Uploaded Image" width="300">
                                                    </a>
                                                @else
                                                    <span>No image uploaded</span>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><b>Rencana Pengembangan : </b> </td>
                                        <td>{{ $RencanaPengembangan }}</td>
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
