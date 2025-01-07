<?php
    require_once 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BNSP | Beasiswa</title>

    <!-- bootstrap -->
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
                        <a class="nav-link" aria-current="page" href="jenis-beasiswa.php">Pilihan beasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Daftar beasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="hasil.php">Hasil beasiswa</a>
                    </li>
                </ul>
            </div>
    </div>
</nav>

    <!-- form -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <h5 class="card-header fs-2 p-4 text-center bg-dark text-light">Pendaftaran beasiswa</h5>
                    <div class="card-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label fw-semibold">Nama lengkap</label>
                                <input type="text" class="form-control" id="nama" aria-describedby="emailHelp" placeholder="Masukkan nama lengkap" name="nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label" fw-semibold>Email</label>
                                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Masukkan email anda" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label fw-semibold">No HP</label>
                                <input type="number" class="form-control" id="nohp" aria-describedby="emailHelp" placeholder="Masukkan nomor HP anda" name="nohp" required>
                            </div>
                            <div class="mb-3">
                                <label for="semester" class="form-label fw-semibold">Semester saat ini</label>
                                <select class="form-select" aria-label="Default select example" name="semester" id="semester">
                                    <!-- looping -->
                                    <option selected>-- Pilih semester --</option>
                                    <?php for ($i = 1; $i <= 8; $i++) : ?>
                                        <option value="<?= $i; ?>"><?= $i; ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label fw-semibold">IPK terakhir</label>
                                <input type="text" class="form-control" id="ipk" aria-describedby="emailHelp" name="ipk" readonly>
                                <small id="keterangan"></small>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_beasiswa" class="form-label fw-semibold">Pilihan beasiswa</label>
                                <select class="form-select" aria-label="Default select example" name="jenis_beasiswa" id="jenis_beasiswa">
                                    <option selected>-- Pilihan beasiswa --</option>
                                    <!-- ambil dari db -->
                                     <?php
                                        $sql = "SELECT * FROM tbl_beasiswa";
                                        // eksekusi
                                        $result = mysqli_query($connect, $sql);
                                        //cara 1
                                        // while ($data = mysqli_fetch_array($result)) {
                                        //     echo "<option value='" . $data['id'] . "'>" . $data['jenis_beasiswa'] . "</option>";
                                        // }

                                        //cara 2
                                        foreach ($result as $data) {
                                            echo "<option value='" . $data['id'] . "'>" . $data['jenis_beasiswa'] . "</option>";
                                        }
                                     ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label fw-semibold">Upload berkas syarat</label>
                                <input type="file" class="form-control" id="filename" aria-describedby="emailHelp" placeholder="Masukkan berkas anda" name="filename" required>
                            </div>
                            <button type="submit" class="btn btn-dark" id="submit" name="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- kirim data -->
     <?php
        if (isset($_POST['submit'])) {
            //ambil data dari form
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $nohp = $_POST['nohp'];
            $semester = $_POST['semester'];
            $ipk = $_POST['ipk'];
            $jenis_beasiswa = $_POST['jenis_beasiswa'];

            //ambil data file
            $filename = $_FILES['filename']['name'];
            $tmp_name = $_FILES['filename']['tmp_name'];
            $status = "Belum terverifikasi";
            $folder = "../image" . $filename;
            move_uploaded_file($tmp_name, $folder);

            //insert data ke db
            $sql = "INSERT INTO tbl_daftar (nama, email, hp, semester, ipk, id, status_pengajuan, filename) VALUES ('$nama', '$email', '$nohp', '$semester', '$ipk', '$jenis_beasiswa', '$status', '$filename')";

            if($connect->query($sql)){
                echo "<script>alert('Sukses'); window.location.href = 'hasil.php';</script>";
            }
        }
     ?>

    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        //DOM : memungkinkan JS untuk berinteraksi dengan elemen - elemen pada halaman web. Such as : Membaca, memanipulasi / mengubah content, attribute / struktur dokumen untuk berinteraksi dengan DOM, pakai perintah document

        //DOM : Document Object Model

        //Event listener : mekanisme untuk "mendengarkan" suatu peristiwa (event) yang terjadi pada elemen HTML, seperti click tombol, gerakan mouse, penekanan tombol keyboard.

        //addEventListener : dapat menambahkan logika yang akan dijalankan berdasarkan interaksi user
        function ipk(){
            return Math.random() * 2 + 2;
        }
        
        //Jika menambahkan event listener untuk DOMContentLoaded, script akan langsung di excecute segera setelah struktur HTML halaman sepenuhnya di load, bahkan sebelum gambar / elemen media lainnya di load.
        document.addEventListener("DOMContentLoaded", function(){
            const ipkPengguna = ipk();
            const ipkField = document.getElementById("ipk");
            ipkField.value = ipkPengguna.toFixed(2);

            const beasiswa = document.getElementById("jenis_beasiswa");
            const submit = document.getElementById("submit");
            const upload = document.getElementById("filename");

            if (ipkPengguna < 3.00) {
                beasiswa.disabled = true;
                submit.disabled = true;
                upload.disabled = true;

                const warna = document.getElementById("keterangan");
                warna.style.color = "red";

                var keterangan = "IPK anda tidak memenuhi syarat";
                document.getElementById("keterangan").innerHTML = keterangan;
            } else {
                beasiswa.disabled = false;
                submit.disabled = false;
                upload.disabled = false;

                const warna2 = document.getElementById("keterangan");
                warna2.style.color = "green";

                var keterangan2 = "Selamat IPK anda memenuhi syarat dan bisa melanjutkan ke tahap berikutnya";
                document.getElementById("keterangan").innerHTML = keterangan2;
            }
        });
    </script>
  </body>
</html>
