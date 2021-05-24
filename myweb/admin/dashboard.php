<?php
session_start();
if(empty($_SESSION['user_name']) and empty($_SESSION['password'])){
    echo '
    <center>
    <br><br><br>
    <b>Anda telah keluar dari system</b>
    <b>Silahkan login kembali</b>
    <br>
    <br>
    <br>
    <a href="index.php" title="klik gambar untuk kembali login">
    <img src="img/key-login.png" height="100px" width="100px"></img>
    </a>
    </center>';
} else {

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
     integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" 
     crossorigin="anonymous">
     <link rel="stylesheet" href="css2/style.css">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar">
    <div class="navbar-brand">
        <a class="navbar-brand">EXAMPLE</a>
    </div>
    <ul class="navbar-nav mr-auto">
            <li class="nav-item">
        <a class="nav-link" href="dashboard.php">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="modul/kategori/kategori.php">Kategori</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="modul/umkm/umkm.php">UMKM</a>
    </li>
    <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" 
        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Data</a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="modul/kategori/kategori.php">Kategori</a>
        <a class="dropdown-item" href="modul/wisata/wisata.php">UMKM</a>
        <a class="dropdown-item" href="modul/berita/berita.php">Berita</a>
    </div> -->
    </li>
    <li class="nav-item">
        <a class="nav-link" href="modul/laporan/laporan.php">Laporan</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Akun</a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="modul/password/password.php">Ganti Password</a>
        <a class="dropdown-item" href="logout.php" onclick="return confirm('Do You Want Logout?')">Logout</a>
    </div>
    </li>
    </ul>
    <div class="formsearch">
    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-primary" type="submit" value="submit">Search</button>
    </form>
    </div>
    </nav>
        
        <div class="mycontainer">
            <div class="jumbotron">
            <h1 class="display">Welcome, <?php echo $_SESSION['user_name'] ?></h1>
        </div>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</html>

<?php
 }
?>