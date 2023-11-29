<?php
$koneksi = mysqli_connect("localhost", "root", "", "puskesmas");
$query = "SELECT * FROM obat";
$hasil = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Obat</title>
</head>
<body>
<?php include "componen/navigasi.php";?>

    <div class="">
        <h1>Data Obat</h1>
        <hr>
        <br>
        <a href="create.php"><button class="btn btn-update">Tambah</button></a>
        <br>
        <br>
        
        <table>
            <tr>
                <th>No</th>
                <th>Kode Obat</th>
                <th>Nama Obat</th>
                <th>Keterangan</th>
                <th>Tindakan</th>
            </tr>
            <?php
            $rowNum = 1;
            while($row = mysqli_fetch_assoc($hasil)) {
            ?>
            <tr>
                <td><?= $rowNum ?></td>
                <td><?= $row['id_obat'] ?></td>
                <td><?= $row['nama_obat'] ?></td>
                <td><?= $row['keterangan'] ?></td>
                <td>
                    <a href="update.php?id=<?= $row['id_obat']; ?>"><button class="btn btn-edit">Edit</button></a>
                    <a href="javascript:void(id=<?=$row['id_obat'];?>);" onclick="hapus(<?= $row['id_obat']; ?>)"><button class="btn btn-delete">Hapus</button></a>
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
