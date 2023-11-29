<?php
$koneksi = mysqli_connect("localhost", "root", "", "puskesmas");
$query = "SELECT * FROM pasien";
$hasil = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pasien</title>
</head>
<body>
<?php include "componen/navigasi.php";?>

    <div class="">
        <h1>Data Pasien</h1>
        <hr>
        <br>
        <a href="create.php"><button class="btn btn-update">Tambah</button></a>
        <br>
        <br>
        
        <table>
            <tr>
                <th>No</th>
                <th>Kode pasien</th>
                <th>Nama pasien</th>
                <th>Jenis Kelamin</th>
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
                <td><?= $row['id_pasien'] ?></td>
                <td><?= $row['nama_pasien'] ?></td>
                <td><?= $row['jenis_kelamin'] ?></td>
                <td><?= $row['alamat'] ?></td>
                <td><?= $row['no_telp'] ?></td>
                <td>
                    <a href="update.php?id=<?= $row['id_pasien']; ?>"><button class="btn btn-edit">Edit</button></a>
                    <a href="javascript:void(id=<?=$row['id_pasien'];?>);" onclick="hapus(<?= $row['id_pasien']; ?>)"><button class="btn btn-delete">Hapus</button></a>
                </td>
            </tr>
            <?php $rowNum++ ; } ?>
        </table>
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
