<div>
    <section class="section">
        <div class="card">

            <div class="card-header">
                @if (session()->has('message'))
                    <h5 class="alert alert-success ">{{ session('message') }}</h5>
                @endif

                <!-- Button trigger for modal untuk tambah pengguna -->
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                    wire:click="TampilModalTambahLembaga">
                    Tambah Lembaga +
                </button>

                {{-- Pencarian --}}
                <input type="search" wire:model="search" class="form-control float-end mx-2" placeholder="Cari"
                    style="width:230px;">
            </div>

            {{-- Menambahkan garis --}}
            <hr>

            <div class="card-body mt-2" style="overflow-x:auto;">

                <table class="table table-striped" style="width:100%; white-space: nowrap;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lembaga</th>
                            <th>Nama Singkat</th>
                            <th>Jenis Lembaga</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @forelse ($lembaga as $data)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $data->nama_lembaga }}</td>
                                <td>{{ $data->nama_singkat_lembaga }}</td>
                                <td>{{ $data->jenislembaga->nama_jenis_lembaga }}</td>
                                <td>{{ $data->alamat }}</td>
                                <td>{{ $data->email }}</td>
                                <td></td>
                                <td></td>
                                <td></td>

                                <td style="text-align: right;">
                                    <div class="modal-success me-1 mb-1 d-inline-block">
                                        <button type="button" wire:click="LihatLembaga({{ $data->id }})"
                                            class="btn btn-sm btn-info rounded-pill">
                                            Lihat
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <div class="modal-success me-1 mb-1 d-inline-block">
                                        <button type="button" wire:click="EditLembaga({{ $data->id }})"
                                            class="btn btn-sm btn-warning rounded-pill">
                                            Edit
                                        </button>
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
                                <td colspan="8">Data tidak ditemukan!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div>
                    {{ $lembaga->links() }}
                </div>
            </div>
        </div>




        <!--Modal Tambah -->
        <div wire:ignore.self class="modal fade" id="ModalTambahLembaga" tabindex="-1"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-scrollable modal-full" role="document">


                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah Lembaga</h5>
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
                                        <label>Nama Lembaga :</label>
                                        <div class="form-group mt-2">
                                            <input type="text" wire:model="NamaLembaga" placeholder="Nama Lembaga"
                                                class="form-control">
                                            @error('NamaLembaga')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <label>Nama Singkat Lembaga :</label>
                                        <div class="form-group mt-2">
                                            <input type="text" wire:model="NamaSingkatLembaga"
                                                placeholder="Nama Singkat Lembaga" class="form-control">
                                            @error('NamaSingkatLembaga')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>



                                        <label>Jenis Lembaga:</label>
                                        <div class="form-group mt-2">
                                            <select class="form-select" wire:model="JenisLembaga">
                                                <option value="" selected>--Pilih Jenis Lembaga--</option>
                                                @foreach ($jenislembaga as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->nama_jenis_lembaga }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('JenisLembaga')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <label>Alamat</label> :</label>
                                        <div class="form-group mt-2">
                                            <input type="text" wire:model="Alamat" placeholder="Alamat"
                                                class="form-control">
                                            @error('Alamat')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <label>Provinsi:</label>
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

                                    <div class="col">
                                        <label>Telepon</label> :</label>
                                        <div class="form-group mt-2">
                                            <input type="text" wire:model="Telepon" placeholder="Telepon"
                                                class="form-control">
                                            @error('Telepon')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <label>Fax</label> :</label>
                                        <div class="form-group mt-2">
                                            <input type="text" wire:model="Fax" placeholder="Fax"
                                                class="form-control">
                                            @error('Fax')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <label>Email</label> :</label>
                                        <div class="form-group mt-2">
                                            <input type="email" wire:model="Email" placeholder="Email"
                                                class="form-control">
                                            @error('Email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <label for="gambar">Gambar Lembaga:</label>
                                        <div class="form-group mt-2">
                                            <input type="file" id="Gambar" wire:model="Gambar"
                                                accept="image/*">
                                            @error('Gambar')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mt-3 mb-3">
                                            @if ($Gambar && is_object($Gambar))
                                                {{-- <img src="{{ $this->Gambar }}" alt="Uploaded Image" width="300"> --}}
                                                <img src="{{ $Gambar->temporaryUrl() }}" alt="Uploaded Image"
                                                    width="300">
                                            @else
                                                <span>No image uploaded</span>
                                            @endif
                                        </div>


                                        <label>Keterangan</label> :</label>
                                        <div class="form-group mt-2">
                                            <input type="text" wire:model="Keterangan" placeholder="Keterangan"
                                                class="form-control">
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
        <div wire:ignore.self class="modal fade" id="ModalEditLembaga" tabindex="-1"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-scrollable modal-full" role="document">

                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">
                            Edit Lembaga</h5>
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
                        <form wire:submit.prevent="UpdateLembaga">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col">
                                        <label>Nama Lembaga :</label>
                                        <div class="form-group mt-2">
                                            <input type="text" wire:model="NamaLembaga" placeholder="Nama Lembaga"
                                                class="form-control">
                                            @error('NamaLembaga')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <label>Nama Singkat Lembaga :</label>
                                        <div class="form-group mt-2">
                                            <input type="text" wire:model="NamaSingkatLembaga"
                                                placeholder="Nama Singkat Lembaga" class="form-control">
                                            @error('NamaSingkatLembaga')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>



                                        <label>Jenis Lembaga:</label>
                                        <div class="form-group mt-2">
                                            <select class="form-select" wire:model="JenisLembaga">
                                                <option value="" selected>--Pilih Jenis Lembaga--</option>
                                                @foreach ($jenislembaga as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->nama_jenis_lembaga }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('JenisLembaga')
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

                                    <div class="col">
                                        <label>Alamat</label> :</label>
                                        <div class="form-group mt-2">
                                            <input type="text" wire:model="Alamat" placeholder="Alamat"
                                                class="form-control">
                                            @error('Alamat')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <label>Telepon</label> :</label>
                                        <div class="form-group mt-2">
                                            <input type="text" wire:model="Telepon" placeholder="Telepon"
                                                class="form-control">
                                            @error('Telepon')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <label>Fax</label> :</label>
                                        <div class="form-group mt-2">
                                            <input type="text" wire:model="Fax" placeholder="Fax"
                                                class="form-control">
                                            @error('Fax')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <label>Email</label> :</label>
                                        <div class="form-group mt-2">
                                            <input type="email" wire:model="Email" placeholder="Email"
                                                class="form-control">
                                            @error('Email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <label for="gambar">Gambar Gedung Lembaga:</label>
                                        <div class="form-group mt-2">
                                            <input type="file" id="Gambar" wire:model="Gambar"
                                                accept="image/*">
                                            @error('Gambar')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror


                                        </div>

                                        <div class="mt-3 mb-3">
                                            @if ($Gambar && is_object($Gambar))
                                                {{-- <img src="{{ $this->Gambar }}" alt="Uploaded Image" width="300"> --}}
                                                <img src="{{ $Gambar->temporaryUrl() }}" alt="Uploaded Image"
                                                    width="300">
                                            @elseif ($Filename)
                                                {{-- <img src="{{ $this->Gambar }}" alt="Uploaded Image" width="300"> --}}
                                                <img src="{{ asset('storage/images/lembaga/' . $NamaSingkatLembaga . '/' . $Filename) }}"
                                                    alt="Uploaded Image" width="300">
                                            @else
                                                <span>No image uploaded</span>
                                            @endif
                                        </div>


                                        <label>Keterangan</label> :</label>
                                        <div class="form-group mt-2">
                                            <input type="text" wire:model="Keterangan" placeholder="Keterangan"
                                                class="form-control">
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
        <div wire:ignore.self class="modal fade" id="ModalLihatLembaga" tabindex="-1"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h5 class="modal-title">
                            Lihat Lembaga</h5>
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
                                <table class="table table-bordered mb-0">

                                    <tbody> 
                                        <tr>
                                            <td><b>Nama Lembaga :</b></td>
                                            <td>{{ $NamaLembaga }} </td>
                                        </tr>
                                        <tr>
                                            <td><b>Nama Singkat Lembaga :</b></td>
                                            <td>{{ $NamaSingkatLembaga }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Jenis Lembaga : </b> </td>
                                            {{-- <td>{{ $JenisLembaga }}</td> --}}
                                        </tr>
                                        <tr>
                                            <td><b>Provinsi : </b> </td>
                                            <td> {{ $KodeProvinsi }} </td>
                                        </tr>
                                        <tr>
                                            <td><b>Kabupaten : </b> </td>
                                            <td>{{ $KodeKabupaten }}</td>
                                        </tr>

                                        <tr>
                                            <td> <b>Kecamatan : </b> </td>
                                            <td> {{ $KodeKecamatan }}</td>
                                        </tr>
                                        <tr>
                                            <td> <b>Desa : </b> </td>
                                            <td> {{ $KodeDesa }}</td>
                                        </tr>
                                        <tr>
                                            <td> <b>Telepon : </b> </td>
                                            <td> {{ $Telepon }}</td>
                                        </tr>
                                        <tr>
                                            <td> <b>Fax : </b> </td>
                                            <td>{{ $Fax }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Email : </b> </td>
                                            <td> {{ $Email }}</td>
                                        </tr>
                                        <tr>
                                            <td> <b>Alamat : </b> </td>
                                            <td> {{ $Alamat }}</td>
                                        </tr>
                                        <tr>
                                            <td> <b>Gambar Gedung Lembaga : </b> </td>

                                            <td>
                                                <div class="mt-3 mb-3">
                                                    @if ($Filename)
                                                        <img src="{{ asset('storage/images/lembaga/' . $NamaSingkatLembaga . '/' . $Filename) }}"
                                                            alt="Uploaded Image" width="300">
                                                    @else
                                                        <span>Tidak Ada Gambar</span>
                                                    @endif
                                                </div>

                                            </td>

                                        </tr>
                                        <tr>
                                            <td> <b>Keterangan : </b> </td>
                                            <td> {{ $Keterangan }}</td>
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

    </section>
</div>
