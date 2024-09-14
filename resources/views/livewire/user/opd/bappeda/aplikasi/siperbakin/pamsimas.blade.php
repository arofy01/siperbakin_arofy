<div>
    <section class="section container">

        <div class="page-heading">
            <b>
                <p>Hai, {{ Auth::user()->name }} </p>
            </b>

            <p>PAMSIMAS (Program Penyediaan Air Minum dan Sanitasi Berbasis Masyarakat) Di Kabupaten Aceh Tamiang</p>
        </div>


        <div class="card">
            <div class="card-header">


                @if (session()->has('message'))
                    <h5 class="alert alert-success ">{{ session('message') }}</h5>
                @endif

                <!-- Button trigger for modal untuk tambah pengguna -->
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                    wire:click="TampilModalTambahPamsimas">
                    <i class="bi bi-file-earmark-plus"></i> Tambah Pamsimas
                </button>

                {{-- Pencarian --}}
                <input type="search" wire:model="search" class="form-control float-end mx-2" placeholder="Cari Desa"
                    style="width:230px;">

                <div class="mt-4">
                    <b>
                        <label class="text-primary">Total Pamsimas : {{ $TotalPamsimas }}</label>
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

                            <th class="text-wrap text-center">Target Pemanfaatan SR</th>
                            <th class="text-wrap text-center">Target Pemanfaatan KK</th>
                            <th class="text-wrap text-center">Target Pemanfaatan Jiwa</th>

                            <th class="text-wrap text-center">Jumlah Terlayani SR</th>
                            <th class="text-wrap text-center">Jumlah Terlayani KK</th>
                            <th class="text-wrap text-center">Jumlah Terlayani Jiwa</th>

                            <th class="text-wrap text-center">Jumlah Belum Terlayani SR</th>
                            <th class="text-wrap text-center">Jumlah Belum Terlayani KK</th>
                            <th class="text-wrap text-center">Jumlah Belum Terlayani Jiwa</th>

                            <th>Latitude</th>
                            <th>Longitude</th>

                            <th class="text-wrap text-center">Berfungsi/Tidak Berfungsi</th>
                            <th class="text-wrap text-center">Permasalahan</th>

                            <th class="text-wrap text-center">Kapasitas Terpasang(L/Detik)</th>
                            <th class="text-wrap text-center">Kapatas Produksi(L/Detik)</th>

                            <th class="text-wrap text-center">Jam Operasi</th>
                            <th class="text-wrap text-center">Tahun Pembangunan</th>

                            <th class="text-wrap text-center">Jumlah Anggaran</th>
                            <th class="text-wrap text-center">Kondisi Eksisting dan Peta</th>

                            <th class="text-wrap text-center">Sumber Air</th>
                            <th class="text-wrap text-center">Rencana Pengembangan</th>

                            <th>Keterangan</th>

                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @forelse ($pamsimas as $data)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $data->kecamatan->name }}</td>
                                <td>{{ $data->desa->name }}</td>
                                <td>{{ $data->pengelola }}</td>

                                <td class="text-center">{{ $data->jumlah_penduduk_kk }}</td>
                                <td class="text-center">{{ $data->jumlah_penduduk_jiwa }}</td>

                                <td class="text-center">{{ $data->target_pemanfaatan_sr }}</td>
                                <td class="text-center">{{ $data->target_pemanfaatan_kk }}</td>
                                <td class="text-center">{{ $data->target_pemanfaatan_jiwa }}</td>

                                <td class="text-center">{{ $data->jumlah_terlayani_sr }}</td>
                                <td class="text-center">{{ $data->jumlah_terlayani_kk }}</td>
                                <td class="text-center">{{ $data->jumlah_terlayani_jiwa }}</td>

                                <td class="text-center">{{ $data->jumlah_belum_terlayani_sr }}</td>
                                <td class="text-center">{{ $data->jumlah_belum_terlayani_kk }}</td>
                                <td class="text-center">{{ $data->jumlah_belum_terlayani_jiwa }}</td>


                                <td >{{ $data->latitude }}</td>
                                <td>{{ $data->longitude }}</td>

                                <td>{{ $data->berfungsi }}</td>
                                <td>{{ $data->permasalahan }}</td>

                                <td class="text-center">{{ $data->kapasitas_terpasang }}</td>
                                <td class="text-center">{{ $data->kapasitas_produksi }}</td>

                                <td class="text-center">{{ $data->jam_operasi }}</td>
                                <td class="text-center">{{ $data->tahun_pembangunan }}</td>

                                <td>Rp. {{ number_format((float) $data->jumlah_anggaran, 0, ',', '.') }}</td>
                                <td>
                                    <div>
                                        @if($data->kondisi_eksisting)
                                        <a href="{{ asset('storage/images/siperbakin/pamsimas/' . $data->kondisi_eksisting) }}"
                                            download>
                                            <img src="{{ asset('storage/images/siperbakin/pamsimas/' . $data->kondisi_eksisting) }}"
                                                 width="100">
                                        </a>
                                        @endif
                                    </div>
                                </td>

                                <td>{{ $data->sumber_air }}</td>
                                <td>{{ $data->rencana_pengembangan }}</td>

                                <td  title="{{ $data->keterangan }}">
                                    {{ \Illuminate\Support\Str::limit($data->keterangan, 40) }}
                                </td>
                                



                                <td style="text-align: right;">
                                    <div class="modal-success me-1 mb-1 d-inline-block">
                                        <button type="button" wire:click="LihatPamsimas({{ $data->id }})"
                                            class="btn btn-sm btn-info rounded-pill">
                                            Lihat
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <div class="modal-success me-1 mb-1 d-inline-block">
                                        <button type="button" wire:click="EditPamsimas({{ $data->id }})"
                                            class="btn btn-sm btn-warning rounded-pill">
                                            Edit
                                        </button>
                                    </div>
                                </td>


                                <td>
                                    <div class="modal-success me-1 mb-1 d-inline-block">
                                        <button wire:click='PDFPamsimas({{ $data->id }})'
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
                                <td colspan="28">Data tidak ditemukan!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>


            </div>

            <div class="mt-4">
                {{ $pamsimas->links() }}
            </div>

        </div>
    </section>




    <!--Modal Tambah -->
    <div wire:ignore.self class="modal fade" id="ModalTambahPamsimas" tabindex="-1"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-scrollable modal-full" role="document">


            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah Pamsimas</h5>
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
                    <form wire:submit.prevent="SimpanPamsimas">
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
                                        <input type="text" wire:model="Pengelola" placeholder="Pengelola"
                                            class="form-control">
                                        @error('Pengelola')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Jumlah Penduduk KK:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JumlahPendudukKK"
                                            placeholder="Jumlah Penduduk KK" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('JumlahPendudukKK')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>



                                    <label>Jumlah Penduduk Jiwa:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JumlahPendudukJiwa"
                                            placeholder="Jumlah Penduduk Jiwa" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('JumlahPendudukJiwa')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>



                                    <label>Target Pemanfaatan SR:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="TargetPemanfaatanSR"
                                            placeholder="Target Pemanfaatan SR" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('TargetPemanfaatanSR')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Target Pemanfaatan KK:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="TargetPemanfaatanKK"
                                            placeholder="Target Pemanfaatan KK" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('TargetPemanfaatanKK')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Target Pemanfaatan Jiwa:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="TargetPemanfaatanJiwa"
                                            placeholder="Target Pemanfaatan Jiwa" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('TargetPemanfaatanJiwa')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Jumlah Terlayani SR:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JumlahTerlayaniSR"
                                            placeholder="Jumlah Terlayani SR" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('JumlahTerlayaniSR')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Jumlah Terlayani KK:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JumlahTerlayaniKK"
                                            placeholder="Jumlah Terlayani KK" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('JumlahTerlayaniKK')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Jumlah Terlayani Jiwa:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JumlahTerlayaniJiwa"
                                            placeholder="Jumlah Terlayani Jiwa" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('JumlahTerlayaniJiwa')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>



                                    <label>Jumlah Belum Terlayani SR:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JumlahBelumTerlayaniSR"
                                            placeholder="Jumlah Belum TerlayaniSR" class="form-control">
                                        @error('JumlahBelumTerlayaniSR')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>



                                    <label>Jumlah Belum Terlayani KK:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JumlahBelumTerlayaniKK"
                                            placeholder="Jumlah Belum TerlayaniKK" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('JumlahBelumTerlayaniKK')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Jumlah Belum Terlayani Jiwa:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JumlahBelumTerlayaniJiwa"
                                            placeholder="Jumlah Belum TerlayaniJiwa" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('JumlahBelumTerlayaniJiwa')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>



                                </div>



                                <div class="col">

                                    <label>Latitude:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="Latitude" placeholder="Latitude"
                                            class="form-control">
                                        @error('Latitude')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Longitude:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="Longitude" placeholder="Longitude"
                                            class="form-control">
                                        @error('Longitude')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Berfungsi / Tidak Berfungsi:</label>
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


                                    <label>Kapasitas Terpasang:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="KapasitasTerpasang"
                                            placeholder="Kapasitas Terpasang" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('KapasitasTerpasang')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Kapasitas Produksi:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="KapasitasProduksi"
                                            placeholder="Kapasitas Produksi" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('KapasitasProduksi')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Jam Operasi:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JamOperasi" placeholder="Jam Operasi"
                                            class="form-control">
                                        @error('JamOperasi')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Tahun Pembangunan:</label>
                                    <div class="form-group mt-2 col-md-3">
                                        <input type="text" wire:model="TahunPembangunan"
                                            placeholder="Tahun Pembangunan" class="form-control">
                                        @error('TahunPembangunan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Jumlah Anggaran:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JumlahAnggaran"
                                            placeholder="Jumlah Anggaran" class="form-control">
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
                                    </div>



                                    <div class="mt-3 mb-3">
                                        @if ($KondisiEksisting && is_object($KondisiEksisting))
                                            {{-- <img src="{{ $this->Gambar }}" alt="Uploaded Image" width="300"> --}}
                                            <img src="{{ $KondisiEksisting->temporaryUrl() }}" alt="Uploaded Image"
                                                width="300">
                                        @endif
                                    </div>


                                    <label>Sumber Air:</label>
                                    <div class="form-group mt-2 col-md-6">
                                        <input type="text" wire:model="SumberAir" placeholder="Sumber Air"
                                            class="form-control">
                                        @error('SumberAir')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Rencana Pengembangan - Sambungan Rumah (SR):</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="RencanaPengembangan"
                                            placeholder="Rencana Pengembangan" class="form-control">
                                        @error('RencanaPengembangan')
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
    <div wire:ignore.self class="modal fade" id="ModalEditPamsimas" tabindex="-1"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-scrollable modal-full" role="document">

            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">
                        Edit Pamsimas</h5>
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



                                    <label>Pengelola :</label>
                                    <div class="form-group mt-2 col-md-6">
                                        <input type="text" wire:model="Pengelola" placeholder="Pengelola"
                                            class="form-control">
                                        @error('Pengelola')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Jumlah Penduduk KK:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JumlahPendudukKK"
                                            placeholder="Jumlah Penduduk KK" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('JumlahPendudukKK')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>



                                    <label>Jumlah Penduduk Jiwa:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JumlahPendudukJiwa"
                                            placeholder="Jumlah Penduduk Jiwa" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('JumlahPendudukJiwa')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>



                                    <label>Target Pemanfaatan SR:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="TargetPemanfaatanSR"
                                            placeholder="Target Pemanfaatan SR" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('TargetPemanfaatanSR')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Target Pemanfaatan KK:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="TargetPemanfaatanKK"
                                            placeholder="Target Pemanfaatan KK" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('TargetPemanfaatanKK')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Target Pemanfaatan Jiwa:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="TargetPemanfaatanJiwa"
                                            placeholder="Target Pemanfaatan Jiwa" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('TargetPemanfaatanJiwa')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Jumlah Terlayani SR:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JumlahTerlayaniSR"
                                            placeholder="Jumlah Terlayani SR" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('JumlahTerlayaniSR')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Jumlah Terlayani KK:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JumlahTerlayaniKK"
                                            placeholder="Jumlah Terlayani KK" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('JumlahTerlayaniKK')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Jumlah Terlayani Jiwa:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JumlahTerlayaniJiwa"
                                            placeholder="Jumlah Terlayani Jiwa" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('JumlahTerlayaniJiwa')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>



                                    <label>Jumlah Belum Terlayani SR:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JumlahBelumTerlayaniSR"
                                            placeholder="Jumlah Belum TerlayaniSR" class="form-control">
                                        @error('JumlahBelumTerlayaniSR')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>



                                    <label>Jumlah Belum Terlayani KK:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JumlahBelumTerlayaniKK"
                                            placeholder="Jumlah Belum TerlayaniKK" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('JumlahBelumTerlayaniKK')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Jumlah Belum Terlayani Jiwa:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JumlahBelumTerlayaniJiwa"
                                            placeholder="Jumlah Belum TerlayaniJiwa" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('JumlahBelumTerlayaniJiwa')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>



                                </div>

                                <div class="col">

                                    <label>Latitude:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="Latitude" placeholder="Latitude"
                                            class="form-control">
                                        @error('Latitude')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Longitude:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="Longitude" placeholder="Longitude"
                                            class="form-control">
                                        @error('Longitude')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Berfungsi / Tidak Berfungsi:</label>
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


                                    <label>Kapasitas Terpasang:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="KapasitasTerpasang"
                                            placeholder="Kapasitas Terpasang" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('KapasitasTerpasang')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Kapasitas Produksi:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="KapasitasProduksi"
                                            placeholder="Kapasitas Produksi" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('KapasitasProduksi')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Jam Operasi:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JamOperasi" placeholder="Jam Operasi"
                                            class="form-control">
                                        @error('JamOperasi')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Tahun Pembangunan:</label>
                                    <div class="form-group mt-2 col-md-3">
                                        <input type="text" wire:model="TahunPembangunan"
                                            placeholder="Tahun Pembangunan" class="form-control">
                                        @error('TahunPembangunan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Jumlah Anggaran:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JumlahAnggaran"
                                            placeholder="Jumlah Anggaran" class="form-control">
                                        @error('JumlahAnggaran')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Kondisi Eksisting dan Peta:</label>
                                    <div class="form-group mt-2 col-md-6">
                                        <input type="file" wire:model="KondisiEksisting"
                                             class="form-control">

                                        @error('KondisiEksisting')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="mt-3 mb-3">
                                        @if ($Filename)
                                            <img src="{{ asset('storage/images/siperbakin/pamsimas/' . $Filename) }}"
                                                alt="Uploaded Image" width="300">
                                        @endif
                                    </div>


                                    <label>Sumber Air:</label>
                                    <div class="form-group mt-2 col-md-6">
                                        <input type="text" wire:model="SumberAir" placeholder="Sumber Air"
                                            class="form-control">
                                        @error('SumberAir')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Rencana Pengembangan - Sambungan Rumah (SR):</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="RencanaPengembangan"
                                            placeholder="Rencana Pengembangan" class="form-control">
                                        @error('RencanaPengembangan')
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
    <div wire:ignore.self class="modal fade" id="ModalLihatPamsimas" tabindex="-1"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title">
                        Lihat Pamsimas</h5>
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

                        <h4 class="text-center mb-4">DETAIL PAMSIMAS</h4>

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
                                        <td><b>Target Pemanfaat SR: </b> </td>
                                        <td>{{ $TargetPemanfaatanSR }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Target Pemanfaat KK: </b> </td>
                                        <td>{{ $TargetPemanfaatanKK }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Target Pemanfaat Jiwa: </b> </td>
                                        <td>{{ $TargetPemanfaatanJiwa }}</td>
                                    </tr>


                                    <tr>
                                        <td><b>Jumlah Terlayani SR: </b> </td>
                                        <td>{{ $JumlahTerlayaniSR }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Jumlah Terlayani KK: </b> </td>
                                        <td>{{ $JumlahTerlayaniKK }}</td>
                                    </tr>


                                    <tr>
                                        <td><b>Jumlah Terlayani Jiwa: </b> </td>
                                        <td>{{ $JumlahTerlayaniJiwa }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Jumlah Belum Terlayani SR: </b> </td>
                                        <td>{{ $JumlahBelumTerlayaniSR }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Jumlah Belum Terlayani KK: </b> </td>
                                        <td>{{ $JumlahBelumTerlayaniKK }}</td>
                                    </tr>


                                    <tr>
                                        <td><b>Jumlah Belum Terlayani Jiwa: </b> </td>
                                        <td>{{ $JumlahBelumTerlayaniJiwa }}</td>
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
                                        <td><b>Berfungsi / Tidak Berfungsi : </b> </td>
                                        <td>{{ $Berfungsi }}</td>
                                    </tr>


                                    <tr>
                                        <td><b>Permasalahan : </b> </td>
                                        <td>{{ $Permasalahan }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Kapasitas Terpasang : </b> </td>
                                        <td>{{ $KapasitasTerpasang }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Kapasitas Produksi : </b> </td>
                                        <td>{{ $KapasitasProduksi }}</td>
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
                                                <a href="{{ asset('storage/images/siperbakin/pamsimas/' . $Filename) }}"
                                                    download>
                                                    <img src="{{ asset('storage/images/siperbakin/pamsimas/' . $Filename) }}"
                                                        alt="Uploaded Image" width="300">
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><b>Sumber Air : </b> </td>
                                        <td>{{ $SumberAir }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Rencana Pengembangan : </b> </td>
                                        <td>{{ $RencanaPengembangan }}</td>
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
