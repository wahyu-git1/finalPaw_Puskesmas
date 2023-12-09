<?php 
$koneksi = mysqli_connect("localhost","root","","puskesmas");

$id_dokter = $_GET['id'];

$query = "DELETE FROM dokter WHERE id_dokter = '$id_dokter'";
$hasil = mysqli_query($koneksi,$query);

if ($hasil){
    header("Location: dokter.php");
}else{
    echo "data gagal dihapus";
}
?>