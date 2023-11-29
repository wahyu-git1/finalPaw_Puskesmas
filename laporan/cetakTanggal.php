
<?php
$koneksi=mysqli_connect("localhost","root","","puskesmas");
//(DONE) 1. pertama membuat data master tgl berapa sampai tgl berapa
//2. membuat berdasarkan poli yang dipilih akan muncul data rekam medis dan tanggalnya

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan_rekammedis.xls");

    $start_date = $_GET['start_date'];
    $end_date = $_GET['end_date'];
    $query=mysqli_query($koneksi,"SELECT *
    FROM rekammedis
    INNER JOIN dokter ON dokter.id_dokter = rekammedis.id_dokter
    INNER JOIN poliklinik ON poliklinik.id_poli = rekammedis.id_poli
    INNER JOIN pasien ON pasien.id_pasien = rekammedis.id_pasien
    WHERE rekammedis.tgl_periksa BETWEEN '$start_date' AND '$end_date'");


?>
<body>
   <br>
        <!-- Rentan waktu -->
        <h1>Laporan Rekam medis</h1>
        <p>tanggal =<?php echo "$start_date";?> sampai  </p>
        <p><?php echo "$end_date";?></p><br>

            <!-- cetak -->
        
   <table border="1" align="center" class="table table-success table-striped-columns">
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

         

</body>
</html>