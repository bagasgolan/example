<?php
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
    <title>CetakLaporan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <br/>
        <center>
        <h2>LAPORAN UMKM WILAYAH JOGJA</h2>
        <p>Pemerintah Kota Yogyakarta</p>
        </center>

        <table class="table mt-3">
            <thead class="thead-dark">
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama UMKM</th>
                <th scope="col">Kategori</th>
                <th scope="col">Lokasi</th>
                <th scope="col">Latitude</th>
                <th scope="col">Longitude</th>
                <th scope="col">Gambar</th>
                <th scope="col">Deskripsi UMKM</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    require_once "../../koneksi.php";

                    $sql = mysqli_query($koneksi, "SELECT * FROM tbumkm_3193111030, tbkategori_3193111030
                    where tbumkm_3183111046.kategori_umkm=tbkategori_3183111046.id_kategori");
                    $no = 1;
                    while($r=mysqli_fetch_array($sql)) {

                ?>
                <tr>
                <th scope="row"><?php echo $no++ ?></th>
                <td><?php echo $r['nama_umkm'] ?></td>
                <td><?php echo $r['nama_kategori'] ?></td>
                <td><?php echo $r['lokasi_umkm']?></td>
                <td><?php echo $r['latitude']?></td>
                <td><?php echo $r['longitude']?></td>
                <td><img src="../../img_wisata/<?php echo $r['foto_umkm'] ?>" height="50" width="50"></td>
                <td><?php echo $r['deskripsi_umkm']?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <script>
            window.print();
        </script>
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