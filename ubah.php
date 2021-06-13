<?php
error_reporting(0); //abaikan error pada browser
//panggil file koneksi.php yang sudah anda buat
include "koneksi.php";
?>
<!doctype html public >
<html>
<head>
       <title>Ubah Data</title>
</head>
<body>
<h1> Edit Produk</h1>
<?php
//ambil data berdasarkan parameter GET id
$b = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM barang where id_barang='$_GET[id]'"));

//buat variabel dari setiap field name form data_siswa
$id_barang= mysqli_real_escape_string($conn, $_POST['id_barang']);    //varibel field id barang
$id_kategori= mysqli_real_escape_string($conn, $_POST['id_kategori']);    //varibel field id kategori
$nama_barang= mysqli_real_escape_string($conn, $_POST['nama_barang']);  //varibel field nama barang
$harga= mysqli_real_escape_string($conn, $_POST['harga']);        //varibel field harga
$stok= mysqli_real_escape_string($conn, $_POST['stok']);        //varibel field stok

if(isset($_POST['simpan'])){
 if(empty($id_barang)){    //jika nama kosong maka muncul pesan
        $error="<p style='color:#F00;'>* Masukan ID Barang !!</p>";
    }
    elseif(empty($id_kategori)){ //jika kategori kosong maka muncul pesan
        $error="<p style='color:#F00;'>* Masukan ID Kategori !!</p>";
    }
    elseif(empty($nama_barang)){  //jika deskripsi kosong maka muncul pesan
        $error="<p style='color:#F00;'>* Masukan Nama Barang !!</p>";
    }
    elseif(empty($harga)){  //jika deskripsi kosong maka muncul pesan
        $error="<p style='color:#F00;'>* Masukan Harga !!</p>";
    }
    
    elseif(strlen($stok) < 1){  //jika deskripsi kosong maka muncul pesan
        $error="<p style='color:#F00;'>* Masukan Stok Barang !!</p>";
    }
    else{  //jika semua sudah terpenuhi maka update ke data_siswa

    $save=mysqli_query($conn, "UPDATE barang set id_kategori='$id_kategori',nama_barang='$nama_barang', harga='$harga', stok='$stok' where id_barang='$_GET[id]'");
    if($save){ //jika update berhasil maka muncul pesan dan menuju ke halaman produk
        echo "<script>alert('Data Berhasil disimpan ke database');document.location='index.php'</script>";
    }else{  //jika update gagal maka muncul pesan
         echo "<script>alert('Proses simpan gagal, coba kembali');document.location='ubah.php'</script>";
    }
}
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <table cellspacing="10" width="800" >
    <tbody>
    <tr><td colspan="3"><?php echo $error;?></td></tr>
    <tr>
        <td>ID Barang</td>
        <td></td>
        <td><input type="text" name="id_barang" placeholder="id_barang" size="50" maxlength="30" autocomplete="off" autofocus value="<?php echo $b['id_barang'];?>"/>
        </td>
    </tr>
    <tr>
        <td>ID Kategori</td>
        <td></td>
        <td><input type="text" name="id_kategori" placeholder="id_kategori" size="20" maxlength="50" value="<?php echo $b['id_kategori'];?>"/></td>
    </tr>
    <tr>
        
    <td>Nama Barang</td>
        <td></td>
        <td><input type="text" name="nama_barang" placeholder="nama_barang" size="20" maxlength="50" value="<?php echo $b['nama_barang'];?>"/></td></tr>
    <tr>
        <td>Harga</td>
        <td></td>
        <td><input type="text" name="harga" placeholder="harga" size="20" maxlength="50" value="<?php echo $b['harga'];?>"/></td></tr>
    
    <tr>
        <td>Stok</td>
        <td></td>
        <td><input type="text" name="stok" placeholder="stok" size="20" maxlength="50" value="<?php echo $b['stok'];?>"/></td></tr>
    
    <tr>
        <td><button type="submit" name="simpan">Simpan</button></td>
        <tr><td><a href="index.php">Kembali</a></td></tr>
    </tr>
</tbody>

</table>
</form>

</body>
</html>