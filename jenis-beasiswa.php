<?php
    include 'koneksi.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BNSP | Jenis beasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <!-- navbar -->
  <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container">
                <a class="navbar-brand fw-semibold" href="#">SMK PESAT</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse mt-1" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="jenis-beasiswa.php">Pilihan beasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Daftar beasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="hasil.php">Hasil beasiswa</a>
                    </li>
                </ul>
            </div>
    </div>
</nav>

<!-- main content -->
<div class="container mt-5">
    <h1 class="mb-4">Jenis beasiswa</h1>
    <div class="d-flex flex-wrap gap-3">
        <?php
        $sql = "SELECT * FROM tbl_beasiswa";
        $result = mysqli_query($connect, $sql);
        while ($data = mysqli_fetch_array($result)) {
        ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= $data['jenis_beasiswa']; ?></h5>
                    <p class="card-text"><?= $data['keterangan']; ?></p>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>