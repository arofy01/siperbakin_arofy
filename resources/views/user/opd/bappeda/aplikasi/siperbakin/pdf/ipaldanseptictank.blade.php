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



<h4 class="card-title">DATA IPAL DAN SEPTIC TANK KAB. ACEH TAMIANG</h4>


<table>
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
                <td><b>Uraian : </b> </td>
                <td>{{ $pdfdata->uraian }}</td>
            </tr>

            <tr>
                <td><b>Nilai Anggaran : </b> </td>
                <td>{{ $pdfdata->nilai_anggaran }}</td>
            </tr>

            <tr>
                <td><b>Jenis IPAL: </b> </td>
                <td>{{ $pdfdata->jenis_ipal }}</td>
            </tr>

            <tr>
                <td><b>Kondisi : </b> </td>
                <td>{{ $pdfdata->kondisi }}</td>
            </tr>

            <tr>
                <td><b>Jumlah Tangki SeptiK : </b> </td>
                <td>{{ $pdfdata->jumlah_tangki_septic }}</td>
            </tr>

            <tr>
                <td><b>Jumlah Sambungan Rumah : </b> </td>
                <td>{{ $pdfdata->jumlah_sambungan_rumah }}</td>
            </tr>


            <tr>
                <td><b>Kondisi Eksisting : </b> </td>
                <td>
                    <div class="mt-3 mb-3">
                        <!-- Menggunakan base64 data URL untuk gambar -->
                        <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(storage_path('app/public/images/siperbakin/ipaldanseptictank/' . $pdfdata->kondisi_eksisting))) }}"
                            width="300">
                    </div>
                </td>
            </tr>

           
            

        </tbody>
    </table>
</table>
