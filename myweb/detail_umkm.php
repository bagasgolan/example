<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <title>Document</title>
  <style>
    div {
      text-align:justify;
      text-justify:inter-word;
    }
  </style>
</head>
<body>
  <div class="container">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">GIS UMKM JOGJA 046</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="profil.php">Profil</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="umkm.php">UMKM</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="kontak.php">Kontak</a>
        </li> -->
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Profil</a></li>
            <li><a class="dropdown-item" href="#">Wisata</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Kontak</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li> -->
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<?php
require_once "wp-admin/koneksi.php";
$id = $_GET['id'];

$sql = mysqli_query($koneksi, "select * from tbumkm_3183111046,tbkategori_3183111046 where tbumkm_3183111046.kategori_umkm=tbkategori_3183111046.id_kategori and tbumkm_3183111046.id_umkm='$id'");

$r = mysqli_fetch_array($sql)
?>
<center><h2>Deskripsi UMKM</h2></center>
<hr/>
<img src="wp-admin/img_wisata/<?php echo $r['foto_umkm'] ?>" height="150" width="150">
<br><br>
<p><b>&nbsp;Nama UMKM: </b><?= $r['nama_umkm']?></p>
<p><b>&nbsp;Kategori UMKM: </b><?= $r['nama_umkm']?></p>
<p><b>&nbsp;Deskripsi UMKM: </b><?= $r['deskripsi_umkm']?></p>
<p><b>&nbsp;Nama Foto UMKM: </b><?= $r['foto_umkm']?></p>
<br>

<iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=109.98619079589845%2C-7.996677320073621%2C110.7524871826172%2C-7.601427263806812&amp;layer=mapnik&amp;marker=<?= $r['latitude'] ?>%2C<?= $r['longitude'] ?>" style="border: 1px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/?mlat=-7.7988&amp;mlon=110.3693#map=11/-7.7991/110.3693">View Larger Map</a></small>
<br>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

</html>