<?php
session_start();
if (!isset($_SESSION['username'])){
header("Location:login.php");
}
$conn = mysqli_connect('localhost', 'root', '', 'db_pdap');
$i = 1;
$jlh = "";

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
  <button name="tagihan" value="tagihan_hari" onclick="window.location='tagihan-hari.php';">Hari</button>
  <button name="tagihan" value="tagihan_minggu" onclick="window.location='tagihan-minggu.php';">Minggu</button>
  <button name="tagihan" value="tagihan_bulan" onclick="window.location='tagihan-bulan.php';">Bulan</button>  
  <br>
  <br>
  <h3>Tagihan Bulanan</h3>
  <br>
  <hr>
  <button name="tagihan" value="tagihan_bulan" onclick="window.location='';">Januari</button>
  <button name="tagihan" value="tagihan_bulan" onclick="window.location='';">Februari</button>
  <button name="tagihan" value="tagihan_bulan" onclick="window.location='';">Maret</button>
  <button name="tagihan" value="tagihan_bulan" onclick="window.location='';">April</button>
  <button name="tagihan" value="tagihan_bulan" onclick="window.location='';">Mei</button>
  <button name="tagihan" value="tagihan_bulan" onclick="window.location='';">Juni</button> 
  <button name="tagihan" value="tagihan_bulan" onclick="window.location='';">Juli</button>
  <button name="tagihan" value="tagihan_bulan" onclick="window.location='';">Agustus</button>
  <button name="tagihan" value="tagihan_bulan" onclick="window.location='';">September</button>
  <button name="tagihan" value="tagihan_bulan" onclick="window.location='';">Oktober</button>
  <button name="tagihan" value="tagihan_bulan" onclick="window.location='';">November</button>
  <button name="tagihan" value="tagihan_bulan" onclick="window.location='tagihan-desember.php';">Desember</button>   
  <hr>
  <h3>Tagihan Bulan Desember</h3>
  <div class="hasil" style="background-color: white; margin-bottom: 30px;" >

  <div id="riwayat" style="overflow:auto; width:100%px; height:200px; padding:10px; border:1px solid white">
  <table border="1" rules="all" cellpadding="5">
		<thead>
			<tr style="background-color: #dfdfdf;">
				<th>ID Debit</th>
				<th>Debit Air</th>
				<th>Jumlah Tagihan</th>
				<th>Waktu</th>
			</tr>
		</thead>
		<tbody>
			<tr>
            <?php 
            $sql="SELECT * FROM riwayat";
            $status2 = 0;
				if ($result=mysqli_query($conn,$sql)){
					while ($row=mysqli_fetch_array($result)){
						echo "
								<tr><td>".$row[0]."</td>
								<td>".$row["ketinggian_air"]."</td>
								<td>Rp. ".$row['status2']."</td>
                                <td>".$row['waktu']."</td>
                                ";
                                $status2 += $row['status2'];
					}
					mysqli_free_result($result);
				}
				
				mysqli_close($conn);
			?>
            </tr>
            <tr style="font-weight: bold;">
                <td colspan="3">Jumlah</td>
                <td>Rp. <?php echo  $status2 ?></td>
            </tr>
		</tbody>
 
</div>
</div>

<div class="jumbotron text-center bg-dark navbar-dark">
<font color="white">Copyright &copy; Kelompok 3 TEK A2 2018</font>
</div>

</body>
</html>