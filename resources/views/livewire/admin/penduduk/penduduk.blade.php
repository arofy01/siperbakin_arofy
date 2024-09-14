<div>
    <section class="section">
        <div class="card">

            <div class="card-header">

                @if (session()->has('message'))
                    <h5 class="alert alert-success ">{{ session('message') }}</h5>
                @endif

                <!-- Button trigger for modal untuk tambah jenis pengguna -->
                <button type="button" class="btn btn-outline-primary mt-2" wire:click="TampilModalTambahPenduduk">
                    Tambah Penduduk +
                </button>

                {{-- Pencarian --}}
                <input type="search" wire:model="search" class="form-control float-end mx-2 mt-2" placeholder="Cari"
                    style="width:230px;">
            </div>

            {{-- Menambah garis --}}
            <hr>

            <div class="card-body mt-2" style="overflow-x:auto;">
                <table class="table table-striped" style="width:100%; white-space: nowrap;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Status Pernikahan</th>
                            <th>Agama</th>
                            <th>Alamat</th>
                            <th>Provinsi</th>
                            <th>Kabupaten</th>
                            <th>Kecamatan</th>
                            <th>Desa</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($penduduk as $data)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $data->nik }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->jenis_kelamin }}</td>
                                <td>{{ $data->tempat_lahir }}</td>
                                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->tanggal_lahir)->format('d/m/Y') }}
                                </td>
                                <td>{{ $data->status_pernikahan }}</td>
                                <td>{{ $data->agama }}</td>
                                <td>{{ $data->alamat }}</td>
                                <td>{{ $data->kode_provinsi }}</td>
                                <td>{{ $data->kode_kabupaten }}</td>
                                <td>{{ $data->kode_kecamatan }}</td>
                                <td>{{ $data->kode_desa }}</td>

                                <td style="text-align: right;">
                                    <!-- Button trigger for download pdf -->
                                    <div class="modal-info me-1 mb-1 d-inline-block">
                                        <button type="button" wire:click="DownloadPdfPenduduk({{ $data->id }})"
                                            class="btn btn-sm btn-success rounded-pill">
                                            <i class="bi bi-file-earmark-pdf"></i>
                                            PDF
                                        </button>
                                    </div>

                                    <!-- Button trigger for lihat modal -->
                                    <div class="modal-info me-1 mb-1 d-inline-block">
                                        <button type="button" wire:click="LihatPenduduk({{ $data->id }})"
                                            class="btn btn-sm btn-info rounded-pill" data-bs-toggle="modal">
                                            Lihat
                                        </button>
                                    </div>

                                    <!-- Button trigger for edit modal -->
                                    <div class="modal-warning me-1 mb-1 d-inline-block">
                                        <button type="button" wire:click="EditPenduduk({{ $data->id }})"
                                            class="btn btn-sm btn-warning rounded-pill" data-bs-toggle="modal">
                                            Edit
                                        </button>
                                    </div>

                                    <!-- Button trigger for delete -->
                                    <div class="modal-success me-1 mb-1 d-inline-block">
                                        <button wire:click='konfirmasihapus({{ $data->id }})'
                                            class="btn btn-sm btn-danger rounded pill">Hapus</button>
                                    </div>
                                </td>

                            </tr>
                            <?php $no++; ?>
                        @endforeach

                    </tbody>
                </table>

                <div>
                    {{ $penduduk->links() }}
                </div>
            </div>
        </div>


        <!--Tambah Modal -->
        <div wire:ignore.self class="modal fade modal-lg" id="ModalTambahPenduduk" tabindex="-1"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-scrollable modal-full" role="document">

                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah Penduduk</h5>
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
                        <form wire:submit.prevent="create">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col">
                                        <label>NIK :</label>
                                        @error('NIK')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="form-group mt-2">
                                            <input type="text" wire:model="NIK"
                                                placeholder="Nomor Induk Kependudukan" class="form-control">
                                        </div>

                                        <label>Nama :</label>
                                        @error('Nama')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="form-group mt-2">
                                            <input type="text" wire:model="Nama" placeholder="Nama"
                                                class="form-control">
                                        </div>

                                        <label>Jenis Kelamin :</label>
                                        @error('JenisKelamin')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="form-group mt-2">
                                            <select class="choices form-select" wire:model="JenisKelamin">
                                                <option value="">--Pilih Jenis Kelamin--</option>
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div> 

                                        <label>Tempat Lahir :</label>
                                        @error('TempatLahir')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="form-group mt-2">
                                            <input type="text" wire:model="TempatLahir" placeholder="Tempat Lahir"
                                                class="form-control">
                                        </div>

                                        <label>Tanggal Lahir :</label>
                                        @error('TanggalLahir')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="form-group mt-2">
                                            <input type="date" wire:model="TanggalLahir" class="form-control"
                                                id="TanggalLahir">
                                        </div>

                                        <label>Status Pernikahan :</label>
                                        <div class="form-group mt-2">
                                            <select class="choices form-select" wire:model="StatusPernikahan">
                                                <option value="">--Pilih Status Pernikahan--</option>
                                                <option value="Belum Menikah">Belum Menikah</option>
                                                <option value="Menikah">Menikah</option>
                                                <option value="Janda">Janda</option>
                                                <option value="Duda">Duda</option>
                                            </select>
                                        </div>
                                        <label>Agama :</label>
                                        <div class="form-group mt-2">
                                            <select class="choices form-select" wire:model="Agama">
                                                <option value="">--Pilih Agama--</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen Katolik">Kristen</option>
                                                <option value="Kristen Protestan">Protestan</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Kong Hu Chu">Kong Hu Cu</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <label>Alamat :</label>
                                        <div class="form-group mt-2">
                                            <textarea class="form-control" wire:model="Alamat" id="Alamat" rows="3" style="height: 80px;"></textarea>

                                            @error('Alamat')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <label>Provinsi :</label>
                                        <div class="form-group mt-2">
                                            <select class="form-select" wire:model="KodeProvinsi">
                                                <option value="" selected>--Pilih Provinsi--</option>
                                                @foreach ($provinces as $provinsi)
                                                    <option value="{{ $provinsi->id }}">
                                                        {{ $provinsi->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('KodeProvinsi')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        @if (!is_null($KodeProvinsi))
                                            <label>Kabupaten:</label>
                                            <div class="form-group mt-2">
                                                <select class="form-select" wire:model="KodeKabupaten">
                                                    <option value="">--Pilih Kabupaten--</option>
                                                    @foreach ($regencies as $kabupaten)
                                                        <option value="{{ $kabupaten->id }}">
                                                            {{ $kabupaten->name }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                @error('KodeKabupaten')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        @endif

                                        @if (!is_null($KodeKabupaten))
                                            <label>Kecamatan:</label>
                                            <div class="form-group mt-2">
                                                <select class="form-select" wire:model="KodeKecamatan">
                                                    <option value="">--Kecamatan--</option>
                                                    @foreach ($districts as $kecamatan)
                                                        <option value="{{ $kecamatan->id }}">
                                                            {{ $kecamatan->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('KodeKecamatan')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        @endif

                                        @if (!is_null($KodeKecamatan))
                                            <label>Desa:</label>
                                            <div class="form-group mt-2">
                                                <select class="form-select" wire:model="KodeDesa">
                                                    <option value="">--Pilih Desa--</option>
                                                    @foreach ($villages as $desa)
                                                        <option value="{{ $desa->id }}">
                                                            {{ $desa->name }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                @error('KodeDesa')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" wire:click="resetInput" class="btn btn-light-secondary"
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

        <!--Edit Modal -->
        <div wire:ignore.self class="modal fade modal-lg" id="ModalEditPenduduk" tabindex="-1"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-scrollable modal-full" role="document">

                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Penduduk</h5>
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
                        <form wire:submit.prevent="UpdatePenduduk">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col">
                                        <label>NIK :</label>
                                        <div class="form-group mt-2">
                                            <input type="text" wire:model="NIK"
                                                placeholder="Nomor Induk Kependudukan" class="form-control">
                                            @error('NIK')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <label>Nama :</label>
                                        <div class="form-group mt-2">
                                            <input type="text" wire:model="Nama" placeholder="Nama"
                                                class="form-control">
                                            @error('Nama')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <label>Jenis Kelamin :</label>
                                        <div class="form-group mt-2">
                                            <select class="choices form-select" wire:model="JenisKelamin">
                                                <option value="">--Pilih Jenis Kelamin--</option>
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                            @error('JenisKelamin')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <label>Tempat Lahir :</label>
                                        <div class="form-group mt-2">
                                            <input type="text" wire:model="TempatLahir" placeholder="Tempat Lahir"
                                                class="form-control">
                                            @error('TempatLahir')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <label>Tanggal Lahir :</label>
                                        <div class="form-group mt-2">
                                            <input type="date" wire:model="TanggalLahir" class="form-control"
                                                id="TanggalLahir">
                                            @error('TanggalLahir')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <label>Status Pernikahan :</label>
                                        <div class="form-group mt-2">
                                            <select class="choices form-select" wire:model="StatusPernikahan">
                                                <option value="">--Pilih Status Pernikahan--</option>
                                                <option value="Belum Menikah">Belum Menikah</option>
                                                <option value="Menikah">Menikah</option>
                                                <option value="Janda">Janda</option>
                                                <option value="Duda">Duda</option>
                                            </select>
                                            @error('StatusPernikahan')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <label>Agama :</label>
                                        <div class="form-group mt-2">
                                            <select class="choices form-select" wire:model="Agama">
                                                <option value="">--Pilih Agama--</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen Katolik">Kristen</option>
                                                <option value="Kristen Protestan">Protestan</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Kong Hu Chu">Kong Hu Cu</option>
                                            </select>
                                            @error('Agama')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col">
                                        <label>Alamat :</label>
                                        <div class="form-group mt-2">
                                            <textarea class="form-control" wire:model="Alamat" id="Alamat" rows="3" style="height: 80px;"></textarea>
                                            @error('Alamat')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>



                                        <label>Provinsi:</label>
                                        <div class="form-group mt-2">
                                            <select class="form-select" wire:model="KodeProvinsi">
                                                <option value="" selected>--Pilih Provinsi--</option>
                                                @foreach ($provinces as $provinsi)
                                                    <option value="{{ $provinsi->id }}"
                                                        {{ $KodeProvinsi === $provinsi->id ? 'selected' : '' }}>
                                                        {{ $provinsi->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('KodeProvinsi')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <label>Kabupaten:</label>
                                        <div class="form-group mt-2">
                                            <select class="form-select" wire:model="KodeKabupaten">
                                                <option value="">--Pilih Kabupaten--</option>
                                                @foreach ($regencies as $kabupaten)
                                                    <option value="{{ $kabupaten->id }}"
                                                        {{ $KodeKabupaten === $kabupaten->id ? 'selected' : '' }}>
                                                        {{ $kabupaten->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('KodeKabupaten')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <label>Kecamatan:</label>
                                        <div class="form-group mt-2">
                                            <select class="form-select" wire:model="KodeKecamatan">
                                                <option value="">--Kecamatan--</option>

                                                @foreach ($districts as $kecamatan)
                                                    <option value="{{ $kecamatan->id }}"
                                                        {{ $KodeKecamatan === $kecamatan->id ? 'selected' : '' }}>
                                                        {{ $kecamatan->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('KodeKecamatan')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <label>Desa:</label>
                                        <div class="form-group mt-2">
                                            <select class="form-select" wire:model="KodeDesa">
                                                <option value="">--Pilih Desa--</option>
                                                @foreach ($villages as $desa)
                                                    <option value="{{ $desa->id }}"
                                                        {{ $KodeDesa === $desa->id ? 'selected' : '' }}>
                                                        {{ $desa->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('KodeDesa')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" wire:click="resetInput" class="btn btn-light-secondary"
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

        <!--Lihat Modal -->
        <div wire:ignore.self class="modal fade modal-lg" id="ModalLihatPenduduk" tabindex="-1"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-scrollable" role="document">

                <div class="modal-content">

                    <div class="modal-header bg-info">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Lihat Penduduk</h5>
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

                    <div class="modal-body" style="text-align: left;">

                        <div class="text-center"><h1>DETAIL PENDUDUK</h1></div>
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">

                                <tbody>
                                    <tr>
                                       
                                        <td><b>NIK : </b></td>
                                        <td>{{ $NIK }}</td>

                                    </tr>
                                    <tr>
                                        <td><b>Nama : </b></td>
                                        <td>{{ $Nama }}</td>

                                    </tr>
                                    <tr>
                                        <td><b>Jenis Kelamin :</b> </td>
                                        <td>{{ $JenisKelamin }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Tempat Lahir :</b> </td>
                                        <td>{{ $TempatLahir }}</td>

                                    </tr>

                                    <tr>
                                        <td><b>Tanggal Lahir :</b> </td>
                                        <td>{{ $TanggalLahir }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Status Pernikahan :</b> </td>
                                        <td>{{ $StatusPernikahan }}</td>

                                    </tr>
                                    <tr>
                                        <td><b>Agama : </b></td>
                                        <td>{{ $Agama }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Alamat : </b></td>
                                        <td>{{ $Alamat }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Provinsi :</b> </td>
                                        <td>{{ $KodeProvinsi }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Kabupaten :</b> </td>
                                        <td>{{ $KodeKabupaten }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Kecamatan : </b></td>
                                        <td>{{ $KodeKecamatan }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Desa :</b> </td>
                                        <td>{{ $KodeDesa }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" wire:click="resetInput" class="btn btn-light-secondary"
                            data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Tutup</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
