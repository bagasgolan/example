<?php
require_once "wp-admin/koneksi.php";

$sql = mysqli_query($koneksi, "select * from tbumkm_3183111046");

if($sql->num_rows > 0){
  $response = array(
    'type' => 'FeatureCollection',
    'features'=> array()
  );

  while($i = mysqli_fetch_array($sql)){
    $j['id_umkm'] = $i['id_umkm'];
    $j['nama_umkm'] = $i['nama_umkm'];
    $j['deskripsi_umkm'] = $i['deskripsi_umkm'];
    $j['latitude'] = $i['latitude'];
    $j['longitude'] = $i['longitude'];


  $properties = array(
    'id'=>$j['id_umkm'],
    'title'=>$j['nama_umkm'],
    'desc'=>$j['deskripsi_umkm'],
    'latitude'=>$j['latitude'],
    'longitude'=>$j['longitude'],
  );

  array_push($response['features'], array(
   'type'=>'Feature',
   'geometry'=>array(
     'type'=>'Point',
     'coordinates'=>array($j['longitude'],$j['latitude'])
   ),
   'properties'=>$properties 
   ));
   
  }

  header('Content-Type:application/json');
  echo json_encode($response);
}