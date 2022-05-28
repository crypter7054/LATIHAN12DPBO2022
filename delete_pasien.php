<?php

include("model/Template.class.php");
include("model/DB.class.php");
include("model/Pasien.class.php");
include("model/TabelPasien.class.php");
include("view/TampilPasien.php");

$pasien = new ProsesPasien();

// DELETE
if (!empty($_GET['id_hapus'])) {

    // simpan data id_hapus ke variabel
    $id = $_GET['id_hapus'];

    // panggil method untuk delete pasien berdasarkan id
    $pasien->deletePasien($id);
    header("location:index.php");
}

?>