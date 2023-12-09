<?php 
$koneksi = mysqli_connect("localhost","root","","puskesmas");

$id_poli = $_GET['id'];

$query = "DELETE FROM poliklinik WHERE id_poli = '$id_poli'";
$hasil = mysqli_query($koneksi,$query);

if ($hasil){
    header("Location: poli.php");
}else{
    echo "data gagal dihapus";
}
?>