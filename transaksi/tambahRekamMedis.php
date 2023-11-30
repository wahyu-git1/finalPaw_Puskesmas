<?php
require "koneksi.php";

if (isset($_POST['submit'])){
    $id_pasien=$_POST['id_pasien'];
    $keluhan=$_POST['keluhan'];
    $id_dokter=$_POST['id_dokter'];
    $diagnosa=$_POST['diagnosa'];
    $id_poli=$_POST['id_poli'];
    $waktu=$_POST['waktu'];
 $sql="INSERT INTO rekammedis VALUES (Null,'$id_pasien','$keluhan','$id_dokter','$diagnosa','$id_poli','$waktu')";

 $hasil=mysqli_query($koneksi,$sql);
 if ($hasil){
    header("Location: berandaTransaksi.php");
    echo "berhasil";
    
 }else
 {
    echo "data gagal ditambahkan";
 }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">

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
<h1 class="centered">Tambah Data RekamMedis</h1>
    <form action="" method="POST">
        
    <label for="pasien">Id Pasien   :</label>
    <select name="id_pasien" id="pasien">
    <?php
    $querypasien = "SELECT id_pasien, nama_pasien FROM pasien";
    $resultpasien = mysqli_query($koneksi, $querypasien);

    while ($row = mysqli_fetch_assoc($resultpasien)) {
        echo "<option value='" . $row['id_pasien'] . "'>"
         . $row['nama_pasien']
         . "</option>";
    }
    ?>
    </select>
    <br>
    <br>

    <label for="keluhan">keluhan </label>
    <input type="text" id="keluhan" name="keluhan">
    <br>
    <br>

    <label for="dokter">Id dokter   :</label>
    <select name="id_dokter" id="dokter">
    <?php
    $querydokter = "SELECT id_dokter, nama_dokter FROM dokter";
    $resultdokter = mysqli_query($koneksi, $querydokter);

    while ($row = mysqli_fetch_assoc($resultdokter)) {
        echo "<option value='" . $row['id_dokter'] . "'>"
         . $row['nama_dokter']
         . "</option>";
    }
    ?>
    </select>
    <br>
    <br>
    <label for="diagnosa">diagnosa:</label>
    <textarea id="diagnosa" name="diagnosa"></textarea><br>
    <br>
    <br>

    <label for="poli">Id poli   :</label>
    <select name="id_poli" id="poli">
    <?php
    $querypoli = "SELECT id_poli, nama_poli FROM poliklinik";
    $resultpoli = mysqli_query($koneksi, $querypoli);

    while ($row = mysqli_fetch_assoc($resultpoli)) {
        echo "<option value='" . $row['id_poli'] . "'>"
         . $row['nama_poli']
         . "</option>";
    }
    ?>
    </select>
    <br>
    <br>

    <label for="waktu">Waktu Transaksi    :</label>
    <input type="date" id="waktu" name="waktu"><br>
    <br>
    <br>

        <button class="green-button" type="submit" name="submit">Simpan</button>
        <button class="red-button" type="reset">Reset</button>
    </form>
</body>
</html>
