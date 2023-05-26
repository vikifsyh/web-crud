<?php
//koneksi
$conn = mysqli_connect("localhost", "root", "", "akademik");
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function create($data)
{
    global $conn;
    $nama = htmlspecialchars($data['nama']);
    $nim = htmlspecialchars($data['nim']);
    $alamat = htmlspecialchars($data['alamat']);

    $query = "INSERT INTO mahasiswa(nama,nim,alamat) VALUES ('$nama', '$nim', '$alamat')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function delete($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function update($data)
{
    global $conn;
    $id = $data["id"];
    $nama = htmlspecialchars($data['nama']);
    $nim = htmlspecialchars($data['nim']);
    $alamat = htmlspecialchars($data['alamat']);

    $query = "UPDATE mahasiswa SET nama = '$nama', nim = '$nim', alamat = '$alamat' WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%' OR nim LIKE '%$keyword%' OR alamat LIKE '%$keyword%'";
    return query($query);
}

function registrasi($data)
{
    global $conn;
    $username = strtolower(stripcslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('username sudah terdaftar')</script>";
        return false;
    }

    //cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>alert('konfirmasi password tidak sesuai');</script>";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO user(username,password) VALUES('$username', '$password')");

    return mysqli_affected_rows($conn);
}
?>