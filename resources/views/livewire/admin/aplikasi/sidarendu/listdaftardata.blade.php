<div>
    <section class="section">
        <div class="card">

            <div class="card-header">
                @if (session()->has('message'))
                    <h5 class="alert alert-success ">{{ session('message') }}</h5>
                @endif

                <!-- Button untuk menuju halam buat daftar satu data -->
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                    wire:click="redirectToRoute('{{ route('satudata.adminbuatdaftardata') }}')">
                    Tambah Daftar Satu Data +
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
                            <th>Kode Referensi</th>
                            <th>Lembaga Pemilik</th>
                            <th>Role</th>
                            <th>Judul Data</th>
                            <th>Route</th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @forelse ($daftarsatudata as $data)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $data->kode_referensi }}</td>
                                <td>{{ $data->kode_lembaga }}</td>
                                <td>{{ $data->role_id }}</td>
                                <td>{{ $data->judul_data }}</td>
                                <td>{{ $data->route_tujuan }}</td>


                                <td style="text-align: right;">
                                    <div class="modal-success me-1 mb-1 d-inline-block">
                                        <button type="button" wire:click="LihatOPD({{ $data->id }})"
                                            class="btn btn-sm btn-info rounded-pill">
                                            Lihat
                                        </button>
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
                    {{ $daftarsatudata->links() }}
                </div>
            </div>
        </div>

    </section>
</div>
