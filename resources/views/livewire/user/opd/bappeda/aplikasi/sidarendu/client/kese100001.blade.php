<div>
    <div class="content-wrapper container">

        {{-- Kepala Halaman --}}
        <div class="row">
            <div class="page-heading">
                <p>Hai, {{ Auth::user()->name }} </p>
            </div>

            <div class="card">
                <div class="mb-4 mt-4 text-center">
                    <h4><b>JUMLAH KELAHIRAN ATAU PERSALINAN MENURUT DESA</b></h4>
                </div>
            </div>
        </div>

        {{-- Tabel --}}
        <div class="card">
            <div class="card-header">
                @if (session()->has('message'))
                    <h5 class="alert alert-success ">{{ session('message') }}</h5>
                @endif

                <!-- Button trigger for modal untuk tambah pengguna -->
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                    wire:click="TampilModalTambahkese100001">
                    Tambah Data
                </button>

                <button type="button" class="btn btn-outline-info" data-bs-toggle="modal"
                    wire:click="TampilModalLihatkese100001">
                    Download
                </button>

                {{-- Pencarian --}}
                <input type="search" wire:model="search" class="form-control float-end mx-2" placeholder="Cari"
                    style="width:230px;">

            </div>

            <div class="card-body mt-2" style="overflow-x:auto;">

                <table class="table table-striped" style="width:100%; white-space: nowrap;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kecamatan</th>
                            <th>Desa</th>
                            <th>Persalinan</th>
                            <th>Lahir Hidup</th>
                            <th>Lahir Mati</th>
                            <th>Tahun</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @forelse ($kese100001 as $data)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $data->district->name }}</td>
                                <td>{{ $data->village->name }}</td>
                                <td>{{ $data->persalinan }}</td>
                                <td>{{ $data->lahir_hidup }}</td>
                                <td>{{ $data->lahir_mati }}</td>
                                <td>{{ $data->tahun }}</td>
                                <td>
                                    <div class="modal-success me-1 mb-1 d-inline-block">
                                        <button type="button" wire:click="Editkese100001({{ $data->id }})"
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
                                <td colspan="9">Data tidak ditemukan!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $kese100001->links() }}
                </div>
            </div>


            <div class="card-footer">
                <a class="btn btn-outline-primary float-end" href="javascript:history.back()"><i
                        class="bi bi-arrow-left-square"></i> Kembali</a>
            </div>

        </div>


        <!--Modal Tambah -->
        <div wire:ignore.self class="modal fade" id="ModalTambahkese100001" tabindex="-1"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-scrollable modal-md" role="document">


                <div class="modal-content">

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah Data</h5>
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
                        <form wire:submit.prevent="Simpankese100001">
                            <div class="modal-body">
                                <div class="row">

                                    <div class="col">

                                        <div class="col-md-4">
                                            <label>Kecamatan</label>
                                        </div>

                                        <div class="form-group col-md-8">

                                            <select class="form-select" wire:model="KodeKecamatan">
                                                <option value="">--Kecamatan--</option>
                                                @foreach ($Kecamatan as $data)
                                                    <option value="{{ $data->id }}">
                                                        {{ $data->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('KodeKecamatan')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <div class="col-md-4">
                                            <label>Desa</label>
                                        </div>

                                        <div class="form-group col-md-8">
                                            <select class="form-select" wire:model="KodeDesa">
                                                <option value="">--Pilih Desa--</option>
                                                @foreach ($Desa as $data)
                                                    <option value="{{ $data->id }}">
                                                        {{ $data->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('KodeDesa')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <div class="col-md-4">
                                            <label>Persalinan</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="number" id="contact-info" class="form-control"
                                                name="Persalinan" placeholder="Jumlah Persalinan"
                                                wire:model="Persalinan">
                                            @error('Persalinan')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>

                                        <div class="col-md-4">
                                            <label>Lahir Hidup</label>
                                        </div>

                                        <div class="col-md-4 form-group">
                                            <input type="number" id="contact-info" class="form-control"
                                                name="LahirHidup" placeholder="Lahir Hidup" wire:model="LahirHidup">
                                            @error('LahirHidup')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label>Lahir-Mati</label>
                                        </div>

                                        <div class="col-md-4 form-group">
                                            <input type="number" id="contact-info" class="form-control"
                                                name="LahirMati" placeholder="Lahir Mati" wire:model="LahirMati">

                                            @error('LahirMati')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label>Tahun</label>
                                        </div>

                                        <div class="col-md-4 form-group">
                                            <input type="number" id="contact-info" class="form-control"
                                                name="Tahun" placeholder="Tahun" wire:model="Tahun">
                                            @error('Tahun')
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
        <div wire:ignore.self class="modal fade" id="ModalEditkese100001" tabindex="-1"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-scrollable modal-md" role="document">

                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">
                            Edit Data</h5>
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
                        <form wire:submit.prevent="Updatekese100001">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="col-md-4">
                                            <label>Kecamatan</label>
                                        </div>

                                        <div class="form-group col-md-8">

                                            <select class="form-select" wire:model="KodeKecamatan">
                                                <option value="">--Kecamatan--</option>
                                                @foreach ($Kecamatan as $data)
                                                    <option value="{{ $data->id }}">
                                                        {{ $data->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('KodeKecamatan')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <div class="col-md-4">
                                            <label>Desa</label>
                                        </div>

                                        <div class="form-group col-md-8">
                                            <select class="form-select" wire:model.defer="KodeDesa">
                                                <option value="">--Pilih Desa--</option>
                                                @foreach ($Desa as $data)
                                                    <option value="{{ $data->id }}">
                                                        {{ $data->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('KodeDesa')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <div class="col-md-4">
                                            <label>Persalinan</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="number" id="contact-info" class="form-control"
                                                name="Persalinan" placeholder="Jumlah Persalinan"
                                                wire:model="Persalinan">
                                        </div>

                                        @error('Persalinan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror


                                        <div class="col-md-4">
                                            <label>Lahir Hidup</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="number" id="contact-info" class="form-control"
                                                name="LahirHidup" placeholder="Lahir Hidup" wire:model="LahirHidup">
                                        </div>
                                        @error('LahirHidup')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror


                                        <div class="col-md-4">
                                            <label>Lahir-Mati</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="number" id="contact-info" class="form-control"
                                                name="LahirMati" placeholder="Lahir Mati" wire:model="LahirMati">
                                        </div>
                                        @error('LahirMati')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror




                                        <div class="col-md-4">
                                            <label>Tahun</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="number" id="contact-info" class="form-control"
                                                name="Tahun" placeholder="Tahun" wire:model="Tahun">
                                        </div>
                                        @error('Tahun')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror



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
        <div wire:ignore.self class="modal fade" id="ModalLihatkese100001" tabindex="-1"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h5 class="modal-title">
                            Lihat Data</h5>
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

                        <div class="col-md-4">
                            <label>Pilih Tahun</label>
                        </div>
                        <div class="form-group col-md-3">
                            <select class="form-select" wire:model="TahunFilter">
                                <option value="">--Pilih Tahun--</option>
                                @foreach ($TampilTahun as $data)
                                    <option value="{{ $data->tahun }}">
                                        {{ $data->tahun }}
                                    </option>
                                @endforeach
                            </select>

                            @error('KodeDesa')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Button trigger for download -->

                        @if ($TahunFilter)
                            <div class="modal-info me-1 mb-1 d-inline-block">
                                <button type="button" wire:click="DownloadPdfData()"
                                    class="btn btn-sm btn-danger rounded-pill">
                                    <i class="bi bi-file-earmark-pdf"></i>
                                    PDF
                                </button>

                                <a type="button" target="_blank"
                                    href="/api/user/opd/bappeda/aplikasi/sidarendu/kese100001?tahun={{ $TahunFilter }}"
                                    class="btn btn-sm btn-warning rounded-pill">
                                    <i class="bi bi-filetype-json"></i>
                                    JSON
                                </a>

                                <button type="button" wire:click="DownloadExcelData()"
                                    class="btn btn-sm btn-success rounded-pill">
                                    <i class="bi bi-file-earmark-excel-fill"></i>
                                    EXCEL
                                </button>
                            </div>
                        @endif



                        <hr>

                        <table class="table" style="width:100%; white-space: nowrap;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kecamatan</th>
                                    <th>Desa</th>
                                    <th>Persalinan</th>
                                    <th>Lahir Hidup</th>
                                    <th>Lahir Mati</th>
                                    <th>Jumlah</th>

                                </tr>
                            </thead> 
                            <tbody>
                                <?php $no = 1; ?>
                                @forelse ($LihatData as $data)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $data->district->name }}</td>
                                        <td>{{ $data->village->name }}</td>
                                        <td>{{ $data->persalinan }}</td>
                                        <td>{{ $data->lahir_hidup }}</td>
                                        <td>{{ $data->lahir_mati }}</td>
                                        <td>{{ $data->persalinan + $data->lahir_hidup + $data->lahir_mati }}</td>


                                    </tr>
                                    <?php $no++; ?>
                                @empty
                                    <tr>
                                        <td colspan="9">Data tidak ditemukan!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
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
