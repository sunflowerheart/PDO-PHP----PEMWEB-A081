<?php
    include('connection.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO PHP</title>
</head>
<body>
    <nav>
        <h1>Yafi Arya Maulana---21081010135</h1>
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
                    if(@$_GET['status'] !== null) {
                        $status = $_GET ['status'];
                        if ($status == 'ok') {
                            echo '<br><br><div role = "alert"> Data Customer Berhasil di Update </div>';
                        } else if ($status == 'error') {
                            echo '<br><br><div role = "alert"> Data Customer Gagal di Update </div>';
                        }
                    }
                ?>
                <h2 style="margin: 30px 0 30px; font-size: 50px; color: blue; text-align: center;">Product</h2>
                <div>
                    <table border="1">
                        <thead>
                            <tr>
                                <th>Kode Produk</th>
                                <th>Nama Produk</th>
                                <th>Merk</th>
                                <th>Penjelasan Produk</th>
                                <th>Info Stock</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = "SELECT * FROM products";
                                $result = $connection->query($query);
                            ?>
                            <?php while($data = $result->fetch(PDO::FETCH_ASSOC) ): ?>
                            <tr>
                                <td><?php echo $data['KodeProduk'];  ?></td>
                                <td><?php echo $data['NamaProduk'];  ?></td>
                                <td><?php echo $data['Merk'];  ?></td>
                                <td><?php echo $data['PenjelasanProduk']; ?></td>
                                <td><?php echo $data['InfoStock']; ?></td>
                                <td><?php echo $data['Harga']; ?></td>
                                <td>
                                    <a  style="color: green;" href="<?php echo "updateProduct.php?id=".$data['KodeProduk']; ?>"> Update</a>
                                    &nbsp;&nbsp;
                                    <a style="color: red;" href="<?php echo "deleteProduct.php?id=".$data['KodeProduk']; ?>"> Delete</a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</body>
</html>