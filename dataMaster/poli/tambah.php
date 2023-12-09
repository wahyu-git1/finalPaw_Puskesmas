<?php
$koneksi = mysqli_connect("localhost", "root", "", "puskesmas");

if (isset($_POST['submit'])) {
    $kodepoli = $_POST['kodepoli'];
    $namapoli = $_POST['namapoli'];
    $gedung = $_POST['gedung'];

    $sql = "INSERT INTO poliklinik VALUES('$kodepoli', 
    '$namapoli', '$gedung')";

    $hasil = mysqli_query($koneksi, $sql);
    if ($hasil) {
        header('Location: poli.php');
    } else {
        echo "data gagal ditambahkan";
    }
} else {
    $kodepoli = " ";
    $namapoli = " ";
    $gedung = " ";
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
    <h1>Tambah Data Master Poliklinik</h1>
    <form action="" method="post">
        <label for="kodepoli">Kode Poliklinik</label>
        <input class="form-control" type="text" id="kodepoli" name="kodepoli" placeholder="Masukkan kode poliklinik disini!" required><br>
        
        <label for="namapoli">Nama Poliklinik</label>
        <input class="form-control" type="text" id="namapoli" name="namapoli" placeholder="Masukkan nama poliklinik disini!" required><br>
        
        <label for="gedung">Nama Gedung</label>
        <input class="form-control" type="text" id="gedung" name="gedung" placeholder="Masukkan nama gedung poliklinik disini!" required><br>

        <div class="btn-container">
            <button type="submit" name="submit">Simpan</button>
            <a href="poli.php"class="btn btn-red">Batal</a>
        </div>
    </form>
</body>
</html>
