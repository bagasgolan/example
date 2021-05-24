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
     <link rel="stylesheet" href="../../css2/style.css">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="../../dashboard.php">GIS UMKM JOGJA 046</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <li class="nav-item active">
                <a class="nav-link" href="../../dashboard.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../kategori/kategori.php">Kategori UMKM</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../umkm/umkm.php">UMKM</a>
            </li>
            <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Data
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../kategori/kategori.php">Kategori Wisata</a>
                <a class="dropdown-item" href="../wisata/wisata.php">Wisata</a>
                <a class="dropdown-item" href="#">Berita</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Laporan</a>
            </li> -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Akun
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="modul/password/password.php">Ganti Password</a>
                <a class="dropdown-item" href="../../logout.php" onclick="return confirm('Do You Want Logout?')">Logout</a>
                </div>
            </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-primary" type="submit" value="submit">Search</button>
            </form>
        </div>
        </nav>
        <br>
        <form action="" method="POST">
        <div class="form">
        <label for="exampleInputEmail1">Username</label>
            <input type="text" name="username" class="form-control" value="<?php echo $_SESSION['username'] ?>">
        <label for="exampleInputEmail1">Password  Baru</label>
            <input type="text" name="password1" class="form-control" aria-describedby="emailHelp" placeholder="Masukan password baru">
        <label for="exampleInputPassword1">Konfirmasi Password</label>
            <input type="text" name="password2" class="form-control" placeholder="Masukkan kembali password baru">
            <br><button type="submit" name="submit" class="btn btn-primary">Ubah</button>
        </form>
        </div>
            
        <?php
        require_once "../../koneksi.php";

        if(isset($_POST['submit'])){
            $passwordbaru1 = $_POST['password1'];
            $passwordbaru2 = $_POST['password2'];
            $username = $_POST['username'];
            $passwordmd5 = md5($_POST['password2']);

            if($passwordbaru1==$passwordbaru2) {
                mysqli_query($koneksi, "update tbadmin_3193111030 set password='$passwordmd5' where username='$username'");

                echo "<script>alert('Change password succesfully'); window.location = 'password.php'</script>";

            }else{
                echo "<script>alert('Change password failed'); window.location = 'password.php'</script>";
            }

        }
        ?>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</html>

<?php
 }
?>