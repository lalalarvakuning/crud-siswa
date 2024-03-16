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
    <section class="row">
        <div class="col-md-6 offset-md-3 align-self-center">
            <!-- judul halaman -->
            <h1 class="text-center">Daftar Siswa</h1>

            <!-- Tombol Tambah -->
            <a href="tambah.php" class="btn btn-primary mb-2">Tambah</a>

            <!-- tabel untuk menampilkan data -->
            <table class="table table-striped table-bordered">
                <thead>
                    <!-- header kolom tabel -->
                    <tr class="text-center">
                        <th>No.</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //perulangan untuk menampilkan data dalam baris tabel
                    $no = 1;
                    $query = "SELECT * FROM tb_siswa";
                    $result = mysqli_query($koneksi, $query);
                    ?>
                    <?php
                    foreach ($result as $data) {
                        echo "
                            <tr>
                              <th scope='row'>" . $no++ . ".</th>
                              <td>" . $data["nis"] . "</td>
                              <td>" . $data["nama"] . "</td>
                              <td>" . $data["kelas"] . "</td>
                              <td>
                                <a href='perbarui.php?id=" . $data["id"] . "' type='button' class='btn btn-success'>Perbarui</a>
                                <a href='hapus.php?id=" . $data["id"] . "' type='button' class='btn btn-danger' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>Delete</a>
                              </td>
                            </tr>
                            ";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>