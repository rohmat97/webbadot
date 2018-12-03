
<table border="1">
	<tr>
    <th>NO.</th>
       <th>id_riwayat.</th>
        <th>id_pengguna</th>
		<th>id_tagihan</th>		
		<th>jlh_debit</th>
		<th>jlh_tagihan</th>
		<th>tanggal</th>
	</tr>
	<?php
	//koneksi ke database
	include 'koneksi.php';
	
	//query menampilkan data
	$sql = mysqli_query($con,"SELECT * FROM tbl_riwayat ");
	$no = 1;
	while($data = mysqli_fetch_assoc($sql)){
		echo '
        <tr>
            <td>'.$no.'</td>
            <td>'.$data['id_riwayat'].'</td>
			<td>'.$data['id_pengguna'].'</td>
			<td>'.$data['id_tagihan'].'</td>
            <td>'.$data['jlh_debit'].'</td>
            <td>'.$data['jlh_tagihan'].'</td>
            <td>'.$data['tanggal'].'</td>
		</tr>
		';
		$no++;
	}
	?>
</table>