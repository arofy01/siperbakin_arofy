<div>
    <section class="section container">

        <div class="page-heading">
            <b>
                <p>Hai, {{ Auth::user()->name }} </p>
            </b>

            <p>Ipal ( Instalasi Pengolahan Air Limbah) dan Septik Tank</p>
        </div>


        <div class="card">
            <div class="card-header">


                @if (session()->has('message'))
                    <h5 class="alert alert-success ">{{ session('message') }}</h5>
                @endif

                <!-- Button trigger for modal untuk tambah pengguna -->
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                    wire:click="TampilModalTambahIpaldanSepticTank">
                    <i class="bi bi-file-earmark-plus"></i> Tambah Ipal dan Septik Tank
                </button>

                {{-- Pencarian --}}
                <input type="search" wire:model="search" class="form-control float-end mx-2" placeholder="Cari Desa"
                    style="width:230px;">

                <div class="mt-4">
                    <b>
                        <label class="text-primary">Total Ipal dan Septik Tank : {{ $TotalIpaldanseptictank }}</label>
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
                            <th>Uraian</th>
                            <th class="text-wrap text-center">Nilai Anggaran</th>
                            <th>Jenis Ipal</th>
                            <th>Kondisi</th>
                            <th class="text-wrap text-center">Jumlah Tangki Septik</th>
                            <th class="text-wrap text-center">Jumlah Sambungan Rumah</th>
                            <th class="text-wrap text-center">Kondisi Eksisting dan Peta</th>


                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @forelse ($ipaldanseptictank as $data)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $data->kecamatan->name }}</td>
                                <td>{{ $data->desa->name }}</td>
                                <td  title="{{ $data->uraian }}">
                                    {{ \Illuminate\Support\Str::limit($data->uraian, 40) }}
                                </td>
                                <td>Rp. {{ number_format((float) $data->nilai_anggaran, 0, ',', '.') }}</td>
                                <td>{{ $data->jenis_ipal }}</td>
                                <td>{{ $data->kondisi }}</td>
                                <td class="text-center">{{ $data->jumlah_tangki_septic }}</td>
                                <td class="text-center">{{ $data->jumlah_sambungan_rumah }}</td>
                                <td>
                                    <div>
                                        @if ($data->kondisi_eksisting)
                                            <a href="{{ asset('storage/images/siperbakin/ipaldanseptictank/' . $data->kondisi_eksisting) }}"
                                                download>
                                                <img src="{{ asset('storage/images/siperbakin/ipaldanseptictank/' . $data->kondisi_eksisting) }}"
                                                    width="100">
                                            </a>
                                        @endif
                                    </div>
                                </td>

                                <td style="text-align: right;">
                                    <div class="modal-success me-1 mb-1 d-inline-block">
                                        <button type="button" wire:click="LihatIpaldanseptictank({{ $data->id }})"
                                            class="btn btn-sm btn-info rounded-pill">
                                            Lihat
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <div class="modal-success me-1 mb-1 d-inline-block">
                                        <button type="button" wire:click="EditIpaldanseptictank({{ $data->id }})"
                                            class="btn btn-sm btn-warning rounded-pill">
                                            Edit
                                        </button>
                                    </div>
                                </td>


                                <td>
                                    <div class="modal-success me-1 mb-1 d-inline-block">
                                        <button wire:click='PDFIpaldanseptictank({{ $data->id }})'
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
                                <td colspan="10">Data tidak ditemukan!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>


            </div>

            <div class="mt-4">
                {{ $ipaldanseptictank->links() }}
            </div>

        </div>
    </section>




    <!--Modal Tambah -->
    <div wire:ignore.self class="modal fade" id="ModalTambahIpaldanSepticTank" tabindex="-1"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-scrollable modal-full" role="document">


            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah Ipal dan Septic Tank</h5>
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
                    <form wire:submit.prevent="SimpanIpaldanseptictank">
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



                                    <label>Uraian :</label>
                                    <div class="form-group mt-2 col-md-8">
                                        <textarea class="form-control" wire:model="Uraian" rows="3"></textarea>
                                        @error('Uraian')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Nilai Anggaran (Rp):</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="NilaiAnggaran" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('NilaiAnggaran')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>



                                    <label>Jenis IPAL:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <select class="form-select" wire:model="JenisIpal">
                                            <option value="">--Pilih Jenis IPAL--</option>
                                            <option value="Komunal">
                                                Komunal
                                            </option>
                                            <option value="Indivdual">
                                                Individual
                                            </option>
                                        </select>
                                        @error('JenisIpal')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col">
                                    <label>Kondisi:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <select class="form-select" wire:model="Kondisi">
                                            <option value="">--Pilih Kondisi--</option>
                                            <option value="Berfungsi">
                                                Berfungsi
                                            </option>
                                            <option value="Tidak Berfungsi">
                                                Tidak Berfungsi
                                            </option>
                                        </select>

                                        @error('Kondisi')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Jumlah Tangki Septic (Unit):</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JumlahTangkiSeptic" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('JumlahTangkiSeptic')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Jumlah Sambungan Rumah:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JumlahSambunganRumah" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('JumlahSambunganRumah')
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
    <div wire:ignore.self class="modal fade" id="ModalEditIpaldanSepticTank" tabindex="-1"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-scrollable modal-full" role="document">

            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">
                        Edit Ipal dan Septic Tank</h5>
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
                    <form wire:submit.prevent="UpdateIpaldanseptictank">
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



                                    <label>Uraian :</label>
                                    <div class="form-group mt-2 col-md-6">
                                        <textarea class="form-control" wire:model="Uraian" rows="3"></textarea>
                                        @error('Uraian')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Nilai Anggaran (Rp):</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="NilaiAnggaran" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('NilaiAnggaran')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>



                                    <label>Jenis IPAL:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <select class="form-select" wire:model="JenisIpal">
                                            <option value="">--Pilih Jenis IPAL--</option>
                                            <option value="Komunal">
                                                Komunal
                                            </option>
                                            <option value="Indivdual">
                                                Individual
                                            </option>
                                        </select>
                                        @error('JenisIpal')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col">
                                    <label>Kondisi:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <select class="form-select" wire:model="Kondisi">
                                            <option value="">--Pilih Kondisi--</option>
                                            <option value="Berfungsi">
                                                Berfungsi
                                            </option>
                                            <option value="Tidak Berfungsi">
                                                Tidak Berfungsi
                                            </option>
                                        </select>

                                        @error('Kondisi')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Jumlah Tangki Septic (Unit):</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JumlahTangkiSeptic" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('JumlahTangkiSeptic')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label>Jumlah Sambungan Rumah:</label>
                                    <div class="form-group mt-2 col-md-4">
                                        <input type="text" wire:model="JumlahSambunganRumah" class="form-control"
                                            onkeydown="return isNumberOrDot(event)">
                                        @error('JumlahSambunganRumah')
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
                                        @if ($Filename)
                                            <img src="{{ asset('storage/images/siperbakin/ipaldanseptictank/' . $Filename) }}"
                                                alt="Uploaded Image" width="300">
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
    <div wire:ignore.self class="modal fade" id="ModalLihatIpaldanSepticTank" tabindex="-1"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title">
                        Lihat Ipal dan Septic Tank</h5>
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

                        <h4 class="text-center mb-4">DETAIL IPAL DAN SEPTIC TANK</h4>

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
                                        <td><b>Uraian : </b> </td>
                                        <td>{{ $Uraian }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Nilai Anggaran (Rp): </b> </td>
                                        <td>{{ $NilaiAnggaran }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Jenis IPAL: </b> </td>
                                        <td>{{ $JenisIpal }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Kondisi: </b> </td>
                                        <td>{{ $Kondisi }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Jumlah Tangki Septic (Unit): </b> </td>
                                        <td>{{ $JumlahTangkiSeptic }}</td>
                                    </tr>


                                    <tr>
                                        <td><b>Jumlah Sambungan Rumah (Unit): </b> </td>
                                        <td>{{ $JumlahSambunganRumah }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Kondisi Eksisting dan Peta : </b> </td>
                                        <td>
                                            <div class="mt-3 mb-3">
                                                <a href="{{ asset('storage/images/siperbakin/ipaldanseptictank/' . $Filename) }}"
                                                    download>
                                                    <img src="{{ asset('storage/images/siperbakin/ipaldanseptictank/' . $Filename) }}"
                                                         width="300">
                                                </a>
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
