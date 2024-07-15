<?php

// Panggil Kembali Koneksi nya
include "Connection/conn.php";

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM siswa WHERE id = $id";
    
    $query = mysqli_query($conn, $sql);

    // Ambil Data dari Database
    $siswa = mysqli_fetch_assoc($query);

    // Jika tidak ada yg ditemukan berdasarkan id yg dicari maka dia akan mengeluarkan paksa ke halaman index

    if (!$siswa) {
        echo "<script>
            alert('Data Tidak Ditemukan !');
            document.location.href = 'index.php';
        </script>";
    }
}else{
    echo "<script>
        alert('Data Tidak Ditemukan !');
        document.location.href = 'index.php';
    </script>";
}

//Jika tombol submit ditekan atau data tersubmit maka akan melakukan fungsi dibawah ini

if (isset($_POST['submit'])) {
    //Ambil data yg sudah di dapat lalu masukan ke variabel
    $id = $_POST['id'];
    $nama_siswa = $_POST['nama_siswa'];
    $umur = $_POST['umur'];
    $alamat = $_POST['alamat'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    //Masukan data tersebut ke dalam tabel siswa sesuai value yg ada
    //Gunakan Perintah update untuk memperbarui data yg ada, yang dicari berdasarkan ID karena id merupakan primary yang tidak akan sama

    $sql = "UPDATE siswa SET nama_siswa='$nama_siswa', alamat='$alamat', umur='$umur', kelas='$kelas', jurusan='$jurusan' WHERE id=$id";

    $query = mysqli_query($conn, $sql);

    //Cek Querynya apakah berhasil atau tidak
    if ($query) {
        echo "<script>
                alert('Data Berhasil Diperbarui !');
                document.location.href = 'index.php';
            </script>";
    } else {
        echo "<script>
                alert('Data Gagal Disimpan !');
            </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Edit Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <h1 class="mt-5 mb-2">Halaman Edit Data Siswa</h1>
        <a href="index.php" class="btn btn-success my-2 mb-5">Kembali</a>

        <div class="container">
            <form method="POST" class="mt-2" action="" class="">
                <input value="<?= $siswa['id'] ?>" class="form-control" type='hidden' name='id' required>

                <div class="mb-3">
                    <label class="form-label" for='nama_siswa'>Nama Siswa</label>
                    <input value="<?= $siswa['nama_siswa'] ?>" placeholder="Masukan Nama Siswa..." class="form-control" type='text' id='nama_siswa' name='nama_siswa' required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for='umur'>Umur Siswa</label>
                    <input value="<?= $siswa['umur'] ?>" placeholder="Masukan Umur Siswa..." class="form-control" type='text' id='umur' name='umur' required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for='alamat'>Alamat</label>
                    <input value="<?= $siswa['alamat'] ?>" placeholder="Masukan Alamat Siswa..." class="form-control" type='text' id='alamat' name='alamat' required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for='kelas'>Kelas</label>
                    <input value="<?= $siswa['kelas'] ?>" placeholder="Masukan Kelas Siswa..." class="form-control" type='number' id='kelas' name='kelas' required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for='jurusan'>Jurusan</label>
                    <select class="form-control" name="jurusan" id="">
                        <option <?php
                            if($siswa['jurusan'] == 'Rekayasa Perangkat Lunak'){ 
                                echo "selected";
                            }
                         ?> value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                        <option <?php
                            if($siswa['jurusan'] == 'Teknik Komputer Dan Jaringan'){ 
                                echo "selected";
                            }
                         ?> value="Teknik Komputer Dan Jaringan">Teknik Komputer Dan Jaringan</option>
                    </select>
                    <!-- <input value="<?= $siswa['jurusan'] ?>" placeholder="Masukan Jurusan Siswa..." class="form-control" type='text' id='jurusan' name='jurusan' required> -->
                </div>
                <button name="submit" type="submit" class="btn btn-primary mb-5">Update Data</button>
            </form>
        </div>

    </div>
</body>

</html>