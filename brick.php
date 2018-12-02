<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Grafik Penduduk Indonesia</title>
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
            text: 'Data Penduduk Indonesia Per Provinsi'
         },
         xAxis: {
            categories: ['jlh_debit']
         },
         yAxis: {
            title: {
               text: 'Jumlah tagihan'
            }
         },
              series:             
            [
<?php         
include "koneksi.php";
$sql   = "SELECT * from tbl_riwayat";
$query = mysqli_query( $con,$sql )  ;         
while($ambil = mysqli_fetch_array($query)){
	$jlh_debit=$ambil['jlh_debit'];
	$sql_jumlah   = "SELECT * from tbl_riwayat where jlh_debit='$jlh_debit'";        
	$query_jumlah = mysqli_query( $con,$sql_jumlah ) ;
	while( $data = mysqli_fetch_array( $query_jumlah ) ){
	   $jumlahx = $data['jlh_tagihan'];                 
	  }             
	  
	  ?>
	  {
		  name: '<?php echo $jlh_debit; ?>',
		  data: [<?php echo $jumlahx; ?>]
	  },
	  <?php } ?>
]
});
});	
</script>
</head>
<body>
<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>

</body>
</html>