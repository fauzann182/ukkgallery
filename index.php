<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Landing</title>
    <!-- Tautkan ke Bootstrap CSS -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tautkan ke Bootstrap JavaScript (opsional, jika Anda memerlukan fungsionalitas Bootstrap JS) -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

</head>
<body>
    <?php
        session_start();
        if(!isset($_SESSION['userid'])){
    ?>
            <ul>
                <li><a href="register.php">Register</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
    <?php
        }else{
    ?>
    <nav class="navbar navbar-expand-xl bg-navbar-theme">
  <div class="container-fluid">
    <a class="navbar-brand" href="javascript:void(0)">Gallery</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-ex-2">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar-ex-2">
      <div class="navbar-nav me-auto">
        <a class="nav-item nav-link active" href="index.php">Home</a>
        <a class="nav-item nav-link" href="album.php">Album</a>
        <a class="nav-item nav-link" href="foto.php">Foto</a>
      </div>

      <span class="navbar-text">
        <a class="nav-item nav-link" href="logout.php">Logout</a>
      </span>
    </div>
  </div>
</nav>
    <?php
        }
    ?>

    <div class="table-responsive">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Judul</th>
        <th>Deskripsi</th>
        <th>Foto</th>
        <th>Uploader</th>
        <th>Jumlah Like</th>
        <th>Aksi</th>
      </tr>
      <?php
            include "koneksi.php";
            $sql=mysqli_query($conn,"select * from foto,user where foto.userid=user.userid");
            while($data=mysqli_fetch_array($sql)){
        ?>
    </thead>
    <tbody>
      <tr>
        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <span class="fw-medium"><?=$data['fotoid']?></span></td>
        <td><?=$data['judulfoto']?></td>
        <td><?=$data['deskripsifoto']?></td>
        <td><img src="gambar/<?=$data['lokasifile']?>" width="200px"></td>
        <td><?=$data['namalengkap']?></td>
        <td><?php
            $fotoid=$data['fotoid'];
            $sql2=mysqli_query($conn,"select * from likefoto where fotoid='$fotoid'");
            echo mysqli_num_rows($sql2);
            ?>
        </td>
        <td>
            <a href="like.php?fotoid=<?=$data['fotoid']?>">
                Like
            </a>
            <a href="komentar.php?fotoid=<?=$data['fotoid']?>">Komentar</a>
        </td>
    </tr>
      <?php
            }
        ?>
    </tbody>
  </table>
</div>

</body>
</html>