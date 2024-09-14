<div>
    <section class="section">
        <div class="card">

            <div class="card-header">
                @if (session()->has('message'))
                    <h5 class="alert alert-success ">{{ session('message') }}</h5>
                @endif

                <!-- Button trigger for modal untuk tambah pengguna -->
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                    wire:click = "TampilModalTambahKecamatan">
                    Tambah Kecamatan +
                </button>

                {{-- Pencarian --}}
                <input type="search" wire:model="search" class="form-control float-end mx-2" placeholder="Cari"
                    style="width:230px;">
            </div>



            {{-- Menambahkan garis --}}
            <hr>

            <div class="card-body mt-2" style="overflow-x:auto;">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Kabupaten</th>
                            <th>Kode Kecamatan</th>
                            <th>Nama Kecamatan</th>
                            
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @forelse ($kecamatan as $data)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $data->regency_id }}</td>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->name }}</td>
                                
                                <td></td>
                                <td></td>
                                <td></td>

                                <td style="text-align: right;">
                                    <div class="modal-success me-1 mb-1 d-inline-block">
                                        <button type="button" wire:click="LihatKecamatan({{ $data->id }})"
                                            class="btn btn-sm btn-info rounded-pill">
                                            Lihat
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <div class="modal-success me-1 mb-1 d-inline-block">
                                        <button type="button" wire:click="EditKecamatan({{ $data->id }})"
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
                    {{ $kecamatan->links() }}
                </div>
            </div>
        </div>

        <!--Tambah Modal -->
        <div wire:ignore.self class="modal fade" id="ModalTambahKecamatan" tabindex="-1"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-scrollable" role="document">

                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah Kecamatan</h5>
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
                                <label>Kode Kecamatan :</label>
                                <div class="form-group mt-2">
                                    <input type="text" wire:model="KodeKecamatan" placeholder="Kode Kecamatan"
                                        class="form-control">
                                    @error('KodeKecamatan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <label>Nama Kecamatan :</label>
                                <div class="form-group mt-2">
                                    <input type="text" wire:model="NamaKecamatan" placeholder="Nama Kecamatan"
                                        class="form-control">
                                    @error('NamaKecamatan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <label>Provinsi :</label>
                                <div class="form-group mt-2">
                                    <select class="choices form-select" wire:model="KodeProvinsi">
                                        <option value="">--Pilih Provinsi--</option>
                                        <option value="1">ACEH</option>

                                        {{-- @foreach ($provinsi as $data)
                                            <option value="{{ $data->kode_provinsi }}">
                                                {{ $data->nama_provinsi }}
                                            </option>
                                        @endforeach --}}
                                    </select>

                                    @error('KodeProvinsi')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <label>Kabupaten:</label>
                                <div class="form-group">
                                    <select class="choices form-select" wire:model="KodeKabupaten">
                                        <option value="">--Pilih Kabupaten--</option>
                                        <option value="1">ACEH TAMIANG</option></option>
                                        {{-- @foreach ($kabupaten as $data)
                                            <option value="{{ $data->kode_kabupaten }}">
                                                {{ $data->nama_kabupaten }}
                                            </option>
                                        @endforeach --}}
                                    </select>

                                    @error('KodeKabupaten')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <label>Luas Wilayah</label> :</label>
                                <div class="form-group mt-2">
                                    <input type="text" wire:model="LuasWilayah" placeholder="Luas Wilayah"
                                        class="form-control">
                                    @error('LuasWilayah')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <label>Koordinat:</label>
                                <div class="form-group mt-2">
                                    <input type="text" wire:model="Koordinat" placeholder="Koordinat" class="form-control">
                                    @error('Koordinat')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <label>Keterangan :</label>
                                <div class="form-group mt-2">
                                    <input type="text" wire:model="Keterangan" placeholder="Keterangan"
                                        class="form-control">
                                    @error('Alamat')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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

        <!--Edit Modal -->
        <div wire:ignore.self class="modal fade" id="ModalEditKecamatan" tabindex="-1"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">
                            Edit Kecamatan</h5>
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
                        <form wire:submit.prevent="UpdateKecamatan">
                            <div class="modal-body">

                                <label>Kode Kecamatan :</label>
                                <div class="form-group mt-2">
                                    <input type="text" wire:model="KodeKecamatan" placeholder="Kode Kecamatan"
                                        class="form-control">
                                    @error('KodeKecamatan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <label>Nama Kecamatan :</label>
                                <div class="form-group mt-2">
                                    <input type="text" wire:model="NamaKecamatan" placeholder="Nama Kecamatan"
                                        class="form-control">
                                    @error('NamaKecamatan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <label>Provinsi :</label>
                                <div class="form-group mt-2">
                                    <select class="choices form-select" wire:model="KodeProvinsi">
                                        <option value="">--Pilih Provinsi--</option>
                                        <option value="1">ACEH</option>
                                        {{-- @foreach ($provinsi as $data)
                                            <option value="{{ $data->kode_provinsi }}">
                                                {{ $data->nama_provinsi }}
                                            </option>
                                        @endforeach --}}
                                    </select>

                                    @error('KodeProvinsi')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <label>Kabupaten:</label>
                                <div class="form-group">
                                    <select class="choices form-select" wire:model="KodeKabupaten">
                                        <option value="">--Pilih Kabupaten--</option>
                                        <option value="1">ACEH TAMIANG</option>

                                        {{-- @foreach ($kabupaten as $data)
                                            <option value="{{ $data->kode_kabupaten }}">
                                                {{ $data->nama_kabupaten }}
                                            </option>
                                        @endforeach --}}
                                    </select>

                                    @error('KodeKabupaten')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <label>Luas Wilayah</label> :</label>
                                <div class="form-group mt-2">
                                    <input type="text" wire:model="LuasWilayah" placeholder="Luas Wilayah"
                                        class="form-control">
                                    @error('LuasWilayah')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <label>Koordinat:</label>
                                <div class="form-group mt-2">
                                    <input type="text" wire:model="Koordinat" placeholder="Koordinat" class="form-control">
                                    @error('Koordinat')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <label>Keterangan :</label>
                                <div class="form-group mt-2">
                                    <input type="text" wire:model="Keterangan" placeholder="Keterangan"
                                        class="form-control">
                                    @error('Alamat')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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

        <!--Lihat Modal -->
        <div wire:ignore.self class="modal fade" id="ModalLihatKecamatan" tabindex="-1"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h5 class="modal-title">
                            Lihat Kecamatan</h5>
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
                            <div class="form-group mt-2">
                                <label><b>Kode Kecamatan : </b>{{ $KodeKecamatan }} </label>
                            </div>

                            <div class="form-group mt-2">
                                <label><b>Nama Kecamatan : </b> {{ $NamaKecamatan }}</label>
                            </div>
                            <div class="form-group mt-2">
                                <label><b>Nama Provinsi: </b> {{ $KodeProvinsi }}</label>
                            </div>
                            <div class="form-group mt-2">
                                <label><b>Nama Kabupaten : </b> {{ $KodeKabupaten }}</label>
                            </div>
                            <div class="form-group mt-2">
                                <label><b>Luas Wilayah : </b> {{ $LuasWilayah }}</label>
                            </div>
                            <div class="form-group mt-2">
                                <label><b>Koordinat : </b> {{ $Koordinat}}</label>
                            </div>

                            <div class="form-group mt-2">
                                <label><b>Keterangan : </b> {{ $Keterangan }}</label>
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
