<div>
    <section class="section">
        <div class="card">

            <div class="card-header">

                @if (session()->has('message'))
                    <h5 class="alert alert-success ">{{ session('message') }}</h5>
                @endif

                <!-- Button trigger for modal untuk tambah peran pengguna -->
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                    data-bs-target="#TambahPeranPenggunaModal">
                    Tambah Peran Pengguna +
                </button>

                {{-- Pencarian --}}
                <input type="search" wire:model="search" class="form-control float-end mx-2" placeholder="Cari"
                    style="width:230px;">
            </div>

            {{-- Menambah garis --}}
            <hr>

            <div class="card-body mt-2" style="overflow-x:auto;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Peran</th>
                            <th>Nama Guard</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($peranpengguna as $data)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->guard_name }}</td>

                                <td style="text-align: right;">

                                    <!-- Button trigger for lihat modal -->
                                    <div class="modal-info me-1 mb-1 d-inline-block">
                                        <button type="button" wire:click="LihatPeranPengguna({{ $data->id }})"
                                            class="btn btn-sm btn-info rounded-pill">
                                            Lihat
                                        </button>
                                    </div>

                                    <!-- Button trigger for edit modal -->
                                    <div class="modal-warning me-1 mb-1 d-inline-block">
                                        <button type="button" wire:click="EditPeranPengguna({{ $data->id }})"
                                            class="btn btn-sm btn-warning rounded-pill">
                                            edit
                                        </button>
                                    </div>

                                    {{-- button for hapus --}}
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
                    {{ $peranpengguna->links() }}
                </div>
            </div>
        </div>
    </section>

    <!--Lihat Modal -->
    <div wire:ignore.self class="modal fade" id="LihatPeranPenggunaModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title">Lihat Peran Pengguna (Roles of
                        User)</h5>
                    <button type="button" wire:click="resetInput" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group mt-2">
                        <label><b>Nama Peran Pengguna : </b>{{ $NamaPeranPengguna }} </label>
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

    <!--Edit Modal -->
    <div wire:ignore.self class="modal fade" id="EditPeranPenggunaModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">

            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title">Edit Peran Pengguna</h5>
                    <button type="button" wire:click="resetInput" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>

                <form wire:submit.prevent="UpdatePeranPengguna">
                    <div class="modal-body">
                        <label>Nama Peran Pengguna :</label>

                        <div class="form-group mt-2">
                            <input type="text" wire:model="NamaPeranPengguna" id="NamaPeranPengguna"
                                placeholder="Nama Peran Pengguna" class="form-control">
                            @error('NamaPeranPengguna')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" wire:click="resetInput" class="btn btn-light-secondary"  data-bs-dismiss="modal">
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

    <!--Tambah Modal -->
    <div wire:ignore.self class="modal fade" id="TambahPeranPenggunaModal" tabindex="-1"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-scrollable" role="document">

            <div class="modal-content">

                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah Peran Pengguna</h5>
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


                <form wire:submit.prevent="create">
                    <div class="modal-body">
                        <label>Nama Peran Pengguna :</label>

                        <div class="form-group mt-2">
                            <input type="text" wire:model="NamaPeranPengguna" id="NamaPeranPengguna"
                                placeholder="Nama Peran Pengguna" class="form-control">
                            @error('NamaPeranPengguna')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
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
