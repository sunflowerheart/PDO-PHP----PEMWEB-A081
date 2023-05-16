<?php
    include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO PHP </title>
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
                <h2 style="margin: 10px 0 10px; font-size: 50px; color: orange; text-align: center;">Customer</h2>
                <div>
                    <table border="1">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama</th>
                                <th>No Telepon</th>
                                <th>Alamat Rumah</th>
                                <th>Kota</th>
                                <th>Provinsi</th>
                                <th>Kode Pos</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = "SELECT * FROM customers";
                                $result = $connection->query($query);
                            ?>
                            <?php while($data = $result->fetch(PDO::FETCH_ASSOC) ): ?>
                            <tr>
                                <td><?php echo $data['Nomor']; ?></td>
                                <td><?php echo $data['Nama']; ?></td>
                                <td><?php echo $data['NoTelepon']; ?></td>
                                <td><?php echo $data['AlamatRumah']; ?></td>
                                <td><?php echo $data['Kota']; ?></td>
                                <td><?php echo $data['Provinsi']; ?></td>
                                <td><?php echo $data['KodePos']; ?></td>
                                <td>
                                    <a style="color: green;" href="<?php echo "update.php?id=".$data['customerNumber']; ?>"> Update</a>
                                    &nbsp;&nbsp;
                                    <a style="color: red;" href="<?php echo "delete.php?id=".$data['customerNumber']; ?>"> Delete</a>
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