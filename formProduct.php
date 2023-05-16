<?php
    include ('connection.php');

    $status = '';
    $status = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $KodeProduk = $_POST['KodeProduk'];
        $NamaProduk = $_POST['NamaProduk'];
        $Merk = $_POST['Merk'];
        $PenjelasanProduk = $_POST['PenjelasanProduk'];
        $InfoStock = $_POST['InfoStock'];
        $Harga = $_POST['Harga'];

        $query = "INSERT INTO products VALUES('$KodeProduk','$NamaProduk','$Merk','$PenjelasanProduk','$InfoStock','$Harga')"; 

        if ($conn->query($query)) {
            $status = 'ok';
        }
        else{
            $status = 'error';
        }
    }   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menambahkan Produk</title>
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
                <?php
                    if ($status=='ok') {
                        echo '<br><br><div class="alert alert-success" role="alert">Data Customer berhasil disimpan</div>';
                      }
                      elseif($status=='error'){
                        echo '<br><br><div class="alert alert-danger" role="alert">Data Customers gagal disimpan</div>';
                      }
                ?>
                <h2 style="margin: 30px 0 30px;">Form Produk</h2>
                <form action="formProduct.php" method="post">
                    <div>
                        <label>Kode Produk</label>
                        <input type="text" name="KodeProduk" required="required" placeholder="7492">
                    </div>
                    <div>
                        <label>Nama Produk</label>
                        <input type="text" placeholder="Nama..." name="NamaProduk" required="required">
                    </div>
                    <?php 
                        $query = "SELECT * FROM Merk";
                        $result = $connection->query($query);
                        ?>
                    <div class="form-group">
                        <label>Merk</label>
                        <select class="custom-select" name="Merk" required="required">
                            <option value="">Pilih Salah Satu</option>
                            <?php while($data = $result->fetch(PDO::FETCH_ASSOC) ): ?>
                                <option value="<?= $data['Merk'] ?>"><?= $data['Merk'] ?></option>
                            <?php endwhile;?>
                        </select>
                    </div>
                    <div>
                        <label>Penjelasan Produk</label>
                        <input type="text" placeholder="Penjelasan Produk" name="PenjelasanProduk" required="required">
                    </div>
                    <div>
                        <label>InfoStock</label>
                        <input type="text" placeholder="vendor" name="InfoStock" required="required">
                    </div>
                    <div>
                        <label>Harga</label>
                        <input type="text" placeholder="description" name="Harga" required="required">
                    </div>
                    <div>
                    <button type="submit">Menyimpan Data</button>
                </form>
            </main>
        </div>
    </div>
</body>
</html>