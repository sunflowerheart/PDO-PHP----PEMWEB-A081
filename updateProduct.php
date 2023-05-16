<?php
  include ('connection.php');

  $status = '';
  $result = '';
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id'])) {
          //query SQL
          $KodeProduk_update = $_GET['id'];
          $query = "SELECT * FROM products WHERE KodeProduk = '$KodeProduk_update'";

          //eksekusi query
          $result = $conn->query($query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $KodeProduk = $_POST['KodeProduk'];
    $NamaProduk = $_POST['NamaProduk'];
    $Merk = $_POST['Merk'];
    $PenjelasanProduk = $_POST['PenjelasanProduk'];
    $InfoStock = $_POST['InfoStock'];
    $Harga = $_POST['Harga'];
      //query SQL
      $sql = "UPDATE products SET NamaProduk='$NamaProduk', Merk='$Merk', PenjelasanProduk='$PenjelasanProduk',InfoStock='$InfoStock',Harga='$Harga'= WHERE NamaProduk='$NamaProduk'";

      //eksekusi query
      if ($conn->query($sql)) {
        $status = 'ok';
      }
      else{
        $status = 'error';
      }

      //redirect ke halaman lain
      header('Location: product.php?status='.$status);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
</head>
<body>
    <nav>
        <a href="#">Yafi Arya Maulana---21081010135</a>
    </nav>

    <div>
        <div>
            <nav>
                <div>
                    <ul>
                        <li>
                        <a href="product.php">Data Product</a>
                        </li>
                        <li>
                            <a href="index.php">Data Customers</a>
                        </li>
                        <li>
                            <a href="formProduct.php">Menambahkan Data Product</a>
                        </li>
                        <li>
                            <a href="form.php">Menambahkan Data Customers</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main role="main">
                <h2 style="margin: 30px 0 30px;">Update Data Product</h2>
                <form action="updateProduct.php" method="post">
                    <?php while($data = $result->fetch(PDO::FETCH_ASSOC) ): ?>
                    <div>
                    <label>Kode Produk</label>
                    <input type="text" placeholder="> 497" value="<?= $data['KodeProduk'] ?>" name="KodeProduk" readonly>
                    </div>
                    <div>
                    <label>Nama Produk</label>
                    <input type="text" placeholder="Nama..." value="<?= $data['NamaProduk'] ?>" name="Nama Produk" required="required">
                    </div>
                    <?php 
                        $queryLine = "SELECT Merk FROM productlines";
                        $resultLine = $connection->query($queryLine);
                    ?>
                    <div>
                    <label>Merk</label>
                    <input type="text" placeholder="Merk..." value="<?= $data['Merk'] ?>" name="Merk" required="required">
                    </div>
                    <div>
                    <label>Penjelasan Produk</label>
                    <select name="PenjelasanProduk" required="required">
                        <option value="">Pilih Salah Satu</option>
                        <?php while($dataLine = $resultLine->fetch(PDO::FETCH_ASSOC) ): ?>
                            <option value="<?= $dataLine['PenjelasanProduk'] ?>"<?= $dataLine['PenjelasanProduk'] == $data['PenjelasanProduk'] ? "selected" : "" ?>><?= $dataLine['PenjelasanProduk'] ?></option>
                        <?php endwhile; ?>
                    </select>
                    </div>
                    <div>
                    <label>Info Stock</label>
                    <input type="text" placeholder="699" value="<?= $data['InfoStock'] ?>" name="InfoStock" required="required">
                    </div>
                    <div>
                    <label>Harga</label>
                    <input type="text" placeholder="49000..." value="<?= $data['Harga'] ?>" name="Harga" required="required">
                    </div>
                    <?php endwhile; ?>
                    <button type="submit">Menyimpan Data</button>
                </form>
            </main>
        </div>
    </div>
</body>
</html>