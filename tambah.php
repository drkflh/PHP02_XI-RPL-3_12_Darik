<?php
include 'koneksi.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Tambah Buku</title>
</head>

<body>
    <div class="p-3 mb-2 .bg-light">

        <div class="container">
            <nav class="navbar navbar-light" style="background-color: #ffffff;">
                <a class="navbar-brand">Tambah Buku</a>
            </nav>
            <form method="post" enctype="multipart/form-data">

                <div class="form-group"><label>Judul Buku</label>
                    <input type="text" class="form-control" name="judul">
                </div>

                <div class="form-group">
                    <label>Penulis</label>
                    <input type="text" class="form-control" name="penulis">
                </div>

                <div class="form-group">
                    <label>Jenis Buku</label>
                    <input type="text" class="form-control" name="jenis">
                </div>

                <div class="form-group">
                    <label>Gambar</label>
                    <input type="file" class="form-control" name="foto">
                </div>
                <button class="btn btn-outline-success" name="save">Submit</button>
                <a href="index.php" class="btn btn-outline-dark">Kembali</a>
            </form>
        </div>
    </div>
    <?php
    if (isset($_POST['save'])) {
        $img = $_FILES['foto']['name'];
        $lokasifile = $_FILES['foto']['tmp_name'];
        move_uploaded_file($lokasi, "fotobuku/" . $img);
        $koneksi->query("INSERT INTO tbl_buku
    (judul_buku,penulis,jenis_buku,gambar_buku) 
    VALUES('$_POST[judul]','$_POST[penulis]','$_POST[jenis]','$img')");
        echo "<script>alert('Buku Berhasil Ditambahkan')</script>";
        echo "<script>location='index.php'</script>";
    }
    ?>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>

</body>

</html>