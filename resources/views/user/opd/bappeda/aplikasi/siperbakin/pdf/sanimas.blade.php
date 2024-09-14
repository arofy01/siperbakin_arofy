<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }

    header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background-color: #007D00;
        color: white;
        text-align: left;
        padding: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        z-index: 999;
        /* Menambahkan z-index untuk mengatasi konten lain */
    }

    .logo {
        max-width: 100px;
        height: auto;
        margin-right: 20px;
    }

    .info {
        text-align: right;
        margin-right: 20px;
        /* Menambahkan margin kanan untuk jarak dari tepi kanan */
    }

    /* ... Kode CSS lainnya ... */

    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    h4.card-title {
        text-align: center;
    }

    table {
        width: 100%;
        /* Menentukan lebar tabel 100% dari lebar halaman */
        border-collapse: collapse;
        table-layout: auto;
        /* Mengatur kolom menjadi fleksibel */
    }

    th {
        padding: 10px;
        text-align: left;
        border: 1px solid #000;
        background-color: darkgreen;
        /* Warna hijau tua */
        color: white;
        /* Warna teks putih untuk kontras */
    }

    td {
        padding: 10px;
        text-align: left;
        border: 1px solid #000;
        font-size: 10px;
        /* Sesuaikan ukuran huruf sesuai kebutuhan */
    }

    .table-container {
        margin-left: auto;
        /* Mengatur margin kiri menjadi auto */
        margin-right: auto;
        /* Mengatur margin kanan menjadi auto */
        max-width: 600px;
        /* Menentukan lebar maksimum container tabel */
    }

    .profile-image {
        max-width: 100px;
        /* Menentukan lebar maksimum gambar */
        height: auto;
        /* Menyesuaikan tinggi gambar secara proporsional */
    }
</style>



<h4 class="card-title">DETAIL SANIMAS</h4>

<table class="table table-bordered mb-0">
    <tbody>
        <tr>
            <td><b>Kecamatan :</b></td>
            <td>{{ $pdfdata->kecamatan->name }}</td>
        </tr>
        <tr>
            <td><b>Desa:</b></td>
            <td>{{ $pdfdata->desa->name }}</td>
        </tr>
        <tr>
            <td><b>Pengelola: </b> </td>
            <td>{{ $pdfdata->pengelola }}</td>
        </tr>

        <tr>
            <td><b>Jumlah Penduduk KK: </b> </td>
            <td>{{ $pdfdata->jumlah_penduduk_kk }}</td>
        </tr>

        <tr>
            <td><b>Jumlah Penduduk Jiwa: </b> </td>
            <td>{{ $pdfdata->jumlah_penduduk_jiwa }}</td>
        </tr>

        <tr>
            <td><b>Target Pemanfaat SR: </b> </td>
            <td>{{ $pdfdata->target_pemanfaatan_sr }}</td>
        </tr>

        <tr>
            <td><b>Target Pemanfaat KK: </b> </td>
            <td>{{ $pdfdata->target_pemanfaatan_kk }}</td>
        </tr>

        <tr>
            <td><b>Target Pemanfaat Jiwa: </b> </td>
            <td>{{ $pdfdata->target_pemanfaatan_jiwa }}</td>
        </tr>


        <tr>
            <td><b>Jumlah Terlayani SR: </b> </td>
            <td>{{ $pdfdata->jumlah_terlayani_sr }}</td>
        </tr>

        <tr>
            <td><b>Jumlah Terlayani KK: </b> </td>
            <td>{{ $pdfdata->jumlah_terlayani_kk }}</td>
        </tr>
        <tr>
            <td><b>Jumlah Terlayani Jiwa: </b> </td>
            <td>{{ $pdfdata->jumlah_terlayani_jiwa }}</td>
        </tr>

        <tr>
            <td><b>Jumlah Belum Terlayani SR: </b> </td>
            <td>{{ $pdfdata->jumlah_belum_terlayani_sr }}</td>
        </tr>

        <tr>
            <td><b>Jumlah Belum Terlayani KK: </b> </td>
            <td>{{ $pdfdata->jumlah_belum_terlayani_kk }}</td>
        </tr>


        <tr>
            <td><b>Jumlah Belum Terlayani Jiwa: </b> </td>
            <td>{{ $pdfdata->jumlah_belum_terlayani_jiwa }}</td>
        </tr>

        <tr>
            <td><b>Latitude: </b> </td>
            <td>{{ $pdfdata->latitude }}</td>
        </tr>

        <tr>
            <td><b>Longitude: </b> </td>
            <td>{{ $pdfdata->longitude }}</td>
        </tr>

        <tr>
            <td><b>Berfungsi / Tidak Berfungsi : </b> </td>
            <td>{{ $pdfdata->berfungsi }}</td>
        </tr>


        <tr>
            <td><b>Permasalahan : </b> </td>
            <td>{{ $pdfdata->permasalahan }}</td>
        </tr>

        <tr>
            <td><b>Kapasitas Terpasang : </b> </td>
            <td>{{ $pdfdata->kapasitasterpasang }}</td>
        </tr>

        <tr>
            <td><b>Kapasitas Produksi : </b> </td>
            <td>{{ $pdfdata->kapasitasproduksi }}</td>
        </tr>

        <tr>
            <td><b>Jam Operasi : </b> </td>
            <td>{{ $pdfdata->jamoperasi }}</td>
        </tr>

        <tr>
            <td><b>Tahun Pembangunan : </b> </td>
            <td>{{ $pdfdata->tahunpembangunan }}</td>
        </tr>

        <tr>
            <td><b>Jumlah Anggaran : </b> </td>
            <td>{{ $pdfdata->jumlahanggaran }}</td>
        </tr>

        <tr>
            <td><b>Kondisi Eksisting : </b> </td>
            <td>
                <div class="mt-3 mb-3">
                    <!-- Menggunakan base64 data URL untuk gambar -->
                    <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(storage_path('app/public/images/siperbakin/sanimas/' . $pdfdata->kondisi_eksisting))) }}"
                        alt="Uploaded Image" width="300">
                </div>
            </td>
        </tr>

        <tr>
            <td><b>Sumber Air : </b> </td>
            <td>{{ $pdfdata->sumberair }}</td>
        </tr>

        <tr>
            <td><b>Rencana Pengembangan : </b> </td>
            <td>{{ $pdfdata->rencanapengembangan }}</td>
        </tr>

        <tr>
            <td><b>Keterangan : </b> </td>
            <td>{{ $pdfdata->keterangan }}</td>
        </tr>

    </tbody>
</table>
