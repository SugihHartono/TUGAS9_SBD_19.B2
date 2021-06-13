<?php
// Create database connection using config file
include("koneksi.php");
 
// Fetch all users data from database
$sql = 'SELECT * FROM barang';
$result = mysqli_query($conn, $sql);

?>

<DOCTYPE html>
<html lang="en">
<head>    
    <title>Homepage</title>
</head>
 
<body>
<a href = tambah.php>Tambah Barang</a>
    <table width='80%' border=1>
 
    <tr>
        <th>ID Barang</th> <th>ID Kategori</th> <th>Nama Barang</th> <th>Harga</th> <th>Stok</th><th>OPSI</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['id_barang']."</td>";
        echo "<td>".$user_data['id_kategori']."</td>";
        echo "<td>".$user_data['nama_barang']."</td>";
        echo "<td>".$user_data['harga']."</td>";    
        echo "<td>".$user_data['stok']."</td>";
        echo "<td><a href='ubah.php?id=$user_data[id_barang]'>Edit</a> | <a href='hapus.php?id=$user_data[id_barang]'>Delete</a></td></tr>";        
    }
    ?>
    
    </table>
</body>
</html>