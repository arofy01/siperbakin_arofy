<div>
    <div class="content-wrapper container">
        <div class="row">
            <div class="page-heading">
                <p>Hai, {{ Auth::user()->name }} </p>
            </div>

            <div class="mt-2 mb-2">
                Berikut adalah Kumpulan Daftar Data Perencanaan Terpadu (SIDARENDU), silahkan cari data dengan mengetikan Kode Referensinya.
            </div>


            <div class="card-header mb-3">

                @if (session()->has('message'))
                    <h5 class="alert alert-success ">{{ session('message') }}</h5>
                @endif


                {{-- Pencarian --}}
                <input type="search" wire:model="search" class="form-control float-end mx-2 mt-2" placeholder="Cari Kode Ref"
                    style="width:230px;">
            </div>

        </div>



        <div class="page-content">
            <section class="row">
                <div class="card">
                    <div class="col-12 col-lg-12">
                        <div class="card-body mt-2" style="overflow-x:auto;">
                            <table class="table table-striped" style="width:100%; white-space: nowrap;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Referensi</th>
                                        <th>Kode Referensi Induk</th>
                                        <th>Lembaga</th>
                                        <th>Judul Data</th>
                                        {{-- <th>Keterangan</th> --}}
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($daftardata as $data)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $data->kode_referensi_anak }}</td>
                                            <td>{{ $data->kode_referensi_induk }}</td>
                                            <td>{{ $data->role->name }}</td>
                                            <td>{{ $data->judul_data }}</td>
                                            {{-- <td>{{ $data->keterangan }}</td> --}}

                                            <td style="text-align: right;">
                                                <!-- Button trigger for menuju halaman entry -->
                                                <div class="modal-info me-1 mb-1 d-inline-block">
                                                    <a href="/user/opd/bappeda/aplikasi/sidarendu/client/{{ $data->kode_referensi_anak }}" class="btn btn-sm btn-info rounded-pill">
                                                        Lihat
                                                    </a>
                                                </div>
                                                
                                            </td>
                                        </tr>
                                        <?php $no++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                            <div>
                                {{ $daftardata->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
