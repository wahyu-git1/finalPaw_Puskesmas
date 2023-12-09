<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body class="p-3 m-0 border-0 bd-example m-0 border-0">

    <!-- Example Code -->
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="../index1.php">Dashboard</a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="true">
                Data Master
              </button>
              <ul class="dropdown-menu dropdown-menu-dark " data-bs-popper="static">
                <li><a class="dropdown-item" href="dataMaster/dokter/dokter.php">Data Dokter</a></li>
                <li><a class="dropdown-item" href="dataMaster/obat/obat.php">Data Obat</a></li>
                <li><a class="dropdown-item" href="dataMaster/pasien/pasien.php">Data Pasien</a></li>
                <li><a class="dropdown-item" href="dataMaster/poli/poli.php">Data Poli</a></li>
              </ul>
            </li>
            <li class="navbar-nav">
                <a class="nav-link" href="transaksi/berandaTransaksi.php">Rekam Medis</a>
            </li>
            <li class="navbar-nav">
                <a class="nav-link" href="laporan/berandaLaporan.php">Laporan</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    <!-- End Example Code -->
  </body>
</html>