<?php
    include ('connecton.php');

    $status = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nomor = $_POST['nomor'];
        $Nama = $_POST['Nama'];
        $NoTelepon = $_POST['NoTelepon'];
        $AlamatRumah = $_POST['AlamatRumah'];
        $Kota = $_POST['Kota'];
        $Provinsi = $_POST['Provinsi'];
        $KodePos = $_POST['KodePos'];

        $query = "INSERT INTO customers VALUES ('$nomor','$Nama','$NoTelepon','$AlamatRumah','$Kota','$Provinsi','$KodePos')";
        
        if ($connection->query($query)) {
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
    <title>Tambah Customer</title>
</head>
<body>
    <nav>
    <a href="#">Yafi Arya Maulana---210181010135</a>
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
                <h2 style="margin: 30px 0 30px;">Form Customer</h2>
                <form action="form.php" method="post">
                    <div>
                        <label>Nomor</label>
                        <input type="text" name="Nomor" name="Nomor" required="required" placeholder="7492">
                    </div>
                    <div>
                        <label>Nama</label>
                        <input type="text" placeholder="Nama..." name="Nama" required="required">
                    </div>
                    <div>
                        <label>No Telepon</label>
                        <input type="text" placeholder="No Telepon..." name="NoTelepon" required="required">
                    </div>
                    <div>
                        <label>Alamat Rumah</label>
                        <input type="text" placeholder="Alamat Rumah..." name="AlamatRumah" required="required">
                    </div>
                    <div>
                        <label>Kota</label>
                        <input type="text" placeholder="Surabaya" name="Kota" required="required">
                    </div>
                    <div>
                        <label>Provinsi</label>
                        <input type="text" placeholder="jawa Timur..." name="Provinsi" required="required">
                    </div>
                    <div>
                        <label>Kode Pos</label>
                        <input type="text" placeholder="60217" name="Kode Pos" >
                    </div>
                    <?php
                        $query = "SELECT employeeNumber FROM employees";
                        $result = $connection->query($query);
                    ?>
                    <div>
                        <label>Sales Rep Employee</label>
                        <select name="salesRepEmployeeNumber" required="required">
                            <option value="">Pilih Salah Satu</option>
                            <?php while($data = $result->fetch(PDO::FETCH_ASSOC) ): ?>
                                <option value="<?= $data['employeeNumber'] ?>"><?= $data['employeeNumber'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <button type="submit">Save Changes</button>
                </form>
            </main>
        </div>
    </div>
</body>
</html>