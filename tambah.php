<?php
include "koneksi.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Halaman Utama</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <section class="container">
        <div class="col-md-6 offset-md-3 align-self-center">
            <h1 class="text-center mt-4">Form Tambah Data</h1>
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">NIS</label>
                    <input type="number" class="form-control" placeholder="Masukkan NIS siswa" name="nis" id="nis">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input class="form-control" placeholder="Masukkan nama siswa" name="nama" id="nama">
                </div>
                <div class="mb-3">
                    <label class="form-label">Kelas</label>
                    <input class="form-control" placeholder="Masukkan kelas siswa" name="kelas" id="kelas">
                </div>
                <input name="tambah" type="submit" class="btn btn-primary" value="Tambah">
                <a href="index.php" type="button" class="btn btn-info text-white">Kembali</a>

            </form>
        </div>
    </section>
</body>
<?php
// buat kondisi jika tombol tambah diklik
if (isset($_POST['tambah'])) {
    //buat variabel untuk setiap field
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];

    $query = "INSERT INTO tb_siswa (nis, nama, kelas) VALUES('" . $nis . "', '" . $nama . "', '" . $kelas . "')";

    $result = mysqli_query($koneksi, $query);

    //redirect ke halaman utama jika berhasil, tampilkan pesan kesalahan jika gagal
    if ($result) {
        header("location: index.php");
    } else {
        echo "<script>alert('Data gagal ditambahkan!')</script>";
    }
}
?>

</html>