<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'function.php';
//cek sudah ditekan apa belum
if (isset($_POST["submit"])) {
    //cek apakah berhasil atau tidak
    if (create($_POST) > 0) {
        // echo "<script>alert('data berhasil ditambahkan'); document.location.href = 'index.php';</script>";
        ?>
        <div class="alert alert-success" role="alert">
            Data berhasil ditambahkan
        </div>
        <?php
        header("refresh:3;url=index.php");
    } else {
        // echo "<script>alert('data gagal ditambahkan'); document.location.href = 'index.php';</script>";
        ?>
        <div class="alert alert-danger" role="alert">
            Data gagal ditambahkan
        </div>
        <?php
        header("refresh:3;url=index.php");
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <style>
        .mx-auto {
            width: 500px
        }

        .card {
            margin-top: 10px
        }
    </style>
</head>

<body>
    <div class="mx-auto">
        <div class="card">
            <div class="card-header text-white bg-primary">
                Tambah Data Mahasiswa
            </div>

            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Mahasiswa</label>
                        <input type="text" class="form-control" name="nama" id="nama" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="nim" class="form-label">Nomor Induk Mahasiswa</label>
                        <input type="text" class="form-control" name="nim" id="nim" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat Mahasiswa</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" required autocomplete="off">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>