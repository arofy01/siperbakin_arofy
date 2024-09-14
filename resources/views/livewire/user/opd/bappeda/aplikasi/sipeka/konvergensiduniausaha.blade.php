<div>
    <section class="section container">

        <div class="page-heading">
            <b>
                <p>Hai, {{ Auth::user()->name }} </p>
            </b>

            <p>Dunia Usaha/Perusahaan yang terlibat dalam Program Konvergensi di Kabupaten Aceh Tamiang</p>

        </div>


        <div class="card">
            <div class="card-header">
                @if (session()->has('message'))
                    <h5 class="alert alert-success ">{{ session('message') }}</h5>
                @endif

                {{-- Pencarian berdasarkan OPD --}}
                
                

                <input type="search" wire:model="cariperusahaan" class="form-control float-end mx-2"
                    placeholder="Cari Perusahaan" style="width:230px;">
            </div>




 {{-- Menambahkan garis --}}
            {{-- <hr> --}}

            <div class="card-body mt-2" style="overflow-x:auto;">

                <table class="table table-striped" style="width:100%; white-space: nowrap;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Perusahaan</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1; ?>

                        @forelse ($UsersWithRole as $data)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $data->lembaga->nama_lembaga }}</td>
                               
                                <td style="text-align: right;">
                                    <div class="modal-success me-1 mb-1 d-inline-block">
                                        <button type="button" wire:click="LihatProgramKonvergensi({{ $data->id }})"
                                            class="btn btn-sm btn-info rounded-pill">
                                            Lihat Program
                                        </button>
                                    </div>
                                </td>


                                {{-- <td style="text-align: right;">
                                    <div class="modal-success me-1 mb-1 d-inline-block">
                                        <button type="button" wire:click="TambahProgramKonvergensi({{ $data->id }})"
                                            class="btn btn-sm btn-info rounded-pill">
                                            Tambah Program
                                        </button>
                                    </div>
                                </td> --}}


                            </tr>

                            <?php $no++; ?>

                        @empty
                            <tr>
                                <td colspan="4">Data tidak ditemukan!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>


            </div>

            <div class="mt-4">
                {{-- {{ $UsersWithRole->links() }} --}}
            </div>



        </div>




        <!--Modal Tambah -->
        {{-- <div wire:ignore.self class="modal fade" id="ModalTambahPendudukMiskin" tabindex="-1"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">


                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah Penduduk Miskin</h5>
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
                        <form wire:submit.prevent="SimpanPendudukMiskin">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col">
                                        
                                        
                                        <label>NIK :</label>
                                        <div class="form-group mt-2">
                                            <input type="text" wire:model="NIK" placeholder="NIK"
                                                class="form-control">
                                            @error('NIK')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <label>Instansi:</label>
                                        <div class="form-group mt-2">
                                            <select class="form-select" wire:model="KodeInstansi">
                                                <option value="" selected>--Pilih Instansi--</option>
                                                @foreach ($instansi as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->nama_instansi }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('KodeInstansi')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <label>Lingkup Jabatan:</label>
                                        <div class="form-group mt-2">
                                            <select class="form-select" wire:model="KodeLingkupJabatan">
                                                <option value="" selected>--Pilih Lingkup Jabatan--</option>
                                                @foreach ($lingkupjabatan as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->nama_lingkup_jabatan }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('KodeLingkupJabatan')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <label>Jenis Jabatan:</label>
                                        <div class="form-group mt-2">
                                            <select class="form-select" wire:model="KodeJenisJabatan">
                                                <option value="" selected>--Pilih Jenis Jabatan--</option>
                                                @foreach ($jenisjabatan as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->nama_jenis_jabatan }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('KodeLingkupJabatan')
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
        </div> --}}


        <!--Modal Edit -->
        {{-- <div wire:ignore.self class="modal fade" id="ModalEditPendudukMiskin" tabindex="-1"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-scrollable modal-full" role="document">

                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">
                            Edit Aparatur</h5>
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
                        <form wire:submit.prevent="UpdatePendudukMiskin">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col">
                                        <label>NIK :</label>
                                        <div class="form-group mt-2">
                                            <input type="text" wire:model="NIK" placeholder="NIK"
                                                class="form-control">
                                            @error('NIK')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <label>Instansi:</label>
                                        <div class="form-group mt-2">
                                            <select class="form-select" wire:model="KodeInstansi">
                                                <option value="" selected>--Pilih Instansi--</option>
                                                @foreach ($instansi as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->nama_instansi }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('KodeInstansi')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <label>Lingkup Jabatan:</label>
                                        <div class="form-group mt-2">
                                            <select class="form-select" wire:model="KodeLingkupJabatan">
                                                <option value="" selected>--Pilih Lingkup Jabatan--</option>
                                                @foreach ($instansi as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->nama_lingkup_jabatan }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('KodeLingkupJabatan')
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
        </div> --}}


        <!--Modal Lihat-->
        {{-- <div wire:ignore.self class="modal fade" id="ModalLihatPendudukMiskin" tabindex="-1"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h5 class="modal-title">
                            Lihat Aparatur</h5>
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
                                            <td><b>NIK :</b></td>
                                            <td> </td>
                                        </tr>
                                        <tr>
                                            <td><b>Instansi:</b></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><b>Lingkup Aparatur: </b> </td>
                                            <td></td>
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
        </div> --}}



    </section>
</div>
