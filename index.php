<?php
include "koneksi.php";
session_start();
if (!isset($_SESSION['username'])){
$username1 = $_POST['username'];
$password1 = md5($_POST['password']);
$sql="SELECT * FROM tbl_pengguna WHERE BINARY username='".$username1."' AND password='".$password1."'";
$login = mysqli_query($con,$sql);
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
// cek apakah username dan password di temukan pada database
if($cek > 0){

    $data = mysqli_fetch_assoc($login);
    // cek jika user login sebagai admin
    if($data['jns_pengguna']=="pertamax"){
        // buat session login dan username
        $_SESSION['username'] = $username1;
        $_SESSION['jns_pengguna'] = "pertamax";
        // alihkan ke halaman dashboard admin
        header("location:history.php");
        // cek jika user login sebagai pegawai
    }else if($data['jns_pengguna']=="Pengguna"){
        // buat session login dan username
        $_SESSION['username'] = $username1;
        $_SESSION['jns_pengguna'] = "Pengguna";
        // alihkan ke halaman dashboard pegawai
        header("location:index.php");

    }else{

        // alihkan ke halaman login kembali
        //header("location:index.php?pesan=gagal");
    }
}else{
    echo "<script type='text/javascript'>alert('login failed! Try Again!')</script>";
    //header("location:index.php?pesan=gagal");
}}elseif (!isset($_SESSION['username'])){
    header("Location:login.php");
}else{


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title > PDAP | PDAM </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <style>
  .fakeimg {
      height: auto;
      width:auto;
      background: #aaa;
      opacity:0.8;
  }
  </style>

  <script src="jquery.min.js"></script>
    <script>
      $(document).ready(function () {
        function getRandom(min, max) {
          min = Math.ceil(min);
          max = Math.floor(max);
          
          return Math.floor(Math.random() * (max - min + 1)) + min;
        }
        
        var time = setInterval(function () {
          $.ajax({
            url: 'reload.php',
            data: { ketinggian_air: getRandom(0, 500) },
            method: 'post',
            dataType: 'json',
            success: function (response) {
              $('#ketinggian_air').html(response.ketinggian_air);
              $('#riwayat').html(response.riwayat);
            }
          });
        }, 5000);
      });
    </script>
</head>
<body background="img/airr.jpg">

<div class="jumbotron text-center" style="margin-bottom:0">
    
  <h1 >Pengukur Debit Air PDAM <br>
      HI <?php

      echo $_SESSION['username']; ?></h1>
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark"> <!--head-->
  <a class="navbar-brand" href="index.php">Cek Debit</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="tagihan.php">Tagihan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="riwayat.php">Riwayat</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
  </button>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Keluar</a>
      </li>    
    </ul>
  </div>  
</nav>
<div class="container" style="text-align: center; font-size: 14pt; background-color: #00BFFF; margin-bottom: 20px;" >
  <link rel="stylesheet" type="text/css" href="css.css">
  <h2>Cek Debit </h2>
  <hr style="color: white;"><hr style="color: white;">
  <div class="hasil" style="background-color: white; margin-bottom: 20px;">
             
                <!--tr>
                    <th>ID Pengguna : </th>
                    <th>Nama Pengguna : </th>
                    <th>Nomor HP : </th>
                    <th>Nomor Rumah : </th>
                    <th></th>
                </tr-->
                <?php
             /* $sql = mysqli_query($con,"SELECT * FROM tbl_riwayat where id_riwayat=3");
              while($row = mysqli_fetch_assoc($sql)){
                    echo"
                    <tr>
                    <td>$row[id_riwayat]</td>
                        <td>$row[id_pengguna]</td>
                        <td>$row[id_tagihan]</td>
                        <td>$row[jlh_debit]</td>
                        <td>$row[jlh_tagihan]</td>
                        <td>$row[tanggal]</td>
                    </tr>
                    ";*/
                require 'koneksi.php';
               // $rows = $this->db->query("SELECT * FROM tbl_pengguna where username='".$this->session->id_pengguna."'")->row_array();
                /*$query = mysqli_query($con, $sql);
                if (!$query) {
                  printf("Error: %s\n", mysqli_error($con));
                  exit();
                }
                while($data = mysqli_fetch_array($query)){*/
           //     echo "Selamat datang : $rows[username]";
                 //}
                ?>
            
            


    Generate Debit Air : <strong id="ketinggian_air">Mengambil data...</strong><br>
    <h2>Tabel Debit Harian</h2>
    <div id="riwayat">
      <table border="1" rules="all" cellpadding="5">
        <tr style="background-color: #dfdfdf;">
          <th>ID Debit</th>
          <th>Debit Air</th>
          <th>Tanggal</th>
        </tr>
        <tr>
          <td colspan="4">Mengambil data...</td>
        </tr>
      </table>
    </div>
</div></div>


<?php include "koneksi.php";?>
           
<div class="jumbotron text-center bg-dark navbar-dark" style="margin-bottom:0">
<font color="white">Copyright &copy; Kelompok 3 TEK A2 2018</font>
</div>

</body>
</html>
<?php
} ?>