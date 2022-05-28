<?php

include("model/Template.class.php");
include("model/DB.class.php");
include("model/Pasien.class.php");
include("model/TabelPasien.class.php");
include("view/form_pasien.php");

$tp = new FormPasien();

// ADD DATA
if (isset($_POST['btn-add'])) {
    
    // panggil method untuk menambahkan data pasien
    $tp->tambahPasien($_POST);
    header('location: index.php');
} 

// UPDATE DATA
else if (isset($_GET['id_ubah']) && isset($_POST['btn-update'])) {
    
    // panggil method untuk mengubah data pasien
    $tp->ubahPasien($_GET['id_ubah'], $_POST);
    header('location: index.php');
}

// AMBIL id_ubah
else if (isset($_GET['id_ubah'])) {

    // panggil method untuk menampilkan data pada form yang akan diupdate
    $tp->tampilUpdate($_GET['id_ubah']);
}

// KONDISI NORMAL (menampilkan data)
else {
    $tp->tampil();
}


?>