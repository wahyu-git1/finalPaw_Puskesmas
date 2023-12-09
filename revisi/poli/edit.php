<?php 
$koneksi = mysqli_connect("localhost","root","","puskesmas");

$id_poli = $_GET['id'];
$query = "SELECT * FROM poliklinik WHERE id_poli = '$id_poli'";
$hasil = mysqli_query($koneksi, $query);

if (isset($_POST['submit'])){
    $kodepoli = $_POST['kodepoli'];
    $namapoli = $_POST['namapoli'];
    $gedung = $_POST['gedung'];

    $sql = "UPDATE poliklinik SET  
    nama_poli = '$namapoli', gedung = '$gedung'
    WHERE id_poli = '$id_poli'";

    $hasil = mysqli_query($koneksi,$sql);
    if ($hasil){
        header ("Location: poli.php");
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
    <h1>Edit Data Master Poliklinik</h1>
    <?php 
        while($baris = mysqli_fetch_assoc($hasil)):
    ?>
    <form action="" method="post">
        <label for="kodepoli">Kode Poliklinik</label>
        <input type="text" name="kodepoli" value="<?= $baris['id_poli'] ?>" readonly><br>

        <label for="namapoli">Nama Poliklinik</label>
        <input type="text" name="namapoli" value="<?= $baris['nama_poli'] ?>"><br>

        <label for="gedung">Nama Gedung</label>
        <input type="text" name="gedung" value="<?= $baris['gedung'] ?>"><br>

        <div class="btn-container">
            <button type="submit" name="submit" class="btn btn-green">Update</button>
            <a href="poli.php" class="btn btn-red">Batal</a>
        </div>
    </form>
    <?php endwhile; ?>
</body>
</html>