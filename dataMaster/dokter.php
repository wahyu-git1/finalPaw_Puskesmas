<?php
$koneksi = mysqli_connect("localhost", "root", "", "puskesmas");
$query = "SELECT * FROM dokter";
$hasil = mysqli_query($koneksi, $query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
    <title>Data Dokter</title>
</head>
<body>
<?php include "componen/navigasi.php";?>
    <div class="">
        <h1>Data Dokter</h1>
        <hr>
        <br>
        <a href="create.php"><button class="btn btn-primary">Tambah</button></a>
        <br>
        <br>

        <center>
        <div class="table" >
        <table class="table table-bordered" >
            <tr>
                <th>No</th>
                <th>Kode Dokter</th>
                <th>Nama Dokter</th>
                <th>Spesialis</th>
                <th>Alamat</th>
                <th>No Telepon</th>
                <th>Tindakan</th>
            </tr>
            <?php
            $rowNum = 1;
            while($row = mysqli_fetch_assoc($hasil)) {
            ?>
            <tr>
                <td><?= $rowNum ?></td>
                <td><?= $row['id_dokter'] ?></td>
                <td><?= $row['nama_dokter'] ?></td>
                <td><?= $row['spesialis'] ?></td>
                <td><?= $row['alamat'] ?></td>
                <td><?= $row['no_telp'] ?></td>
                <td>
                    <a href="update.php?id=<?= $row['id_dokter']; ?>"><button class="btn btn-outline-warning">Edit</button></a>
                    <a href="javascript:void(id=<?=$row['id_dokter'];?>);" onclick="hapus(<?= $row['id_dokter']; ?>)"><button class="btn btn-outline-danger">Hapus</button></a>
                </td>
            </tr>
            <?php $rowNum++ ; } ?>
        </table>
        </div>
        </center>
    </div>

    <script>
        function hapus(id) {
            if (confirm("Anda yakin akan menghapus supplier ini?")) {
                window.location = "hapus.php?id=" + id;
            }
        }
    </script>
</body>
</html>
