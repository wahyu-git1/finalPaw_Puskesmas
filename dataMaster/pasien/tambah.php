<?php
$koneksi = mysqli_connect("localhost", "root", "", "puskesmas");

if (isset($_POST['submit'])) {
    $kodepasien = $_POST['kodepasien'];
    $identitas = $_POST['identitas'];
    $namapasien = $_POST['namapasien'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $alamat = $_POST['alamat'];
    $notelp = $_POST['notelp'];

    $sql = "INSERT INTO pasien VALUES('$kodepasien', '$identitas',
    '$namapasien', '$jeniskelamin', '$alamat', '$notelp')";

    $hasil = mysqli_query($koneksi, $sql);
    if ($hasil) {
        header('Location: pasien.php');
    } else {
        echo "data gagal ditambahkan";
    }
} else {
    $kodepasien = " ";
    $identitas = " ";
    $namapasien = " ";
    $jeniskelamin = " ";
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
    <h1>Tambah Data Master Pasien</h1>
    <form action="" method="post">
        <label for="kodepasien">Kode Pasien</label>
        <input class="form-control" type="text" id="kodepasien" name="kodepasien" placeholder="Masukkan kode pasien disini!" required><br>
        
        <label for="identitas">Nomor Identitas</label>
        <input class="form-control" type="text" id="identitas" name="identitas" placeholder="Masukkan nomor identitas pasien disini!" required><br>
        
        <label for="namapasien">Nama Pasien</label>
        <input class="form-control" type="text" id="namapasien" name="namapasien" placeholder="Masukkan nama pasien disini!" required><br>
        
        <label for="jeniskelamin">Jenis Kelamin</label>
            <select name="jeniskelamin" id="jeniskelamin">
                <option disabled selected>Pilih Jenis Kelamin Pasien</option>
                <option value="P">Perempuan</option>
                <option value="L">Laki-laki</option>
            </select><br>

        <label for="alamat">Alamat</label>
        <input class="form-control" type="text" id="alamat" name="alamat" placeholder="Masukkan alamat pasien disini!" required><br>

        <label for="notelp">Telepon</label>
        <input class="form-control" type="text" id="notelp" name="notelp" placeholder="08x-xxx-xxx" required><br>

        <div class="btn-container">
            <button type="submit" name="submit">Simpan</button>
            <a href="pasien.php"class="btn btn-red">Batal</a>
        </div>
    </form>
</body>
</html>
