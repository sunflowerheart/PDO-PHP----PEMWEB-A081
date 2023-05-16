<?php 

  include ('connection.php'); 

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id'])) {
          //query SQL
          $KodeProduk = $_GET['id'];
          $query = $connection->prepare("DELETE FROM products WHERE KodeProduk = :KodeProduk ");
          //binding data
          $query->bindParam(':KodeProduk',$KodeProduk);
          //eksekusi query
          if ($query->execute()) {
            $status = 'ok';
          }
          else{
            $status = 'error';
          }

          //redirect ke halaman lain
          header('Location: product.php?status='.$status);
      }  
  }