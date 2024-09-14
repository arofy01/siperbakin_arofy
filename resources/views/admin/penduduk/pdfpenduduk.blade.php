<style>
    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    table {
        width: 100%; /* Menentukan lebar tabel 100% dari lebar halaman */
        border-collapse: collapse;
        table-layout: auto; /* Mengatur kolom menjadi fleksibel */
    }

    th, td {
        padding: 10px;
        text-align: left;
        border: none;
    }

    .table-container {
        margin-left: auto; /* Mengatur margin kiri menjadi auto */
        margin-right: auto; /* Mengatur margin kanan menjadi auto */
        max-width: 600px; /* Menentukan lebar maksimum container tabel */
    }

    .profile-image {
        max-width: 100px; /* Menentukan lebar maksimum gambar */
        height: auto; /* Menyesuaikan tinggi gambar secara proporsional */
    }
</style>

<h1>DATA PENDUDUK</h1>
<hr>
<div class="table-container">
    <img src="{{ asset('storage/admin_template/mazer/assets/images/faces/1.jpg') }}"  alt="Gambar Penduduk" class="profile-image">
    <table>
        <thead>
            <tr>
                <!-- Kepala tabel -->
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>NIK</td>
                <td>:{{ $penduduk->nik }}</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:{{ $penduduk->nik }}</td>
            </tr>
        </tbody>
    </table>
</div>
