<?php
$koneksi = mysqli_connect("localhost", "root", "", "puskesmas");

$queryPS = mysqli_query($koneksi, "SELECT * FROM tb_pasien");
$s_pasien = [];
while ($data = mysqli_fetch_array($queryPS)) {
    $s_pasien[] = $data;
}

$queryDO = mysqli_query($koneksi, "SELECT * FROM tb_dokter");
$s_dokter = [];
while ($data = mysqli_fetch_array($queryDO)) {
    $s_dokter[] = $data;
}

$queryPL = mysqli_query($koneksi, "SELECT * FROM tb_poliklinik");
$s_poli = [];
while ($data = mysqli_fetch_array($queryPL)) {
    $s_poli[] = $data;
}

if (isset($_POST["simpan"])) {
    $id_rm = $_POST["id_rm"];
    $id_pasien = $_POST["id_pasien"];
    $keluhan = $_POST["keluhan"];
    $id_dokter = $_POST["id_dokter"];
    $diagnosa = $_POST["diagnosa"];
    $id_poli = $_POST["id_poli"];
    $tgl_periksa = $_POST["tgl_periksa"];

    $query = "INSERT INTO tb_rekammedis (id_rm, id_pasien, keluhan, id_dokter, diagnosa, id_poli, tgl_periksa) 
              VALUES ('$id_rm', '$id_pasien', '$keluhan', '$id_dokter', '$diagnosa', '$id_poli', '$tgl_periksa')";
    $simpan = mysqli_query($koneksi, $query);

    if ($simpan) {
        header('location: read.php');
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        label {
            margin-right: 10px;
        }
    </style>
</head>
<body class="mx-auto" style="width: 500px;">
    <form action="create.php" method='POST'>
        <h2>Tambahkan Data Baru</h2>
        <div class="row mb-3">
            <label for="id_rm" class="col-sm-2 col-form-label">ID Rekam Medis</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="id_rm" id="id_rm">
            </div>
        </div>
        <div class="row mb-3">
            <label for="id_pasien" class="col-sm-2 col-form-label">Pasien</label>
            <div class="col-sm-10">
                <select name="id_pasien" id="id_pasien" class="form-select" aria-label="Default select example">
                    <option selected>Pilih Pasien</option>
                    <?php foreach ($s_pasien as $tb_pasien): ?>
                        <option value="<?= $tb_pasien['id_pasien'] ?>"><?= $tb_pasien['nama_pasien'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="keluhan" class="col-sm-2 col-form-label">Keluhan</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="keluhan" id="keluhan" rows="2"></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label for="id_dokter" class="col-sm-2 col-form-label">Dokter</label>
            <div class="col-sm-10">
                <select name="id_dokter" id="id_dokter" class="form-select" aria-label="Default select example">
                    <option selected>Pilih Dokter</option>
                    <?php foreach ($s_dokter as $tb_dokter): ?>
                        <option value="<?= $tb_dokter['id_dokter'] ?>"><?= $tb_dokter['nama_dokter'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="diagnosa" class="col-sm-2 col-form-label">Diagnosa</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="diagnosa" id="diagnosa" rows="2"></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label for="id_poli" class="col-sm-2 col-form-label">Poli</label>
            <div class="col-sm-10">
                <select name="id_poli" id="id_poli" class="form-select" aria-label="Default select example">
                    <option selected>Pilih Poli</option>
                    <?php foreach ($s_poli as $tb_poliklinik): ?>
                        <option value="<?= $tb_poliklinik['id_poli'] ?>"><?= $tb_poliklinik['nama_poli'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="tgl_periksa" class="col-sm-2 col-form-label">Tanggal Periksa</label>
            <div class="col-sm-10">
                <input type="date" name="tgl_periksa" class="form-control" id="tgl_periksa" aria-label="Default select example">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <input type='submit' name='simpan' value='Simpan' class="btn btn-primary">
                <input type='reset' name='reset' value='Reset' class="btn btn-secondary">
                <a href="read.php" class="btn btn-danger">Batal</a>
            </div>
        </div>
    </form>
</body>
</html>
