<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}


require 'function.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

//tombol cari di klik
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
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
            width: 800px
        }

        .card {
            margin-top: 10px
        }

        .button {
            margin-top: 10px;
            margin-left: -10px
        }

        .search {
            margin-top: 10px;
            margin-right: -10px
        }
    </style>
</head>

<body>
    <div class="mx-auto">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <div class="button">
                    <a class="btn btn-primary" href="tambah.php" role="button">Tambah Data Mahasiswa</a>
                </div>
                <div class="search">
                    <form action="" method="post" class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                            name="keyword" autofocus autocomplete="off">
                        <button class="btn btn-outline-primary" type="submit" name="cari">Search</button>
                    </form>
                </div>

            </div>
        </nav>
        <div class="card">
            <h5 class="card-header text-white bg-primary">Daftar Mahasiswa</h5>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($mahasiswa as $row): ?>
                            <tr>
                                <td>
                                    <?= $i; ?>

                                </td>
                                <td>
                                    <?= $row["nama"]; ?>
                                </td>
                                <td>
                                    <?= $row["nim"]; ?>
                                </td>
                                <td>
                                    <?= $row["alamat"]; ?>
                                </td>
                                <td>
                                    <a href="update.php?id=<?= $row["id"]; ?>">
                                        <button type="button" class="btn btn-success">Update</button>
                                    </a>
                                    <a href="delete.php?id=<?= $row["id"]; ?>"
                                        onclick="return confirm('Apakah anda yakin ingin menghapus data?')">
                                        <button type="button" class="btn btn-danger">Delete</button>
                                    </a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a class="btn btn-danger" href="logout.php" role="button">Logout</a>
            </div>

        </div>
    </div>
</body>

</html>