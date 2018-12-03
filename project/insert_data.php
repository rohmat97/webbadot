<?php
 
include 'koneksi.php';
 
$id = $_POST['id_pengguna'];
$debit = $_POST['jlh_debit'];
$tagihan = $_POST['jlh_tagihan'];
 
$query = mysqli_query("INSERT INTO tbl_cekdebit (id_pengguna,jlh_debit,jlh_tagihan) VALUES ('$id', '$debit', '$tagihan');");
if($query){
    echo 'Data berhasil disimpan';
}  else {
    echo 'Data gagal disimpan';
}
 
?>



