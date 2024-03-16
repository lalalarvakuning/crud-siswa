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

<?php
//mengambil id dari paraemeter browser
$id = $_GET['id'];

//query untuk mengambil data berdasarkan id
$query = "SELECT * FROM tb_siswa WHERE id = $id";
$result = mysqli_query($koneksi, $query);
foreach ($result as $data)
?>

<body>
    <section class="row">
        <div class="col-md-6 offset-md-3 align-self-center">
            <h1 class="text-center mt-4">Form Perbarui Data</h1>
            <form method="POST">
                <input type="hidden" value="<?= $data['id'] ?>" name="id">
                <div class="mb-3">
                    <label class="form-label">NIS</label>
                    <input type="number" class="form-control" id="inputNis" name="nis" value="<?= $data['nis'] ?>" placeholder="Masukkan nis siswa">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" id="inputNama" name="nama" value="<?= $data['nama'] ?>" placeholder="Masukkan nama siswa">
                </div>
                <div class="mb-3">
                    <label class="form-label">Kelas</label>
                    <input type="text" class="form-control" id="inputKelas" name="kelas" value="<?= $data['kelas'] ?>" placeholder="Masukkan kelas siswa">
                </div>
                <input name="perbarui" type="submit" class="btn btn-primary" value="Perbarui">
                <a href="index.php" type="button" class="btn btn-info text-white">Kembali</a>
            </form>
        </div>
    </section>
</body>
<?php
// buat kondisi jika tombol update diklik
if (isset($_POST['perbarui'])) {
    //buat variabel untuk setiap field
    $id = $_POST['id'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];

    $query = "UPDATE tb_siswa SET nis = '$nis', nama = '$nama', kelas = '$kelas' WHERE id = '$id'";

    $result = mysqli_query($koneksi, $query);

    //redirect ke halaman utama jika berhasil, tampilkan pesan kesalahan jika gagal
    if ($result) {
        header("location: index.php");
    } else {
        echo "<script>alert('Data gagal diperbarui!')</script>";
    }
}
?>

</html>