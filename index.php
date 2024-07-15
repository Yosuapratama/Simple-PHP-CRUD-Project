<?php
//Panggil koneksinya
include "Connection/conn.php";

// Pertama buat query yang akan difungsikan ke tabel kita nantinya
$sql = "SELECT * FROM siswa";

// Kedua lakukan query dan simpan ke dalam variabel
$dataSiswa = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang Di Halaman Index</title>
    <!-- Menggunakan Bootstrap Sebagai CSS nya -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Data Siswa Terbaru</h1>
        <a href="tambah.php" class="btn btn-success my-2">Tambah Data Siswa</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Umur</th>
                    <th>Alamat</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Pada halaman ini data yg sudah didapat tadi akan dilakukan perulangan untuk ditampilkan -->
                <?php
                //Kenapa Pake Number? Karena kalau pake id jika ada data yg dihapus maka nomernya tidak akan berurutan
                $number = 1;

                while ($siswa = mysqli_fetch_assoc($dataSiswa)) {
                    $id = $siswa['id'];
                    echo "<tr>";
                        echo "<td>" . $number . "</td>";
                        echo "<td>" . $siswa['nama_siswa'] . "</td>";
                        echo "<td>" . $siswa['umur'] . "</td>";
                        echo "<td>" . $siswa['alamat'] . "</td>";
                        echo "<td>" . $siswa['kelas'] . "</td>";
                        echo "<td>" . $siswa['jurusan'] . "</td>";
                        echo "<td>";
                        echo "<a class='btn btn-warning me-2' href='edit.php?id=" . $siswa['id'] . "'>Edit</a>";
                        echo "<a onClick='checkFunction($id)' class='btn btn-danger'>Hapus</a>";
                        echo "</td>";
                    echo "</tr>";
                    // Disini number nya di increment kan, atau ditambah 1/++
                    $number++;
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        //Fungsi Javascript ini untuk ngasih warning sebelum menghapus data
        function checkFunction(id) {
            if (confirm("Apakah anda yakin ingin menghapus data ini?")) {
                window.location.href='hapus.php?id='+id;
            } else {
                return false;
            }
        }
    </script>
</body>

</html>