<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC"); // using mysqli_query instead
?>

<html>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<head>	
	<title>Daftar Data Taruna</title>
</head>

<body>
	<div class="container m-5">
		<a href="add.html"><button type="button" class="btn btn-success"><i class="fa fa-plus-circle" aria-hidden="true"></i>   Tambah Data</button></a><br/><br/>

		<table class="table">
			<thead>
				<tr>
				<th scope="col">Nama</th>
				<th scope="col">Notar</th>
				<th scope="col">Alamat</th>
				<th scope="col">Kota</th>
				<th scope="col">Kelamin</th>
				<th scope="col">Perubahan</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
					while($res = mysqli_fetch_array($result)) { 		
						echo "<tr>";
						echo "<td>".$res['nama']."</td>";
						echo "<td>".$res['notar']."</td>";
						echo "<td>".$res['alamat']."</td>";	
						echo "<td>".$res['kota']."</td>";	
						echo "<td>".$res['kelamin']."</td>";	
						echo "<td><a href=\"edit.php?id=$res[id]\"><i class=\"fa fa-pencil\" aria-hidden=\"true\" alt=\"Edit\"></i></a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Ups, Yakin Data Mau dihapus?')\"><i class=\"fa fa-trash\" aria-hidden=\"true\" alt=\"Delete\"></i></a></td>";		
						echo "<tr>";
					}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>
