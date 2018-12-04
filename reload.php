<?php
session_start();
if (!isset($_SESSION['username'])){
    header("Location:login.php");
}

?>
<?php
	$ketinggian_air = $_POST['ketinggian_air'];
	
	$conn = mysqli_connect('localhost', 'root', '', 'db_pdap');
	
	$sql = "SELECT * FROM ambang_batas ORDER BY id_ambang_batas";
	
	$result = mysqli_query($conn, $sql);
	
	$status = $_POST['ketinggian_air'] * 5;			//harian
	$status1 = $_POST['ketinggian_air'] * 5 * 7;  //mingguan
	$status2 = $_POST['ketinggian_air'] * 5 * 30; //bulanan

	$i = 1;

	$sql = "INSERT INTO status WHERE ketinggian_air * 5";
	$sql = "INSERT INTO status1 WHERE ketinggian_air * 5 * 7";
	$sql = "INSERT INTO status2 WHERE ketinggian_air * 5 * 30";
	
	while ($row = mysqli_fetch_assoc($result)) {
		if (eval('return '.$ketinggian_air.$row['ketinggian_air'].';')) {
			$status = $row['status'];
			$status1 = $row['status1'];
			$status2 = $row['status2'];
			
				break;
		}
	}
	
	$sql = "SELECT * FROM riwayat ORDER BY waktu DESC";
	
	$result = mysqli_query($conn, $sql);
	
	$riwayat = '<table border="1" rules="all" cellpadding="5">
				<tr style="background-color: #dfdfdf;">
					<th>ID Debit</th>
					<th>Debit Air</th>
					<th>Jumlah Tagihan</th>
					<th>Waktu</th>
				</tr>';
	
	while ($row = mysqli_fetch_assoc($result)) {
		$riwayat .= '<tr>
					<td>'.($i++).'</td>
					<td>'.$row['ketinggian_air'].' liter/menit</td>
					<td>Rp. '.number_format($row['status'] , 0, ',', '.').'</td>
					<td>'.$row['waktu'].'</td>
					
					
				</tr>';
				if ($i == 21){
					break;
				}
				
		
		
	}
	
	if (! mysqli_num_rows($result))
		$riwayat .= '<tr>
					<td colspan="4">Tidak ada data</td>
				</tr>';
	
	$riwayat .= '</table>';
$user= $_SESSION['username'];
//MASUK KE TBL PENGGUNA
$sql1 = mysqli_query($conn,"SELECT * FROM tbl_pengguna where username='$user'");
$row = mysqli_fetch_assoc($sql1);
$user21= $row['id_pengguna'];

	$sql = "INSERT INTO riwayat (id_pengguna,ketinggian_air, status, status1, status2, waktu) 
			VALUES ('".$user21."',
			'".$ketinggian_air."',
					'".$status."',
					'".$status1."',
					'".$status2."',
			'".date('Y-m-d h:i:s')."')";
	
	$result = mysqli_query($conn, $sql);
	
	$response = array(
					'ketinggian_air' => $ketinggian_air,
					'status' => $status,
					'status1' => $status1,
					'status2' => $status2,
					'riwayat' => $riwayat
				);
	
	echo json_encode($response);
?>