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
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>


<script type="text/javascript">
  var chart1; // globally available
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'container',
            type: 'column'
         },   
         title: {
            text: 'Data PDAP'
         },
         xAxis: {
            categories: ['tanggal']
         },
         yAxis: {
            title: {
               text: 'Jumlah tagihan'
            }
         },
              series:             
            [
 <?php
                $user= $_SESSION['username'];
                //MASUK KE TBL PENGGUNA
                $sql1 = mysqli_query($con,"SELECT * FROM tbl_pengguna where username='$user'");
                $row = mysqli_fetch_assoc($sql1);
                $user21= $row['id_pengguna'];
                $user22= $row['jns_pengguna'];
                //MASUK KE TBL RIWAYAT
                $sql2 = mysqli_query($con,"SELECT * FROM tbl_riwayat where id_pengguna='$user21'");
                $row = mysqli_fetch_assoc($sql2);
                $user3=$row['id_riwayat'];
                // MASUK KE RIWAYAT
                if($user22=="Pengguna"){
                    $sql = mysqli_query($con,"SELECT * FROM riwayat where id_riwayat='$user3'");
                }else{

                    $sql = mysqli_query($con,"SELECT * FROM riwayat ");
                }

                $no=1;

              while($row = mysqli_fetch_assoc($sql)){
                    echo"
                    <tr>
                    <td>$no</td>
                    <td>$row[id_riwayat]</td>
                        <td>$row[ketinggian_air]</td>
                        <td>$row[status]</td>
                        <td>$row[status1]</td>
                        <td>$row[status2]</td>
                        <td>$row[waktu]</td>
                    </tr>
                    ";
                  $no=$no+1;
                }
                
                ?> 
</script>

<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  exportEnabled: true,
  title:{
    text: "Data PDAP"
  },
  subtitles: [{
    text: "Currency Used: RUPIAH (RP)"
  }],
  data: [{
    type: "pie",
    showInLegend: "true",
    legendText: "{label}",
    indexLabelFontSize: 16,
    indexLabel: "{label} - ",
    yValueFormatString: "฿#,##0",
    dataPoints: <?php echo json_encode( $dataPoints = array( 
    array("label"=>"$tanggal", "y"=>$jumlahx/$jumlahx*2),
    array("label"=>"$tanggal+1", "y"=>12.55),
    array("label"=>"$tanggal+2", "y"=>8.47),
    ), JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();
 
}
</script>
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
      
  <!--button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>-->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <!--ul class="navbar-nav"-->
      
      <li class="nav-item">
        <a class="navbar-brand" href="riwayat.php">Riwayat</a>
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

<div class="container" style="margin-top:30px; background: #00BFFF ; opacity: 0.8;" >
  <div class="row">
    <div class="col-sm-4">
      <h2>About Me</h2>
      <h5>PDAP | Pendeteksi Debit Air PDAP</h5>
      <img src="img/pdam.png" height= "200px" width="300px">
      <div class="fakeimg" style="background-color: white">
      <p>TEK A 2</p>
      <h3>KELOMPOK 3</h3>
      <p>Muhammad Indryad Praja</p>
      <p>Ranti Kurniati</p>
      <p>Rivan Rachman Kurniawan</p>
      </div>
      <ul class="nav nav-pills flex-column" align="center">
        <li class="nav-item">
          <!--a class="nav-link active" href="#">Call</a-->
          <p></p>
        </li>
        <li class="nav-item" >
          <!--a class="nav-link active" href="#">Message</a-->
          <p></p>
        </li>
        <li class="nav-item">
          <!--a class="nav-link active" href="#">Report</a-->
          <p></p>
        </li>
      </ul>
      <hr class="d-sm-none">
    </div>
    <div class="col-sm-8">
    <div class="container fakeimg" style="background-color: white; margin-top: 20px;">
    <table class="table">
        <div class="form-group" align="right">
        <form class="form-inline" method="post" action="generate_pdf.php">
<button type="submit" id="pdf" name="generate_pdf" class="btn btn-primary"><i class="fa fa-pdf"" aria-hidden="true"></i>
Generate PDF</button>
</form>
        <br>
        <br>
        <p><a href="export.php" style="margin-top: 10px;"><button>Export Data ke Excel</button></a></p>
<p><a href="import.php"><button>import Data dari Excel</button></a></p>

        </div>
            <thead>
                <tr>
                    <th>ID Riwayat</th>
                    <th>ID Pengguna</th>
                    <th>ID Tagihan</th>
                    <th>jumlah Debit</th>
                    <th>Jumlah tagihan</th>
                    <th>Tanggal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $user= $_SESSION['username'];
                //MASUK KE TBL PENGGUNA
                $sql1 = mysqli_query($con,"SELECT * FROM tbl_pengguna where username='$user'");
                $row = mysqli_fetch_assoc($sql1);
                $user21= $row['id_pengguna'];
                $user22= $row['jns_pengguna'];
                //MASUK KE TBL RIWAYAT
                $sql2 = mysqli_query($con,"SELECT * FROM tbl_riwayat where id_pengguna='$user21'");
                $row = mysqli_fetch_assoc($sql2);
                $user3=$row['id_riwayat'];
                // MASUK KE RIWAYAT
                if($user22=="Pengguna"){
                    $sql = mysqli_query($con,"SELECT * FROM riwayat where id_riwayat='$user3'");
                }else{

                    $sql = mysqli_query($con,"SELECT * FROM riwayat ");
                }

                $no=1;

              while($row = mysqli_fetch_assoc($sql)){
                    echo"
                    <tr>
                    <td>$no</td>
                    <td>$row[id_riwayat]</td>
                        <td>$row[ketinggian_air]</td>
                        <td>$row[status]</td>
                        <td>$row[status1]</td>
                        <td>$row[status2]</td>
                        <td>$row[waktu]</td>
                    </tr>
                    ";
                  $no=$no+1;
                }
                
                ?>
            
            </tbody>

            </table>
     
            <div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
            <div id="chartContainer" style="height: 400px; min-width: 80%;"></div>


      </div>
     </div>
     <div>
  </div>
  </div>
</div>
</div>
<div class="jumbotron text-center bg-dark navbar-dark" style="margin-bottom:0">
<font color="white">Copyright &copy; Kelompok 3 TEK A2 2018</font>
</div>
            <?php
            require 'koneksi.php';
            $id_riwayat   = mysqli_query($con,"SELECT id_riwayat FROM tbl_riwayat");         
            $jlh_tagihan = mysqli_query( $con,"SELECT jlh_tagihan FROM tbl_riwayat") ;
            ?>   
            <div style="width: 700px;height: 350px">
                <canvas id="myChart"></canvas>
            </div>
 
            <script>
            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
            type: 'bar',
                data: {
                    labels: [<?php while ($b = mysqli_fetch_array($id_riwayat)) { echo '"' . $b['id_riwayat'] . '",';}?>],
                  datasets: [{
                    label: 'jlh_tagihan',
                    data: [<?php while ($p = mysqli_fetch_array($jlh_tagihan)) { echo '"' . $p['jlh_tagihan'] . '",';}?>],
                    backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>
            
            <p>Total: <?php echo mysqli_num_rows($query) ?></p>
            <div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
            <div id="chartContainer" style="height: 400px; min-width: 80%;"></div>


      </div>
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