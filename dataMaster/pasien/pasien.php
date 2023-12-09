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
    <link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.css">
    <title>Data Pasien</title>
</head>
<body>
<?php include "../componen/navigasi.php";?>

    <div class="">
        <h1>Data Pasien</h1>
        <hr>
        <br>
        <a href="tambah.php"><button>Tambah</button></a>
        <br>
        <br>
        
        <center>
        <div class="table">
        <table class="table table-bordered" >
            <tr>
                <th>No</th>
                <th>Kode Pasien</th>
                <th>Nomor Identitas Pasien</th>
                <th>Nama Pasien</th>
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
                <td><?= $row['nomor_identitas'] ?></td>
                <td><?= $row['nama_pasien'] ?></td>
                <td><?= $row['jenis_kelamin'] ?></td>
                <td><?= $row['alamat'] ?></td>
                <td><?= $row['no_telp'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id_pasien']; ?>"><button>Edit</button></a>
                    <a href="javascript:void(id=<?=$row['id_pasien'];?>);" onclick="confirmDelete('<?= $row['id_pasien']; ?>')"><button>Hapus</button></a>
                </td>
            </tr>
            <?php $rowNum++ ; } ?>
        </table>
        </div>
        </center>
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
