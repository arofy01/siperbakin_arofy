<div>
    <section class="section">
        <div class="card">

            <div class="card-header">

                @if (session()->has('message'))
                    <h5 class="alert alert-success ">{{ session('message') }}</h5>
                @endif

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
                            <th>Nama User</th>
                            <th>Email</th>
                            <th></th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>

                        @forelse ($pengguna as $data)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $data->jenispengguna->nama_jenis_pengguna }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>

                                {{-- <td style="text-align: right;">
                                    <a href="/admin/pengguna/{{ $data->id }}/aturizinpengguna" class="btn btn-sm btn-primary rounded-pill">
                                        Kelola Izin
                                    </a>
                                </td> --}}

                                <td style="text-align: right;">
                                    <!-- Button trigger for lihat modal -->
                                    <div class="modal-info me-1 mb-1 d-inline-block">
                                        <button type="button" wire:click="LihatPeranPadaPengguna({{ $data->id }})"
                                            class="btn btn-sm btn-info rounded-pill">
                                            Kelola
                                        </button>
                                    </div>
                                </td>


                            </tr>


                            {{-- untuk menampilkan peran pada Pengguna --}}

                            @if ($tampilPeran && $penggunaId == $data->id)
                                <tr>
                                    <td colspan="7">
                                        <div>
                                            <form wire:submit.prevent="saveRoles"
                                                style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 10px;">
                                                @php
                                                    $user = App\Models\User::findOrFail($penggunaId);
                                                    $penggunaRoles = $user->roles->pluck('id')->toArray();
                                                @endphp

                                                @foreach ($peranpengguna as $peran)
                                                    <div>
                                                        <label>
                                                            <input type="checkbox" wire:model="userRoles"
                                                                value="{{ $peran->id }}"
                                                                {{ in_array($peran->id, $penggunaRoles) ? 'checked' : '' }}>
                                                            {{ $peran->name }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                                <button type="submit">Simpan</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endif


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





    </section>
</div>
