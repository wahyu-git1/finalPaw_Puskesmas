<?php
require "koneksi.php";



//ambbil data dari query detail  transaksi
$id_rm=$_GET['id_hapus'];
$cek=mysqli_query($koneksi,"DELETE FROM rekammedis WHERE id_rm=$id_rm");
if ($cek){
    echo "data berhasil dihapus";
    header("Location: berandaTransaksi.php");

}
else{
    echo "data gagal dihapus";
}


?>
