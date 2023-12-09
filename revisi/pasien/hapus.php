<?php 
$koneksi = mysqli_connect("localhost","root","","puskesmas");

$id_pasien = $_GET['id'];

$query = "DELETE FROM pasien WHERE id_pasien = '$id_pasien'";
$hasil = mysqli_query($koneksi,$query);

if ($hasil){
    header("Location: pasien.php");
}else{
    echo "data gagal dihapus";
}
?>