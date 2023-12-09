
<?php
$koneksi=mysqli_connect("localhost","root","","puskesmas");
//(DONE) 1. pertama membuat data master tgl berapa sampai tgl berapa
//2. membuat berdasarkan poli yang dipilih akan muncul data rekam medis dan tanggalnya



if (isset($_GET['submit'])) {
    $start_date = $_GET['start_date'];
    $end_date = $_GET['end_date'];
    $query=mysqli_query($koneksi,"SELECT *
    FROM rekammedis
    INNER JOIN dokter ON dokter.id_dokter = rekammedis.id_dokter
    INNER JOIN poliklinik ON poliklinik.id_poli = rekammedis.id_poli
    INNER JOIN pasien ON pasien.id_pasien = rekammedis.id_pasien
    WHERE rekammedis.tgl_periksa BETWEEN '$start_date' AND '$end_date'");

}


?>

<html>
    <head>
    <link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.css">


    </head>
<body>
<?php include "berandaLaporan.php";?>
   <br>
        <!-- Rentan waktu -->
        <form action="" method="get" class="row g-3" >
        <div class="col-auto">
            <input type="date" class="form-control" name="start_date" value="<?= $start_date ?>">
        </div>
        <div class="col-auto">
            <input type="date" class="form-control" name="end_date" value="<?= $end_date ?>">
        </div>
        <div class="col-auto">
            <input type="submit" class="btn btn-primary mb-3" name="submit" value="tampilkan">
        </div>
        </form>
            <!-- cetak -->
        
            <button class="btn btn-success" onclick="window.print()">cetak</button>
        <!-- print -->
        <a class="" href="cetakTanggal.php?start_date=<?= $start_date ?>&end_date=<?= $end_date ?>"><button class="btn btn-success" >excel</button></a>
        <!-- kembali -->
        <a class="" href="berandaLaporan.php"><button class="btn btn-success" >Kembali</button></a>
  


        <center>
        <div class="table">
        <table class="table table-bordered" >
        <tr>
           <th>No</th>
           <th>Nama Pasien</th>
           <th>keluhan</th>
           <th>Nama Dokter</th>
           <th>Diagnosa</th>
           <th>Nama Poli</th>
       </tr>
       <?php
                $nomor = 1;
                if (isset($query) && mysqli_num_rows($query) > 0){ 
                    while ($row=mysqli_fetch_assoc($query) ){
                      ?>
                <tr>
                <td><?= $nomor ?></td>
                <td><?= $row['nama_pasien'];?></td>
                <td><?= $row['keluhan'];?></td>
                <td><?= $row['nama_dokter'];?></td>
                <td><?= $row['diagnosa'];?></td>
                <td><?= $row['nama_poli'];?></td>
                </tr>

                <?php 
                
                    $nomor++;
                    }
                }else{
                    echo "<tr><td colspan='6'>Data tidak ada di database</td></tr>";
                }
            ;?>
    
   </table>
</div>
</center>         

</body>
</html>