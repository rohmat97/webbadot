<?php
	$ketinggian_air = $_POST['ketinggian_air'];
	
	$conn = mysqli_connect('localhost', 'root', '', 'db_pdap');
	
	$sql = "SELECT * FROM ambang_batas ORDER BY id_ambang_batas";
	
	$result = mysqli_query($conn, $sql);
	
	$status = '';

	$i = 1;
	
	while ($row = mysqli_fetch_assoc($result)) {
		if (eval('return '.$ketinggian_air.$row['ketinggian_air'].';')) {
				break;
		}
	}
	
	$sql = "SELECT * FROM riwayat ORDER BY waktu DESC";
	
	$result = mysqli_query($conn, $sql);
	
	$riwayat = '<table border="1" rules="all" cellpadding="5">
				<tr style="background-color: #dfdfdf;">
					<th>#</th>
					<th>Debit Air</th>
					<th>Waktu</th>
				</tr>';
	
	while ($row = mysqli_fetch_assoc($result)) {
		$riwayat .= '<tr>
					<td>'.($i++).'</td>
					<td>'.$row['ketinggian_air'].'</td>
					<td>'.$row['waktu'].'</td>
				</tr>';
		
		
	}
	
	if (! mysqli_num_rows($result))
		$riwayat .= '<tr>
					<td colspan="4">Tidak ada data</td>
				</tr>';
	
	$riwayat .= '</table>';
	
	$sql = "INSERT INTO riwayat (ketinggian_air, waktu) 
			VALUES ('".$ketinggian_air."',
			'".date('Y-m-d h:i:s')."')";
	
	$result = mysqli_query($conn, $sql);
	
	$response = array(
					'ketinggian_air' => $ketinggian_air,
					'riwayat' => $riwayat
				);
	
	echo json_encode($response);
?>