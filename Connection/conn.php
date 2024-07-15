<?php

// Settings Up Connection
// Jadi Fungsi disini, untuk mendefinisikan koneksinya, untuk detail sebagai berikut :
/*
    ServerName adalah nama server lokal kita, secara default adalah localhost
    Username adalah username yang digunakan untuk login ke database phpmyadmin kita
        ->Default username laragon adalah Root, untuk xampp kosong
    Password adalah password yang digunakan untuk login ke database phpmyadmin kita
        -> Secara Default Password nya adalah kosong, baik laragon maupun xampp
    DBName adalah nama database yang kita gunakan dan akan kita fungsikan nantinya
*/

$ServerName = "localhost";
$Username = "root";
$Password = "";
$DBName = "ProjectPHP";

// Koneksikan Database Terlebih Dahulu
$conn = mysqli_connect($ServerName, $Username, $Password, $DBName);

// Setelah itu cek apakah database dan koneksi berhasil terhubung dengan rumus if
// Dimana jika !$conn maka berarti database dan koneksi gagal jika sudah terhubung dengan benar maka tidak menampilkan pesan apa2
if(!$conn){
    die("Connection Failed : ".mysqli_connect_error());
}

?>