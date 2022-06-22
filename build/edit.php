<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update'])) {	
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
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
	} else {	
		//updating the table
		// echo $id;
		$result = mysqli_query($mysqli, "UPDATE users SET nama='$nama',notar='$notar',alamat='$alamat',kota='$kota',kelamin='$kelamin' WHERE id=$id");
		
		// //redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$nama = $res['nama'];
	$notar = $res['notar'];
	$alamat = $res['alamat'];
	$kota = $res['kota'];
	$kelamin = $res['kelamin'];
}
?>
<html>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<head>	
	<title>Data Taruna | Edit Data</title>
</head>

<body>
	<div class="container m-5">
		<a href="index.php" class="text-light text-decoration-none"><br/><button type="button" class="btn btn-danger"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i>  Kembali</a></button></a>
		
		<br>
		<br>
		<h1>Edit Data Taruna</h1>
		<form style="margin-top: 50px;" name="form1" method="post" action="edit.php">
			<div class="mb-3">
			  <label for="nama" class="form-label"><strong>Nama</strong></label>
			  <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $nama;?>">
			</div>
			<div class="mb-3">
			  <label for="notar" class="form-label"><strong>Notar</strong></label>
			  <input type="number" class="form-control" name="notar" id="notar" value="<?php echo $notar;?>">
			</div>
			<div class="mb-3">
			  <label for="alamat" class="form-label"><strong>Alamat</strong></label>
			  <input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo $alamat;?>">
			</div>
			<div class="mb-3">
			  <label for="kota" class="form-label"><strong>Kota</strong></label>
			  <input type="text" class="form-control" name="kota" id="kota" value="<?php echo $kota;?>">
			</div>
			<div class="mb-3">
			  <label for="kelamin" class="form-label"><strong>Kelamin</strong></label>
			  <input type="text" class="form-control" name="kelamin" id="kelamin" value="<?php echo $kelamin;?>">
			</div>
			<input type="hidden" name="id" value=<?php echo $_GET['id'];?>>

			<button type="submit" name="update" class="btn btn-primary">Update</button>
		</form>
	</div>
</body>
</html>
