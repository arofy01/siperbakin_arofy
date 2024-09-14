<div>
    <section class="section">
        <div class="card">

            <div class="card-header">

                @if (session()->has('message'))
                    <h5 class="alert alert-success ">{{ session('message') }}</h5>
                @endif


                <!-- Button trigger for modal untuk tambah pengguna -->
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                    data-bs-target="#TambahPenggunaModal">
                    Tambah Pengguna +
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
                            <th>Jenis Pengguna</th>
                            <th>Nama Lembaga</th>
                            <th>Nama User</th>
                            <th>Email</th>
                            <th></th> 
                            <th></th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @forelse ($pengguna as $data)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $data->jenispengguna->nama_jenis_pengguna }}</td>
                                <td>{{ $data->lembaga->nama_lembaga }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>


                                <td style="text-align: right;">
                                    <div class="modal-success me-1 mb-1 d-inline-block">
                                        <button type="button" wire:click="LihatPengguna({{ $data->id }})"
                                            class="btn btn-sm btn-info rounded-pill">
                                            Lihat
                                        </button>
                                    </div>
                                </td>

                                <td>
                                    <div class="modal-success me-1 mb-1 d-inline-block">
                                        <button type="button" wire:click="EditPengguna({{ $data->id }})"
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
                                <td colspan="7">Data tidak ditemukan!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div>
                    {{ $pengguna->links() }}
                </div>
            </div>
        </div>


        <!--Tambah Modal -->
        <div wire:ignore.self class="modal fade" id="TambahPenggunaModal" tabindex="-1"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">

                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah Pengguna (User)</h5>
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
                                <div class="form-group mt-2" wire:ignore>
                                    <label>Jenis Pengguna :</label>
                                    <select class="choices form-select" wire:model="JenisPenggunaId">
                                        <option value="">--Pilih Jenis Pengguna--</option>
                                        @foreach ($jenispengguna as $jenis)
                                            <option value="{{ $jenis->id }}">
                                                {{ $jenis->nama_jenis_pengguna }}</option>
                                        @endforeach
                                    </select>

                                    @error('JenisPenggunaId')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group mt-2" wire:ignore>
                                    <label>Nama Lembaga :</label>
                                    <select class="choices form-select" wire:model="LembagaId">
                                        <option value="">--Pilih Lembaga--</option>
                                        @foreach ($lembaga as $data)
                                            <option value="{{ $data->id }}">
                                                {{ $data->nama_lembaga }}</option>
                                        @endforeach
                                    </select>

                                    @error('LembagaId')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <label>Nama Pengguna :</label>
                                <div class="form-group mt-2">
                                    <input type="text" wire:model="NamaPengguna" placeholder="Nama Pengguna"
                                        class="form-control">

                                    @error('NamaPengguna')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <label>Email :</label>
                                <div class="form-group mt-2">
                                    <input type="email" wire:model="Email" placeholder="Email" class="form-control">
                                    @error('Email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <label>Password :</label>
                                <div class="form-group mt-2">
                                    <input type="password" wire:model="Password" placeholder="Password"
                                        class="form-control">
                                    @error('Password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <label>Konfirmasi Password :</label>
                                <div class="form-group mt-2">
                                    <input type="password" wire:model="KonfirmasiPassword"
                                        placeholder="Konfirmasi Password" class="form-control">
                                    @error('KonfirmasiPassword')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <label>Avatar :</label>
                                <div class="form-group mt-2">
                                    <input class="form-control" type="file" id="formFile" wire:model="Avatar"
                                        accept="image/*">
                                    @error('Avatar')
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
        <div wire:ignore.self class="modal fade" id="EditPenggunaModal" tabindex="-1"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">
                            Edit Pengguna (User)</h5>
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
                        <form wire:submit.prevent="UpdatePengguna">
                            <div class="modal-body">


                                <div class="form-group mt-2" wire:ignore>
                                    <label>Jenis Pengguna :</label>
                                    <select class="choices form-select" wire:model.defer="JenisPenggunaId" >
                                        <option value="">--Pilih Jenis
                                            Pengguna--</option>
                                        @foreach ($jenispengguna as $jenis)
                                            <option value="{{ $jenis->id }}">
                                                {{ $jenis->nama_jenis_pengguna }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('JenisPenggunaId')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group mt-2" wire:ignore>
                                    <label>Nama Lembaga :</label>
                                    <div class="form-group">
                                        <select class="choices form-select" wire:model.defer="LembagaId" >
                                            <option value="">--Pilih Nama Lembaga--</option>
                                            @foreach ($lembaga as $data)
                                                <option value="{{ $data->id }}">
                                                    {{ $data->nama_lembaga }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @error('LembagaId')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>



                                <label>Nama Pengguna :</label>
                                <div class="form-group mt-2">
                                    <input type="text" wire:model="NamaPengguna" placeholder="Nama Pengguna"
                                        class="form-control">

                                    @error('NamaPengguna')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <label>Email :</label>
                                <div class="form-group mt-2">
                                    <input type="email" wire:model="Email" placeholder="Email"
                                        class="form-control">
                                    @error('Email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                @if ($showInputPassword)
                                    <label>Password :</label>
                                    <div class="form-group mt-2">
                                        <input type="password" wire:model="Password" placeholder="Password"
                                            class="form-control">
                                        @error('Password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                @endif

                                <hr>

                                <div class="form-check">
                                    <input type="checkbox" class="text-success" wire:model="showInputPassword">
                                    <label class="form-check-label text-danger" for="exampleCheckbox">Ganti password
                                        untuk
                                        pengguna ini?</label>
                                </div>

                                <label>Avatar :</label>
                                <div class="form-group mt-2">
                                    <input class="form-control" type="file" id="formFile" wire:model="Avatar"
                                        accept="image/*">
                                    @error('Avatar')
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
        <div wire:ignore.self class="modal fade" id="LihatPenggunaModal" tabindex="-1"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h5 class="modal-title">
                            Lihat Pengguna (User)</h5>
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
                                <label><b>Jenis Pengguna : </b>{{ $NamaJenisPengguna }} </label>
                            </div>

                            <div class="form-group mt-2">
                                <label><b>Nama Pengguna : </b> {{ $NamaPengguna }}</label>
                            </div>
                            <div class="form-group mt-2">
                                <label><b>Email : </b> {{ $Email }}</label>
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
