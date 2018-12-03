<?php include 'header.php'; ?>
<?php include 'koneksi.php'; ?> 

	<h2>Riwayat Transaksi PDAM</h2>

	<form action="halTransaksi.php" method="post">
		<table>
		<thead>
			<tr>
				<th></br>ID Pelanggan</th>
				<th></br>Jumlah Debit (Liter/Jam)</th>
				<th></br>Harga</th>
				<th></br>Tanggal</th>
			</tr>
		</thead>
	<!--$host = 'localhost'
	$password = '';;
	$username = 'root';
	$db_name = 'db_pdap';
	
	$con = mysqli_connect($host, $username, $password, $db_name);

				<div id="display">
					<img src="" id="disp">
					<div id="title">Riwayat</div>
				</div> 
			<div id="table1">-->	
					
					
					<!--	$sql = "SELECT * FROM tbl_riwayat";
						
						$result = mysqli_query($con, $sql);
						
						while($row = mysqli_fetch_assoc($result)) {
					?>
					-->
					<tbody>
						<img src="background.jpg" id="image" class="img">
					<tr>
					<?php
				
						$sql = 'SELECT id_pengguna, jlh_debit, jlh_tagihan, tanggal FROM tbl_riwayat';
						$query = mysqli_query($con, $sql);

						if (!$query) {
							die ('SQL Error: ' . mysqli_error($con));
						}

					echo '<table>
					<thead>
						<tr>
							<th>ID PENGGUNA</th>
							<th>JUMLAH DEBIT</th>
							<th>JUMLAH TAGIHAN</th>
							<th>TANGGAL</th>
						</tr>
					</thead>
					<tbody>';
		
					while ($row = mysqli_fetch_assoc($query))
					{
						echo '<tr>
							<td>'.$row['id_pengguna'].'</td>
							<td>'.$row['tgl_transaksi'].'</td>
							<td>'.number_format($row['jlh_tagihan'], 0, ',', '.').'</td>
							<td class="right">'.$row['jlh_debit'].'</td>
						</tr>';
					}
					echo '
					</tbody>
				</table>';
				mysqli_free_result($query);
				mysqli_close($con);
				?>
				</tr>
				</tbody>
				</div>
			</table>
	</form>
<?php include 'footer.php'; ?>