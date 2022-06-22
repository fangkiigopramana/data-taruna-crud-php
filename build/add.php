<html>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<head>	
	<title>Tambah Data</title>
</head>

<body>
	<div class="container m-5">
	<?php
	//including the database connection file
	include_once("config.php");

	if(isset($_POST['Submit'])) {	
		$nama = mysqli_real_escape_string($mysqli, $_POST['nama']);
		$notar = mysqli_real_escape_string($mysqli, $_POST['notar']);
		$alamat = mysqli_real_escape_string($mysqli, $_POST['alamat']);
		$kota = mysqli_real_escape_string($mysqli, $_POST['kota']);
		$kelamin = mysqli_real_escape_string($mysqli, $_POST['kelamin']);
			
		// checking empty fields
		if(empty($nama) || empty($notar) || empty($alamat) || empty($kota) || empty($kelamin)) {
					
			if(empty($nama)) {
				echo "<font color='red'>Nama Masih Kosong.</font><br/>";
			}
			
			if(empty($notar)) {
				echo "<font color='red'>Notar Masih Kosong.</font><br/>";
			}
			
			if(empty($alamat)) {
				echo "<font color='red'>Alamat Masih Kosong.</font><br/>";
			}

			if(empty($kota)) {
				echo "<font color='red'>Kota Masih Kosong.</font><br/>";
			}

			if(empty($kelamin)) {
				echo "<font color='red'>Kelamin Masih Kosong.</font><br/>";
			}
			
			//link to the previous page
			echo "<br/><a href='javascript:self.history.back();'><button type='/button/' class='/btn btn-danger/'>Danger</button></a>";
		} else { 
			// if all the fields are filled (not empty) 
				
			//insert data to database	
			$result = mysqli_query($mysqli, "INSERT INTO users(nama,notar,alamat,kota,kelamin) VALUES('$nama','$notar','$alamat','$kota','$kelamin')");
			
			//display success message
			echo "<font color='green'>Data Berhasil Ditambahkan !!.";
			echo "<br/><a href='index.php'>Lihat Hasil</a>";
		}
	}
	?>
	</div>
</body>
</html>
