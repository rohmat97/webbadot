<?php
	session_start();
	
	require 'koneksi.php';
?>

<html>
	<head>
		<title>PDAP | PDAM ::.</title>
		<link rel="stylesheet" href="riwayat.css">
	</head>
	<body>
		<div class="container">
			<div id="head">
				<div class="left">
					<h2>Pendeteksi Debit Air PDAM ::.</h1>
				</div>
				<div class="right">
					<ul>
						<li>
							<a href="">Cek Debit</a>
						</li>
						<li>
							<a href="">Riwayat</a>
						</li>
						<li>
							<a href="">Login</a>
						</li>
						<li>
							<a href="daftar.php">Daftar</a>
						</li>
						
						<?php if(empty($_SESSION['u'])) { ?>
						
						<li>
							<a href="log.php">Masuk</a>
						</li>
						
						<?php } else { ?>
						
						<li>
							<a href="out.php">Keluar</a>
						</li>
						
						<?php } ?>
					</ul>
				</div>
			</div>
			<div id="body">