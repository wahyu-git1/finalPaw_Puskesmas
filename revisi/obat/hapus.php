<?php 
$koneksi = mysqli_connect("localhost","root","","puskesmas");

$id_obat = $_GET['id'];

$query = "DELETE FROM obat WHERE id_obat = '$id_obat'";
$hasil = mysqli_query($koneksi,$query);

if ($hasil){
    header("Location: obat.php");
}else{
    echo "data gagal dihapus";
}
?>