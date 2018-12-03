<?php
	require 'header.php';
?>

	<h2>Cek Debit</h2>
	
	<form action="transaksiDebit.php" method="post">
	<table>
	<tr>
			<td>ID Pelanggan</td>
			<td>:</td>
			<td><input type="text" name="idpel" id="idpel" placeholder="ID Pelanggan"></td>
	</tr>
	<tr>
			<td>Jumlah Debit (Liter/jam)</td>
			<td>:</td>
			<td><input type="number" name="jumlah" value="0"></td>
	</tr>
	<tr>
			<td colspan="3">
				<input type="submit" value="Check!" onclick="window.location='insert_data.php';" >
			</td>
		</tr>
		</table>
	
	</form>

<?php
	require 'footer.php';
?>