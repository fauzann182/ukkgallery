<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Album</title>
    <!-- Tautkan ke Bootstrap CSS -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tautkan ke Bootstrap JavaScript (opsional, jika Anda memerlukan fungsionalitas Bootstrap JS) -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-xl bg-navbar-theme border-bottom border-dark mb-5">
  <div class="container-fluid">
    <a class="navbar-brand" href="javascript:void(0)">Gallery</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-ex-2">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar-ex-2">
      <div class="navbar-nav me-auto">
        <a class="nav-item nav-link" href="index.php">Home</a>
        <a class="nav-item nav-link active" href="album.php">Album</a>
        <a class="nav-item nav-link" href="foto.php">Foto</a>
      </div>

      <span class="navbar-text">
        <a class="nav-item nav-link" href="logout.php">Logout</a>
      </span>
    </div>
  </div>
</nav>

    <div class="mx-5">
        <form action="tambah_album.php" method="post">
        <table>
            <tr>
                <td>
                    <div class="form-floating">
                    <input type="text" name="namaalbum" class="form-control" id="floatingInput" placeholder="John Doe" aria-describedby="floatingInputHelp" />
                    <label for="floatingInput">Nama Album</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-floating">
                    <input type="text" name="deskripsi" class="form-control" id="floatingInput" placeholder="John Doe" aria-describedby="floatingInputHelp" />
                    <label for="floatingInput">Deskripsi</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td><button class="btn btn-outline-primary" type="submit" id="button-addon1">Tambah</button></td>
            </tr>
        </table>
    </form>

    <div class="table-responsive">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Deskripsi</th>
        <th>Tanggal dibuat</th>
        <th>Aksi</th>
      </tr>
      <?php
            include "koneksi.php";
            $userid=$_SESSION['userid'];
            $sql=mysqli_query($conn,"select * from album where userid='$userid'");
            while($data=mysqli_fetch_array($sql)){
        ?>
    </thead>
    <tbody>
      <tr>
        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <span class="fw-medium"><?=$data['albumid']?></span></td>
        <td><?=$data['namaalbum']?></td>
        <td><?=$data['deskripsi']?></td>
        <td><?=$data['tanggaldibuat']?></td>
        <td>
            <a href="hapus_album.php?albumid=<?=$data['albumid']?>">Hapus</a>
            <a href="edit_album.php?albumid=<?=$data['albumid']?>">Edit</a>
        </td>
    </tr>
      <?php
            }
        ?>
    </tbody>
  </table>
</div>
    </div>
</body>
</html>