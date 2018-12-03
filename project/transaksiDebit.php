<?php require 'header.php'; ?>
<?php require 'koneksi.php'; ?> 

	<h2>Cek Out Pembayaran</h2>
	
	<form action="halTransaksi.php" method="post">

	<table>
		<thead>
			<tr>
				<th>ID Pelanggan</th>
				<th>Jumlah Debit (Liter/Jam)</th>
				<th>Harga</th>
			</tr>
		</thead>
		<tbody>
			<tr>
			<?php 
				$sql="SELECT * FROM tbl_cekdebit";

				if ($result=mysqli_query($con,$sql)){
					while ($row=mysqli_fetch_row($result)){
						echo "
								<tr><td>".$row[0]."</td>
								<td>".$row[1]."</td>
								<td>".$row[2]."</td>
							";
					}
					mysqli_free_result($result);
				}
				
				mysqli_close($con);
			?>
			</tr>
		</tbody>
	
	<?php 
	
	?>
	<tr>
			<td colspan="3">
				<input type="submit" value="Bayar!" onclick="window.location='insert_data.php';">
				<input type="button" value="Batal" onclick="window.location='cekDebit.php';">
				<input type="hidden" name="id_menu" value="" >
			</td>
		</tr>
		</table>
	</form>
<?php
	require 'footer.php';
?>