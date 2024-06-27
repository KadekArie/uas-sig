<?php
include "koneksi.php";

$Q = mysqli_query($koneksi,"SELECT COUNT(nama_wisata) AS lain FROM `wisata` WHERE nama_wisata NOT LIKE '%Pantai%' AND nama_wisata NOT LIKE '%Museum%' AND nama_wisata NOT LIKE '%Taman%'") or die(mysqli_error($koneksi));

if($Q){
 $posts = array();
      if(mysqli_num_rows($Q))
      {
             while($post = mysqli_fetch_assoc($Q)){
                     $posts[] = $post;
             }
      }  
      $data = json_encode(array('results'=>$posts));             
}

?>
