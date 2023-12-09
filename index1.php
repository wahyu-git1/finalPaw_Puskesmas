<?php
require "navigasi.php";
require "koneksi.php";

$queryDokter=mysqli_query($koneksi,"SELECT COUNT(*) AS jmlDokter FROM dokter");

$queryPoli=mysqli_query($koneksi,"SELECT COUNT(*) AS jmlPoli FROM poliklinik");

$queryUser=mysqli_query($koneksi,"SELECT COUNT(*) AS jmlUser FROM User");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .data-container {
            background-color: #f2f2f2; /* Set your desired background color */
            padding: 10px;
            margin: 10px;
            border: 1px solid #ddd; /* Set your desired border color */
            border-radius: 8px; /* Set your desired border radius */
        }

        .data-title {
            color: #333; /* Set your desired text color */
        }

        .data-value {
            color: #555; /* Set your desired text color */
            font-size: 50px; /* Set your

}
    </style>
</head>
<body>
    <center><h1>selamat datang</h1></center>
    <center><h2>Trunojoyo university</h2></center>

    <br>
    <br>
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <!-- dokter -->
                <?php if ($queryDokter) {
                    $rowDokter = $queryDokter->fetch_assoc(); ?>
                    <div class="data-container">
                        <h3 class="data-title">Data Dokter</h3>
                        <div class="data-value"><?php echo $rowDokter['jmlDokter']; ?></div>
                    </div>
                <?php } ?>
            </div>
            <div class="col">
                <!-- poli -->
                <?php if ($queryPoli) {
                    $rowPoli = $queryPoli->fetch_assoc(); ?>
                    <div class="data-container">
                        <h3 class="data-title">Data Poli</h3>
                        <div class="data-value"><?php echo $rowPoli['jmlPoli']; ?></div>
                    </div>
                <?php } ?>
            </div>
            <div class="col">
                <!-- user -->
                <?php if ($queryUser) {
                    $rowUser = $queryUser->fetch_assoc(); ?>
                    <div class="data-container">
                        <h3 class="data-title">Data User</h3>
                        <div class="data-value"><?php echo $rowUser['jmlUser']; ?></div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>
