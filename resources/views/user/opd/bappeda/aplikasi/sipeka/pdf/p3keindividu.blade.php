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



<h4 class="card-title">DETAIL INDIVIDU MISKIN EKSTRIM</h4>


<table>
    <table class="table table-bordered mb-0">
        <tbody>
            <tr>
                <td><b>ID Keluarga :</b></td>
                <td>{{ $pdfdata->id_keluarga }} </td>
            </tr>
            <tr>
                <td><b>Provinsi :</b></td>
                <td>{{ $pdfdata->provinsi }}</td>
            </tr>
            <tr>
                <td><b>Kabupaten : </b> </td>
                <td>{{ $pdfdata->kabupaten }}</td>
            </tr>

            <tr>
                <td><b>Kecamatan : </b> </td>
                <td>{{ $pdfdata->kecamatan }}</td>
            </tr>

            <tr>
                <td><b>Desa : </b> </td>
                <td>{{ $pdfdata->desa }}</td>
            </tr>

            <tr>
                <td><b>Kode Kemdagri : </b> </td>
                <td>{{ $pdfdata->kode_kemdagri }}</td>
            </tr>

            <tr>
                <td><b>Desil Kesejahteraan: </b> </td>
                <td>{{ $pdfdata->desil_kesejahteraan }}</td>
            </tr>

            <tr>
                <td><b>Alamat: </b> </td>
                <td>{{ $pdfdata->alamat }}</td>
            </tr>


            <tr>
                <td><b>ID Individu: </b> </td>
                <td>{{ $pdfdata->id_individu }}</td>
            </tr>

            <tr>
                <td><b>Nama : </b> </td>
                <td>{{ $pdfdata->nama }}</td>
            </tr>


            <tr>
                <td><b>NIK : </b> </td>
                <td>{{ $pdfdata->nik }}</td>
            </tr>

            <tr>
                <td><b>Padan Dukcapil : </b> </td>
                <td>{{ $pdfdata->padan_dukcapil }}</td>
            </tr>

            <tr>
                <td><b>Jenis Kelamin : </b> </td>
                <td>{{ $pdfdata->jenis_kelamin }}</td>
            </tr>


            <tr>
                <td><b>Hubungan dengan Kpl. Keluarga : </b> </td>
                <td>{{ $pdfdata->hub_dgn_kpl_keluarga }}</td>
            </tr>

            <tr>
                <td><b>Tanggal Lahir : </b> </td>
                <td>{{ $pdfdata->tanggal_lahir }}</td>
            </tr>

            <tr>
                <td><b>Status Kawin : </b> </td>
                <td>{{ $pdfdata->status_kawin }}</td>
            </tr>

            <tr>
                <td><b>Pekerjaan : </b> </td>
                <td>{{ $pdfdata->pekerjaan }}</td>
            </tr>

            <tr>
                <td><b>Pendidikan : </b> </td>
                <td>{{ $pdfdata->pendidikan }}</td>
            </tr>

            <tr>
                <td><b>Usia dibawah 7 tahun : </b> </td>
                <td>{{ $pdfdata->tujuh_tahun }}</td>
            </tr>

            <tr>
                <td><b>Usia 7-12 : </b> </td>
                <td>{{ $pdfdata->tujuh_duabelas_tahun }}</td>
            </tr>

            <tr>
                <td><b>Usia 13-15 : </b> </td>
                <td>{{ $pdfdata->tigabelas_limabelas_tahun }}</td>
            </tr>

            <tr>
                <td><b>Usia 16-18 : </b> </td>
                <td>{{ $pdfdata->enambelas_delapanbelas_tahun }}</td>
            </tr>

            <tr>
                <td><b>Usia 19-21 : </b> </td>
                <td>{{ $pdfdata->sembilanbelas_duapuluhsatu_tahun }}</td>
            </tr>

            <tr>
                <td><b>Usia 22-59 : </b> </td>
                <td>{{ $pdfdata->duapuluhdua_limapuluhsembilan_tahun }}</td>
            </tr>

            <tr>
                <td><b>Usia 60 tahun keatas : </b> </td>
                <td>{{ $pdfdata->enampuluh_tahun }}</td>
            </tr>

            <tr>
                <td><b>Penerima BPNT : </b> </td>
                <td>{{ $pdfdata->bnpt }}</td>
            </tr>

            <tr>
                <td><b>Penerima BPUM : </b> </td>
                <td>{{ $pdfdata->bpum }}</td>
            </tr>

            <tr>
                <td><b>Penerima BST : </b> </td>
                <td>{{ $pdfdata->bst }}</td>
            </tr>

            <tr>
                <td><b>Penerima PKH : </b> </td>
                <td>{{ $pdfdata->pkh }}</td>
            </tr>

            {{-- <tr>
                <td><b>Penerima Sembako : </b> </td>
                <td>{{ $pdfdata->sembako }}</td>
            </tr>

            <tr>
                <td><b>Resiko Stunting : </b> </td>
                <td>{{ $pdfdata->resiko_stunting }}</td>
            </tr>

            <tr>
                <td><b>Pensasaran : </b> </td>
                <td>{{ $pdfdata->pensasaran }}</td>
            </tr> --}}

        </tbody>
    </table>
</table>
