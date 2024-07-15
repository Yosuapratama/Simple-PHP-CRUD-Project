<?php
include "Connection/conn.php";

// Jika tombol submit ditekan atau data tersubmit maka akan melakukan fungsi dibawah ini
if (isset($_POST['submit'])) {
    //Ambil data yg sudah di dapat lalu masukan ke variabel
    $nama_siswa = $_POST['nama_siswa'];
    $umur = $_POST['umur'];
    $alamat = $_POST['alamat'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    //Masukan data tersebut ke dalam tabel siswa sesuai value yg ada
    $sql = "INSERT INTO siswa (nama_siswa, umur, alamat, kelas, jurusan) VALUES ('$nama_siswa', '$umur', '$alamat', '$kelas', '$jurusan')";

    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo "<script>
                alert('Data Berhasil Disimpan !');
            </script>";
        // header("Location: index.php"); 
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
    <title>Halaman Tambah Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <h1 class="mt-5 mb-2">Halaman Tambah Data Siswa</h1>
        <a href="index.php" class="btn btn-success my-2 mb-5">Kembali</a>

        <div class="container">
            <form method="POST" class="mt-2" action="tambah.php" class="">
                <div class="mb-3">
                    <label class="form-label" for='nama_siswa'>Nama Siswa</label>
                    <input placeholder="Masukan Nama Siswa..." class="form-control" type='text' id='nama_siswa' name='nama_siswa' required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for='umur'>Umur Siswa</label>
                    <input placeholder="Masukan Umur Siswa..." class="form-control" type='text' id='umur' name='umur' required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for='alamat'>Alamat</label>
                    <input placeholder="Masukan Alamat Siswa..." class="form-control" type='text' id='alamat' name='alamat' required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for='kelas'>Kelas</label>
                    <input placeholder="Masukan Kelas Siswa..." class="form-control" type='number' id='kelas' name='kelas' required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for='jurusan'>Jurusan</label>
                    <select class="form-control" name="jurusan" id="">
                        <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                        <option value="Teknik Komputer Dan Jaringan">Teknik Komputer Dan Jaringan</option>
                    </select>
                    
                </div>
                <button name="submit" type="submit" class="btn btn-primary mb-5">Submit</button>
            </form>
        </div>

    </div>
</body>

</html>