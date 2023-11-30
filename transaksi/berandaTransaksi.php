<?php
require "koneksi.php";
$query = "SELECT * FROM rekammedis";
$hasil = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Master Supplier</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background: rgb(194, 220, 250);
            color: black;
        }

        .table-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: rgb(54, 138, 233);
        }

        .table-title {
            flex: 1; /* Membuat judul mengambil sisa ruang sebelah kiri */
        }

        .add-button {
            background-color: greenyellow;
            color: white;
            padding: 8px 16px;
            text-decoration: none;
            border: none;
            border-radius: 4px;
        }

        .edit {
            background-color: orange;
            color: white;
            padding: 8px 10px;
            text-decoration: none;
            border: none;
            border-radius: 4px;
        }

        .delete {
            background-color: red;
            color: white;
            padding: 8px 10px;
            text-decoration: none;
            border: none;
            border-radius: 4px;
        }
    </style>
</head>
<body>
<?php include "componen/navigasi.php";?>
    <div class="table-container">
        <h3 class="table-title"><b> Detail Rekam Medis </b></h3>
        
        <a class="add-button" href="tambahRekamMedis.php"> Tambah Rekam Medis</a>
    </div>
    <div class="table">
        <table class="table table-bordered">
            <thead class="table-dark">
            <tr>
                <th>id</th>
                <th>id Pasien</th>
                <th>Keluhan</th>
                <th>id Dokter</th>
                <th>Diagnosa</th>
                <th>id Poli</th>
                <th>tanggal periksa</th>
                <th>Tindakan</th>
            </tr>
            </thead>
            <!-- Isi tabel akan ditambahkan di sini -->
            <?php
            while ($row = mysqli_fetch_assoc($hasil)) {
                ?>
                <tbody>
                <tr>
                    <td><?= $row['id_rm'] ?></td>
                    <td><?= $row['id_pasien'] ?></td>
                    <td><?= $row['keluhan'] ?></td>
                    <td><?= $row['id_dokter'] ?></td>
                    <td><?= $row['diagnosa'] ?></td>
                    <td><?= $row['id_poli'] ?></td>
                    <td><?= $row['tgl_periksa'] ?></td>
                    <td>
                        <a class="delete" href="delete.php?id_hapus=<?= $row['id_rm']; ?>">Delete</a>
                        <a class="edit" href="editRekamMedis.php?id_rm=<?= $row['id_rm']; ?>">EDIT</a>
                    </td>
                </tr>
                </tbody>

                <?php
            }
            ?>
        </table>
    </div>
</body>
</html>
