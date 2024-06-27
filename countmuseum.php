<?php
include "koneksi.php";
$Q = mysqli_query($koneksi, "SELECT COUNT(nama_wisata) AS museum FROM `wisata` WHERE nama_wisata LIKE '%Museum%'")or die(mysqli_error());
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