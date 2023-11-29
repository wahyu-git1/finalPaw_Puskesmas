
<?php
$koneksi=mysqli_connect("localhost","root","","puskesmas");
//(DONE) 1. pertama membuat data master tgl berapa sampai tgl berapa
//2. membuat berdasarkan poli yang dipilih akan muncul data rekam medis dan tanggalnya


header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan_rekammedis.xls");

        $poli=$_GET['dataPoli'];
        $queryPoli=mysqli_query($koneksi,"SELECT * FROM rekammedis 
        INNER JOIN dokter ON dokter.id_dokter=rekammedis.id_dokter 
        INNER JOIN poliklinik ON poliklinik.id_poli=rekammedis.id_poli
        INNER JOIN pasien on pasien.id_pasien=rekammedis.id_pasien 
        WHERE poliklinik.id_poli='$poli'");

            $tampilNama=mysqli_query($koneksi,"SELECT nama_poli FROM poliklinik WHERE poliklinik.id_poli='$poli'");
            $rowNama = mysqli_fetch_assoc($tampilNama);?>
<body>

<center>   Data laporan poli</center>
<center> <?php echo strtoupper($rowNama['nama_poli']) ;?></center>

<br><br>
   
   <table border="1" align="center" class="table table-success table-striped-columns">
       <tr>
           <th>No</th>
           <th>Nama Pasien</th>
           <th>keluhan</th>
           <th>Nama Dokter</th>
           <th>Diagnosa</th>
           <th>Tanggal Periksa</th>
       </tr>
       <?php
                $nomorPoli = 1;
                if (isset($queryPoli) && mysqli_num_rows($queryPoli) > 0){
                    while ($rowPoli=mysqli_fetch_assoc($queryPoli) ){
                      ?>
                
                <tr>
                <td><?= $nomorPoli ?></td>
                <td><?= $rowPoli['nama_pasien'];?></td>
                <td><?= $rowPoli['keluhan'];?></td>
                <td><?= $rowPoli['nama_dokter'];?></td>
                <td><?= $rowPoli['diagnosa'];?></td>
                <td><?= $rowPoli['tgl_periksa'];?></td>
                </tr>

                <?php 
                
                    $nomorPoli++;
                    }
                }else{
                    echo "<tr><td colspan='6'>Data tidak ada di database</td></tr>";
                };?>
    
   </table>

</body>
</html>