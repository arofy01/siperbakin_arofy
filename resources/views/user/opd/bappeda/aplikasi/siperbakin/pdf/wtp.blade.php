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
        font-size: 10px; /* Sesuaikan ukuran huruf sesuai kebutuhan */
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



<h4 class="card-title">DETAIL WTP KAB. ACEH TAMIANG</h4>


<table>
    <table class="table table-bordered mb-0">
        <tbody>
            <tr>
                <td><b>Kecamatan :</b></td>
                <td>{{ $pdfdata->kode_kecamatan }} </td>
            </tr>
            <tr>
                <td><b>Nama SPAM :</b></td>
                <td>{{ $pdfdata->nama_spam }}</td>
            </tr>
            <tr>
                <td><b>Pengelola: </b> </td>
                <td>{{ $pdfdata->pengelola }}</td>
            </tr>

            <tr>
                <td><b>Latitude : </b> </td>
                <td>{{ $pdfdata->latitude }}</td>
            </tr>

            <tr>
                <td><b>Longitude : </b> </td>
                <td>{{ $pdfdata->longitude }}</td>
            </tr>

            <tr>
                <td><b>Kondisi : </b> </td>
                <td>{{ $pdfdata->berfungsi }}</td>
            </tr>

            <tr>
                <td><b>Permasalahan: </b> </td>
                <td>{{ $pdfdata->permasalahan }}</td>
            </tr>

            <tr>
                <td><b>Jam Operasi: </b> </td>
                <td>{{ $pdfdata->jam_operasi }}</td>
            </tr>


            <tr>
                <td><b>Kapasitas Terpasang: </b> </td>
                <td>{{ $pdfdata->Kapasitas_terpasang }}</td>
            </tr>

            <tr>
                <td><b>Kapasitas Produksi: </b> </td>
                <td>{{ $pdfdata->kapasitas_produksi }}</td>
            </tr>


            <tr>
                <td><b>Kapasitas Distribusi: </b> </td>
                <td>{{ $pdfdata->kapasitas_distribusi }}</td>
            </tr>

            <tr>
                <td><b>Kapasitas Air Terjual: </b> </td>
                <td>{{ $pdfdata->kapasitas_air_terjual }}</td>
            </tr>

            <tr>
                <td><b>Kapasitas Belum Terpakai: </b> </td>
                <td>{{ $pdfdata->kapasitas_belum_terpakai }}</td>
            </tr>


            <tr>
                <td><b>Kehilangan Air: </b> </td>
                <td>{{ $pdfdata->kehilangan_air }}</td>
            </tr>

            <tr>
                <td><b>SR : </b> </td>
                <td>{{ $pdfdata->sr }}</td>
            </tr>

            <tr>
                <td><b>Wilayah Pelayanan : </b> </td>
                <td>{{ $pdfdata->wilayah_pelayanan }}</td>
            </tr>

            <tr>
                <td><b>Keterangan : </b> </td>
                <td>{{ $pdfdata->keterangan }}</td>
            </tr>


            <tr>
                <td><b>Kondisi Eksisting dan Peta : </b> </td>
                <td>
                    <div class="mt-3 mb-3">
                        <!-- Menggunakan base64 data URL untuk gambar -->
                        <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(storage_path('app/public/images/siperbakin/wtp/' . $pdfdata->kondisi_eksisting))) }}"
                            alt="Uploaded Image" width="300">
                    </div>
                </td>
            </tr>


        </tbody>
    </table>
</table>
