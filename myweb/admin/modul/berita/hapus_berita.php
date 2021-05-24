<?php
	require_once "../../koneksi.php";

	$id = $_GET['id'];

	$sql = mysqli_query($koneksi, "SELECT * FROM tb_berita WHERE id_berita='$id'");

	$x = mysqli_fetch_array($sql);

	$img_name = $x['foto_berita'];
	$loc= "../../img_berita/$img_name";
	@unlink($loc);

	mysqli_query($koneksi, "DELETE FROM tb_berita WHERE id_berita='$id'");

	header("location:berita.php");
?>