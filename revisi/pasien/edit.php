<?php 
$koneksi = mysqli_connect("localhost","root","","puskesmas");

$id_pasien = $_GET['id'];
$query = "SELECT * FROM pasien WHERE id_pasien = '$id_pasien'";
$hasil = mysqli_query($koneksi, $query);

if (isset($_POST['submit'])){
    $kodepasien = $_POST['kodepasien'];
    $nomoridentitas = $_POST['nomoridentitas'];
    $namapasien = $_POST['namapasien'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $alamat = $_POST['alamat'];
    $notelp = $_POST['notelp'];

    $sql = "UPDATE pasien SET nomor_identitas = '$nomoridentitas',
    nama_pasien = '$namapasien', jenis_kelamin = '$jeniskelamin',
    alamat = '$alamat', no_telp = '$notelp' WHERE id_pasien = '$id_pasien'";

    $hasil = mysqli_query($koneksi,$sql);
    if ($hasil){
        header ("Location: pasien.php");
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
    <h1>Edit Data Master pasien</h1>
    <?php 
        while($baris = mysqli_fetch_assoc($hasil)):
    ?>
    <form action="" method="post">
        <label for="kodepasien">Kode Pasien</label>
        <input type="text" name="kodepasien" value="<?= $baris['id_pasien'] ?>"><br>
        
        <label for="nomoridentitas">Nomor Identitas Pasien</label>
        <input type="text" name="nomoridentitas" value="<?= $baris['nomor_identitas'] ?>"><br>

        <label for="namapasien">Nama Pasien</label>
        <input type="text" name="namapasien" value="<?= $baris['nama_pasien'] ?>"><br>

        <label for="jeniskelamin">Jenis Kelamin</label>
        <select name="jeniskelamin" id="jeniskelamin">
            <option value="">Pilih Jenis Kelamin</option>
            <option value="P" <?php if ($baris['jenis_kelamin'] === 'P') echo 'selected'; ?>>Perempuan</option>
            <option value="L" <?php if ($baris['jenis_kelamin'] === 'L') echo 'selected'; ?>>Laki-laki</option>
        </select><br>


        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" value="<?= $baris['alamat'] ?>"><br>

        <label for="notelp">Telepon</label>
        <input type="text" name="notelp" value="<?= $baris['no_telp'] ?>"><br>

        <div class="btn-container">
            <button type="submit" name="submit" class="btn btn-green">Update</button>
            <a href="pasien.php" class="btn btn-red">Batal</a>
        </div>
    </form>
    <?php endwhile; ?>
</body>
</html>