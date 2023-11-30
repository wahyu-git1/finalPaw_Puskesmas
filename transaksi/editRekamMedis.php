<?php
require "koneksi.php";

if (isset($_POST['submit'])) {
    $id_rm = $_POST['id_rm'];
    $id_pasien = $_POST['id_pasien'];
    $keluhan = $_POST['keluhan'];
    $id_dokter = $_POST['id_dokter'];
    $diagnosa = $_POST['diagnosa'];
    $id_poli = $_POST['id_poli'];
    $waktu = $_POST['waktu'];

    $sql = "UPDATE rekammedis SET 
            id_pasien = '$id_pasien',
            keluhan = '$keluhan',
            id_dokter = '$id_dokter',
            diagnosa = '$diagnosa',
            id_poli = '$id_poli',
            tgl_periksa = '$waktu'
            WHERE id_rm = $id_rm";

    // Execute the query
    $result = mysqli_query($koneksi, $sql);
    if ($result) {
        header("Location: berandaTransaksi.php");
        exit;
    } else {
        echo "Data gagal diubah: " . mysqli_error($koneksi);
    }
}

$id_rm = $_GET['id_rm'];
$query = "SELECT * FROM rekammedis WHERE id_rm = $id_rm";
$hasil = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($hasil);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Transaksi</title>
    <style>
        
        .centered {
            text-align: center;
            color: blue;
        }

        form {
            width: 400px;
            margin: 0 auto;
            text-align: left;
        }

        label {
            
            display: block;
            float: left;
            margin-right: 5px;
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            width: 70%;
            padding: 8px;
            margin-left: 40px; 
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            
            color: white;
            cursor: pointer;
            margin-right: 10px;
        }

        .green-button {
            background-color: green;
        }

        .red-button {
            background-color: red;
        }
    </style>
</head>
<body>
    <h1 class="centered">Update Data Rekam Medis</h1>
    <form action="" method="POST">
        <input type="hidden" name="id_rm" value="<?= $id_rm ?>">

        <label for="pasien">Id Pasien   :</label>
        <select name="id_pasien" id="pasien">
            <?php
            $querypasien = "SELECT id_pasien, nama_pasien FROM pasien";
            $resultpasien = mysqli_query($koneksi, $querypasien);

            while ($pasien = mysqli_fetch_assoc($resultpasien)) {
                $selected = ($pasien['id_pasien'] == $row['id_pasien']) ? "selected" : "";
                echo "<option value='" . $pasien['id_pasien'] . "' $selected>"
                    . $pasien['nama_pasien']
                    . "</option>";
            }
            ?>
        </select>
        <br><br>

        <label for="keluhan">Keluhan :</label>
        <input type="text" id="keluhan" name="keluhan" value="<?= $row['keluhan'] ?>">
        <br><br>

        <label for="dokter">Id Dokter   :</label>
        <select name="id_dokter" id="dokter">
            <?php
            $querydokter = "SELECT id_dokter, nama_dokter FROM dokter";
            $resultdokter = mysqli_query($koneksi, $querydokter);

            while ($dokter = mysqli_fetch_assoc($resultdokter)) {
                $selected = ($dokter['id_dokter'] == $row['id_dokter']) ? "selected" : "";
                echo "<option value='" . $dokter['id_dokter'] . "' $selected>"
                    . $dokter['nama_dokter']
                    . "</option>";
            }
            ?>
        </select>
        <br><br>

        <label for="diagnosa">Diagnosa:</label>
        <textarea id="diagnosa" name="diagnosa"><?= $row['diagnosa'] ?></textarea>
        <br><br>

        <label for="poli">Id Poli   :</label>
        <select name="id_poli" id="poli">
            <?php
            $querypoli = "SELECT id_poli, nama_poli FROM poliklinik";
            $resultpoli = mysqli_query($koneksi, $querypoli);

            while ($poli = mysqli_fetch_assoc($resultpoli)) {
                $selected = ($poli['id_poli'] == $row['id_poli']) ? "selected" : "";
                echo "<option value='" . $poli['id_poli'] . "' $selected>"
                    . $poli['nama_poli']
                    . "</option>";
            }
            ?>
        </select>
        <br><br>

        <label for="waktu">Waktu Transaksi:</label>
        <input type="date" id="waktu" name="waktu" value="<?= $row['tgl_periksa'] ?>">
        <br><br>

        <button class="green-button" type="submit" name="submit">Simpan</button>
        <button class="red-button" type="reset">Reset</button>
    </form>
</body>
</html>
