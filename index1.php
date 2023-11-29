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
</head>
<body>
<center><h1>selamat datang</h1></center>
<center><h2>Trunojoyo university</h2></center>
<!-- dokter -->
    <?php 
    if ($queryDokter) {
    // Mengambil hasil
    $rowDokter = $queryDokter->fetch_assoc();?>
        <h1>data dokter adalah <?php echo $rowDokter['jmlDokter'];?></h1>
<?php }?>

<!-- poli -->
<?php 
    if ($queryPoli) {
    // Mengambil hasil
    $rowPoli = $queryPoli->fetch_assoc();?>
        <h1>data Poli adalah <?php echo $rowPoli['jmlPoli'];?></h1>
<?php }?>

<!-- user -->
<?php 
    if ($queryUser) {
    // Mengambil hasil
    $rowUser = $queryUser->fetch_assoc();?>
        <h1>data User adalah <?php echo $rowUser['jmlUser'];?></h1>
<?php }?>


</body>
</html>