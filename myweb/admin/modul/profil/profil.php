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
    <title>Profil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
     integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" 
     crossorigin="anonymous">
     <link rel="stylesheet" href="../../css2/style.css">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="../../dashboard.php">PESONA JOGJA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="../../dashboard.php">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../profil/profil.php">Profil</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Data
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../kategori/kategori.php">Kategori</a>
                <a class="dropdown-item" href="../wisata/wisata.php">Wisata</a>
                <a class="dropdown-item" href="../berita/berita.php">Berita</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../laporan/laporan.php">Laporan</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Akun
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../password/password.php">Ganti Password</a>
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
        <?php
        require_once "../../koneksi.php";

        $sql =mysqli_query($koneksi, "SELECT *FROM tb_profil");

        $a = mysqli_fetch_array($sql);

        ?>
        <!--form ubah profil-->
        <br>
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="group1">
        <label for="formGroupExampleInput">Upload Profile</label>
        <input type="file" name="img" class="form-control"><br/>
        <img src="../../img/<?php echo $a['foto']?>"height="150" width="150">
        <br/><br/>
        <label for="formGroupExampleInput2">Konten Profile</label>
        <textarea name="profil" class="ckeditor"><?php echo $a['profil']?></textarea>
        <br>
        <button type="submit" name="submit" class="btn btn-primary">Update Data</button>
        </div>
        </form>    
        <?php
        require_once "../../koneksi.php";
        if(isset($_POST['submit'])){
            $gmbr = $_FILES['img']['name'];
            $profil = $_POST['profil'];

            if(empty($gmbr)){
                mysqli_query($koneksi,"UPDATE tb_profil SET profil='$profil' WHERE id_profil='1'");
                echo "<script>alert('Konten berhasil diubah'); window.location = 'profil.php'</script>";
            }else{
                //akses tabel profil
                $sql=mysqli_query($koneksi, "SELECT * From tb_profil");

                //pecah berdasar tabel masing msg
                $a = mysqli_fetch_array($sql);

                //ambl atribut fto pd db
                $img_db_name = $a['foto'];

                $lokasi="../../img/$img_db_name";

                @unlink($lokasi);

                @move_uploaded_file($_FILES['img']['tmp_name'], '../../img/'.$gmbr);
                mysqli_query($koneksi, " UPDATE tb_profil SET foto='$gmbr' ,profil='$profil' WHERE id_profil='1'");
                echo "<script>alert('Gambar dan Konten berhasil diubah'); window.location = 'profil.php'</script>";
            }
        }

        ?>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script src="../../ckeditor/ckeditor.js"type="text/javascript"></script>
</html>

<?php
 }
?>