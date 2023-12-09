<?php 
$koneksi = mysqli_connect("localhost","root","","puskesmas");

$id_dokter = $_GET['id'];
$query = "SELECT * FROM dokter WHERE id_dokter = '$id_dokter'";
$hasil = mysqli_query($koneksi, $query);

if (isset($_POST['submit'])){
    $kodedokter = $_POST['kodedokter'];
    $namadokter = $_POST['namadokter'];
    $spesialis = $_POST['spesialis'];
    $alamat = $_POST['alamat'];
    $notelp = $_POST['notelp'];

    $sql = "UPDATE dokter SET  
    nama_dokter = '$namadokter', spesialis = '$spesialis',
    alamat = '$alamat', no_telp = '$notelp' WHERE id_dokter = '$id_dokter'";

    $hasil = mysqli_query($koneksi,$sql);
    if ($hasil){
        header ("Location: dokter.php");
    } else {
        echo "data gagal diubah";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
</head>
<body>
<?php include "../componen/navigasi.php";?>
    <h1>Edit Data Master dokter</h1>
    <?php 
        while($baris = mysqli_fetch_assoc($hasil)):
    ?>
    <form action="" method="post">
        <label for="kodedokter">Kode Dokter</label>
        <input  class="form-control" type="text" name="kodedokter" value="<?= $baris['id_dokter'] ?>" readonly><br>

        <label for="namadokter">Nama Dokter</label>
        <input class="form-control" type="text" name="namadokter" value="<?= $baris['nama_dokter'] ?>"><br>

        <label for="spesialis">Spesialis</label>
        <input class="form-control" type="text" name="spesialis" value="<?= $baris['spesialis'] ?>"><br>

        <label for="alamat">Alamat</label>
        <input class="form-control" type="text" name="alamat" value="<?= $baris['alamat'] ?>"><br>

        <label for="notelp">Telepon</label>
        <input class="form-control" type="text" name="notelp" value="<?= $baris['no_telp'] ?>"><br>

        <div class="btn-container">
            <button type="submit" name="submit" class="btn btn-green">Update</button>
            <a href="dokter.php" class="btn btn-red">Batal</a>
        </div>
    </form>
    <?php endwhile; ?>
</body>
</html>