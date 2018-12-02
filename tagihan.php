<?php
session_start();
if (!isset($_SESSION['username'])){
header("Location:login.php");
}

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
</head>
<body background="img/airr.jpg">

<div class="jumbotron text-center" style="margin-bottom:0">

  <h1 >Pengukur Debit Air PDAM</h1>
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
  <a class="nav-link" href="index.php">Cek Debit</a>
</li>
  <!--button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>-->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <!--ul class="navbar-nav"-->
      <li class="nav-item">
        <a class="navbar-brand" href="tagihan.php">Tagihan</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="riwayat.php">Riwayat</a>
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
  <h2>Tagihan PDAM </h2>
  <br>
  <h3>Pilih periode Tagihan:</h3>
  <br>
  <input type="radio" name="tipe" value="hari" checked>Hari        
  <input type="radio" name="tipe" value="hari" > Minggu        
  <input type="radio" name="tipe" value="hari" > Bulan       
  <br>
  <br>
  <button style="background-color: grey; margin: center;">OK</button>
  <br><br>
  <hr><hr>
  <div class="hasil" style="background-color: white; margin-bottom: 30px;">
  <p style="text-align: left">Jumlah Tagihan anda selama </p>
  <p style="text-align: left">sebesar</p>
      </div></div>
     </div>
     <div>
  </div>
  </div>
</div>
</div>
<div class="jumbotron text-center bg-dark navbar-dark" style="margin-bottom:0">
<font color="white">Copyright &copy; Kelompok 3 TEK A2 2018</font>
</div>

</body>
</html>