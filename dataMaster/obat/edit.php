<?php 
$koneksi = mysqli_connect("localhost","root","","puskesmas");

$id_obat = $_GET['id'];
$query = "SELECT * FROM obat WHERE id_obat = '$id_obat'";
$hasil = mysqli_query($koneksi, $query);

if (isset($_POST['submit'])){
    $kodeobat = $_POST['kodeobat'];
    $namaobat = $_POST['namaobat'];
    $keterangan = $_POST['keterangan'];

    $sql = "UPDATE obat SET nama_obat = '$namaobat', 
    keterangan = '$keterangan' WHERE id_obat = '$id_obat'";

    $hasil = mysqli_query($koneksi,$sql);
    if ($hasil){
        header ("Location: obat.php");
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
    <h1>Edit Data Master Obat</h1>
    <?php 
        while($baris = mysqli_fetch_assoc($hasil)):
    ?>
    <form action="" method="post">
        <label for="kodeobat">Kode Obat</label>
        <input class="form-control" type="text" name="kodeobat" value="<?= $baris['id_obat'] ?>" readonly><br>

        <label for="namaobat">Nama Obat</label>
        <input class="form-control" type="text" name="namaobat" value="<?= $baris['nama_obat'] ?>"><br>

        <label for="keterangan">Keterangan</label>
        <input class="form-control" type="text" name="keterangan" value="<?= $baris['keterangan'] ?>"><br>

        <div class="btn-container">
            <button type="submit" name="submit" class="btn btn-green">Update</button>
            <a href="obat.php" class="btn btn-red">Batal</a>
        </div>
    </form>
    <?php endwhile; ?>
</body>
</html>