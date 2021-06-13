<?php
error_reporting(E_ALL);
include_once 'koneksi.php';
if (isset($_POST['submit']))
{
 $id_barang = $_POST['id_barang'];
 $id_kategori = $_POST['id_kategori'];
 $nama_barang = $_POST['nama_barang'];
 $harga = $_POST['harga'];
 $stok = $_POST['stok'];


 $sql = 'INSERT INTO barang (id_barang,id_kategori,nama_barang,harga,stok) ';
 $sql .= "VALUE ('{$id_barang}', '{$id_kategori}','{$nama_barang}', '{$harga}','{$stok}')";
 $result = mysqli_query($conn, $sql);
 header('location: index.php');
}
?>
<!DOCTYPE html> 
<html lang="en"><html>
<head>
	<title>Tambah Barang</title>
</head>
<body>
    <h1>Tambah Barang Baru</h1>
<form action="tambah.php" method="post" enctype="multipart/form-data">
		<table width="45%">
            <tr>
                <td>ID Barang</td>
                <td><input type="text" name="id_barang"></td>
			<tr> 
				<td>ID Kategori</td>
				<td><input type="text" name="id_kategori"></td>
			</tr>
			<tr> 
				<td>Nama Barang</td>
				<td><input type="text" name="nama_barang"></td>
			</tr>
			<tr> 
				<td>Harga</td>
				<td><input type="text" name="harga"></td>
			</tr>
			<tr> 
				<td>Stok</td>
				<td><input type="text" name="stok"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="submit" value="Tambah">
                <a href="tambah.php"><button style=background-color:red>Hapus</button></a></td>
                <tr><td><a href="index.php">Kembali</a></td></tr>
	
			</tr>
		</table>
	</form>
	
</body>
</html>
</body>
</html>