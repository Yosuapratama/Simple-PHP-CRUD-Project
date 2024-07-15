<?php
//Panggil koneksinya
include 'Connection/conn.php';

//Ini Lebih ke fungsi aja buat ngejalanin fungsi hapusnya
if ($_GET['id']) {

    // ambil id dari query string
    $id = $_GET['id'];

    // Sebelum menghapus data lakukan checking terlebih dahulu apakah datanya ada
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

    // Jika datanya ada maka buat query hapus
    $sql = "DELETE FROM siswa WHERE id=$id";
    $query = mysqli_query($conn, $sql);

    // apakah query hapus berhasil?
    if ($query) {
        echo "<script>
                alert('Data Berhasil Dihapus !');
                document.location.href = 'index.php';
            </script>";
    } else {
        echo "<script>
        alert('Data Gagal Dihapus !');
        document.location.href = 'index.php';
    </script>";
    }
} else {
    echo "<script>
        alert('Akses Dilarang !');
        document.location.href = 'index.php';
    </script>";
}
