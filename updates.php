<?php

include "koneksi.php";

$sql = "INSERT INTO tbl_pengguna (username, jns_pengguna, no_rumah, no_hp, password)
   VALUES ('".$_POST['username']."', '".$_POST['jns_pengguna']."' ,'".$_POST['no_rumah']."' ,'".$_POST['no_hp']."', '".md5($_POST['password'])."')";
//$stmt = $db->prepare($sql);
// $saved = $stmt->execute($params);
$result = mysqli_query($con, $sql);

if($result){
    header('Location:login.php');
} else{
    echo 'Gagal Tambah Pengguna';
   // header('Location:up.php');
}


//

//$username = $_POST['username'];
//$password = md5($_POST['password']);

//      $sql="select * from tbl_pengguna where username = '" . $username . "' and password = '" .$password . "' ";
//    $result=mysqli_query($con,$sql);
//  $cek = mysqli_num_rows($result);


//        if ($cek !=0 )
//        {
//        $_SESSION['username'] = $username;
//  header("Location: index.php");
//  }else{
?>