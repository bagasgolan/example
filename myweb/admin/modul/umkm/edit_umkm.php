<?php
ob_start();
session_start();
if(empty($_SESSION['user_name']) and empty($_SESSION['password'])) {
    echo '
    <center>
    <br><br><br><br><br><br><br><br><br><br><br>
    <b>Maaf, Silahkan Login Kembali</b><br>
    <b>Anda telah keluar dari sistem</b>
    <br>
    <a href="index.php" title="Klik Gambar untuk Kembali ke Halaman LOGIN">
    <img src="img/key-login.png" height="100" width="100"></img>
    </a>
    </center>';
} else {

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah UMKM</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    
    <script src="../../js/jquery-1.7.2.min.js"></script>
    <script src="../../js/OpenLayers.js"></script>

    <link href="../../css/jquery-position-picker.css" rel="stylesheet" type="text/css"/>
    <script src="../../js/jquery-position-picker.debug.js"></script>
    <link rel="stylesheet" href="../../css2/style.css">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
                <a class="dropdown-item" href="../berita/berita.php">Berita</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../laporan/laporan.php">Laporan</a>
            </li> -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Akun
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../password/password.php">Ubah Password</a>
                <a class="dropdown-item" href="../../logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?')">Logout</a>
                </div>
            </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
        </nav>

        <?php

            require_once "../../koneksi.php";
            $id=$_GET['id'];
            $query = mysqli_query($koneksi, "SELECT * FROM tbumkm_3193111030 WHERE id_umkm='$id'");
            $f=mysqli_fetch_array($query);
        ?>

        <br/>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
            <label for="exampleInputEmail1">ID UMKM</label>
            <input type="text" class="form-control" name="id_umkm" value="<?php echo $f['id_umkm'] ?>"readonly>

          <div class="form-group">
            <label for="exampleInputEmail1">Nama UMKM</label>
            <input type="text" class="form-control" name="nama_umkm" value="<?php echo $f['nama_umkm'] ?>">
            </div>


        <div class='gllpLatlonPicker'>
            <div class='gllpMap'></div>
            &#8627; <font color='red'>Klik 2X Pada Peta Untuk <b>Zoom</b></font> 
            <br />
            &#8627; <font color='red'>Klik 1X Pada Peta Untuk Menandai Lokasi Dengan <b>Marker</b></font> 
            <br /> <br />
            <input type='text' name='latitude' value="<?php echo $f['latitude'] ?>" class='gllpLatitude' value='-6.18295' readonly/> &#8592 <font color='yellow'>Latitude</font> <br/> <br/>
            <input type='text' name='longitude' value="<?php echo $f['longitude'] ?>" class='gllpLongitude' value='106.62743' readonly/> &#8592 <font color='yellow'>Longitude</font> <br/> <br/>
            <input type='text' class='gllpZoom' readonly/> &#8592 <font color='yellow'>Zoom</font> <br /> <br/>
        </div>

            <div class="form-group">
            <label for="exampleFormControlSelect1">Kategori</label>
            <select name="kategori_umkm" class="form-control" id="exampleFormControlSelect1">

            <?php
            require_once "../../koneksi.php";

            $tampil = mysqli_query($koneksi, "SELECT * FROM tbkategori_3193111030 ORDER BY nama_kategori ASC");
                if($f['kategori_umkm']==0){ ?>
                <option value="0">----Pilih Kategori---</option>
                <?php
                }

            while($a=mysqli_fetch_array($tampil)) {
                if($f['kategori_umkm']==$a['id_kategori']){ ?>
                <option value="<?php echo $a['id_kategori'] ?>"><?php echo $a['nama_kategori'] ?></option>
                <?php
                }else{ ?>
                <option value="<?php echo $a['id_kategori'] ?>" selected><?php echo $a['nama_kategori'] ?></option>
                <?php
                }
            }
            ?>

            </select>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Lokasi UMKM</label>
                <input type="text" class="form-control" name="lokasi_umkm" value="<?php echo $f['lokasi_umkm'] ?>">
                </div>

            <div class="form-group">
                    <label for="exampleInputPassword1">Deskripsi UMKM</label>
                    <textarea name="deskripsi_umkm" class="ckeditor"><?php echo $f['deskripsi_umkm'] ?></textarea>
                </div>

        <div class="form-group">
                <label for="exampleInputEmail1">Upload Foto</label>
                <input type="file" name="foto_umkm" class="form-control">
            </div>
            <img src="../../img_wisata/<?php echo $f['foto_umkm']?>" height="100" width="100"></img>
            <p style="color: red">Picture Formated: PNG , JPG , JPEG , GIF</p>
            <p style="color: red">File Maks < 1Mb</p>
            
              <input type="submit" class="btn btn-primary" name="submit" value="Simpan">
        </form>

    <?php
       require_once "../../koneksi.php";

       if(isset($_POST['submit'])) {
        $id_umkm = $_POST['id_umkm'];
        $nama_umkm = $_POST['nama_umkm'];
        $kategori_umkm = $_POST['kategori_umkm'];
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];
        $lokasi_umkm = $_POST['lokasi_umkm'];
        $deskripsi_umkm = $_POST['deskripsi_umkm'];
        
        $filename = $_FILES['foto_umkm']['name'];
        $file_extension = array('png', 'jpg', 'jpeg', 'gif');
        $size = $_FILES['foto_umkm']['size'];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $rand = rand();
        
    
        if ($filename != "" ){
            if (!in_array($extension, $file_extension)) {
            echo "<script>alert('File Tidak Didukung'); window.location = 'edit_umkm.php'</script>";

        } else {
            if (!$size < 1050050) {

                    $query = mysqli_query($koneksi, "SELECT * FROM tbumkm_3193111030 WHERE id_umkm='$id_umkm'");
                    $a = mysqli_fetch_array($query);

                    $img_name = $a['foto_umkm'];
                    $loc = "../../img_wisata/$img_name";

                    @unlink($loc);

                    $nama_gambar = $rand.'_'.$filename;
                    move_uploaded_file($_FILES['foto_umkm']['tmp_name'], "../../img_wisata/".$nama_gambar);

                    mysqli_query($koneksi, "UPDATE tbumkm_3193111030 SET nama_umkm='$nama_umkm',
                                                                kategori_umkm='$kategori_umkm',
                                                                lokasi_umkm='$lokasi_umkm',
                                                                latitude='$latitude',
                                                                longitude='$longitude',
                                                                foto_umkm='$nama_gambar',
                                                                deskripsi_umkm='$deskripsi_umkm'
                                                        WHERE id_umkm='$id_umkm'");
                    header("location:umkm.php");
            } else {
                echo "<script>alert('File Terlalu Besar'); window.location = 'edit_umkm.php'</script>";
            }
        }
        } else {

            mysqli_query($koneksi, "UPDATE tbumkm_3193111030 SET nama_umkm='$nama_umkm',
                                                         kategori_umkm='$kategori_umkm',
                                                         lokasi_umkm='$lokasi_umkm',
                                                         latitude='$latitude',
                                                         longitude='$longitude',
                                                         foto_umkm='$nama_gambar',
                                                         deskripsi_umkm='$deskripsi_umkm'
                                                   WHERE id_umkm='$id_umkm'");

            header("location:umkm.php");
        
        }
    }

    ?>


    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script src="../../ckeditor/ckeditor.js" type="text/javascript"></script>
</html>

<?php
    }
?>