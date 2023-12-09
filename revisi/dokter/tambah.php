<?php
$koneksi = mysqli_connect("localhost", "root", "", "puskesmas");

if (isset($_POST['submit'])) {
    $kodedokter = $_POST['kodedokter'];
    $namadokter = $_POST['namadokter'];
    $spesialis = $_POST['spesialis'];
    $alamat = $_POST['alamat'];
    $notelp = $_POST['notelp'];

    $sql = "INSERT INTO dokter VALUES('$kodedokter', 
    '$namadokter', '$spesialis', '$alamat', '$notelp')";

    $hasil = mysqli_query($koneksi, $sql);
    if ($hasil) {
        header('Location: dokter.php');
    } else {
        echo "data gagal ditambahkan";
    }
} else {
    $kodedokter = " ";
    $namadokter = " ";
    $spesialis = " ";
    $alamat = " ";
    $notelp = " ";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>
<body>
<?php include "../componen/navigasi.php";?>
    <h1>Tambah Data Master Dokter</h1>
    <form action="" method="post">
        <label for="kodedokter">Kode Dokter</label>
        <input type="text" id="kodedokter" name="kodedokter" placeholder="Masukkan kode anda disini!" required><br>
        
        <label for="namadokter">Nama Dokter</label>
        <input type="text" id="namadokter" name="namadokter" placeholder="Masukkan nama anda disini!" required><br>
        
        <label for="spesialis">Spesialis</label>
        <input type="text" id="spesialis" name="spesialis" placeholder="Masukkan spesialisasi anda disini!" required><br>

        <label for="alamat">Alamat</label>
        <input type="text" id="alamat" name="alamat" placeholder="Masukkan alamat anda disini!" required><br>

        <label for="notelp">Telepon</label>
        <input type="text" id="notelp" name="notelp" placeholder="08x-xxx-xxx" required><br>

        <div class="btn-container">
            <button type="submit" name="submit" class="btn btn-green">Simpan</button>
            <a href="dokter.php"class="btn btn-red">Batal</a>
        </div>
    </form>
</body>
</html>
