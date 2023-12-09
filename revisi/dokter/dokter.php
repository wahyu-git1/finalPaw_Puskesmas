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
    <link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.css">
    <title>Data Dokter</title>
</head>
<body>
<?php include "../componen/navigasi.php";?>
    <div class="">
        <h1>Data Dokter</h1>
        <hr>
        <br>
        <a href="tambah.php"><button>Tambah</button></a>
        <br>
        <br>
        
        <table>
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
                    <a href="edit.php?id=<?= $row['id_dokter']; ?>"><button>Edit</button></a>
                    <a href="javascript:void(id=<?=$row['id_dokter'];?>);" onclick="confirmDelete('<?= $row['id_dokter']; ?>')"><button>Hapus</button></a>
                </td>
            </tr>
            <?php $rowNum++ ; } ?>
        </table>
    </div>

    <script>
        function confirmDelete(id) {
            var result = confirm("Apakah Anda yakin ingin menghapus data?");
            if (result) {
                window.location.href = "hapus.php?id=" + id;
            }
        }
    </script>
</body>
</html>
