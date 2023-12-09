<?php
$koneksi = mysqli_connect("localhost", "root", "", "puskesmas");

if (isset($_POST['submit'])) {
    $kodeobat = $_POST['kodeobat'];
    $namaobat = $_POST['namaobat'];
    $keterangan = $_POST['keterangan'];

    $sql = "INSERT INTO obat VALUES
    ('$kodeobat', '$namaobat', '$keterangan')";

    $hasil = mysqli_query($koneksi, $sql);
    if ($hasil) {
        header('Location: obat.php');
    } else {
        echo "data gagal ditambahkan";
    }
} else {
    $kodeobat = " ";
    $namaobat = " ";
    $keterangan = " ";
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
    <h1>Tambah Data Master Obat</h1>
    <form action="" method="post">
        <label for="kodeobat">Kode Obat</label>
        <input type="text" id="kodeobat" name="kodeobat" placeholder="Masukkan kode obat disini!" required><br>
        
        <label for="namaobat">Nama Obat</label>
        <input type="text" id="namaobat" name="namaobat" placeholder="Masukkan nama obat disini!" required><br>
        
        <label for="keterangan">Keterangan</label>
        <input type="text" id="keterangan" name="keterangan" placeholder="Masukkan keterangan obat disini!" required><br>

        <div class="btn-container">
            <button type="submit" name="submit">Simpan</button>
            <a href="obat.php">Batal</a>
        </div>
    </form>
</body>
</html>
