<?php
  include ('connection.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id'])) {
          //query SQL
          $customerNumber_update = $_GET['id'];
          $query = "SELECT * FROM customers WHERE customerNumber = $customerNumber_update";

          //eksekusi query
          $result = $connection->query($query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomor = $_POST['nomor'];
    $Nama = $_POST['Nama'];
    $NoTelepon = $_POST['NoTelepon'];
    $AlamatRumah = $_POST['AlamatRumah'];
    $Kota = $_POST['Kota'];
    $Provinsi = $_POST['Provinsi'];
    $KodePos = $_POST['KodePos'];
    $salesRepEmployeeNumber = $_POST['salesRepEmployeeNumber'];
      //query SQL
      $sql = "UPDATE customers SET Nama='$Nama', NoTelepon='$NoTelepon',AlamatRumah='$AlamatRumah',Kota='$Kota',Provinsi='$Provinsi',KodePos='$KodePos',salesRepEmployeeNumber='$salesRepEmployeeNumber', WHERE nomor=$nomor";

      //eksekusi query
      if ($conn->query($sql)) {
        $status = 'ok';
      }
      else{
        $status = 'error';
      }

      //redirect ke halaman lain
      header('Location: index.php?status='.$status);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Customers</title>
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
                <h2 style="margin: 30px 0 30px;">Update Data Customers</h2>
                <form action="update.php" method="post">
                    <?php while($data = $result->fetch(PDO::FETCH_ASSOC) ): ?>
                    <div>
                    <label>Nomor</label>
                    <input type="text" class="form-control" placeholder="> 497" value="<?= $data['nomor'] ?>" name="nomor" readonly>
                    </div>
                    <div>
                    <label>Nama</label>
                    <input type="text" class="form-control" placeholder="Nama..." value="<?= $data['Nama'] ?>" name="Nama" required="required">
                    </div>
                    <div>
                    <label>No Telepon</label>
                    <input type="text" class="form-control" placeholder="No Telepon..." value="<?= $data['NoTelepon'] ?>" name="contactLastName" required="required">
                    </div>
                    <div>
                    <label>Alamat Rumah</label>
                    <input type="text" class="form-control" placeholder="AlamatRumah..." value="<?= $data['AlamatRumah'] ?>" name="contactFirstName" required="required">
                    </div>
                    <div>
                    <label>Kota</label>
                    <input type="text" class="form-control" placeholder="Surabaya" value="<?= $data['Kota'] ?>" name="phone" required="required">
                    </div>
                    <div>
                    <label>Provinsi</label>
                    <input type="text" class="form-control" placeholder="Jawa Timur..." value="<?= $data['Provinsi'] ?>" name="addressLine1" required="required">
                    </div>
                    <div>
                    <label>Kode Pos</label>
                    <input type="text" class="form-control" placeholder="60217" value="<?= $data['Kode Pos'] ?>" name="addressLine2" >
                    </div>
                    <div>
                    <?php
                        $querySalesRep = "SELECT employeeNumber FROM employees";
                        $resultSalesRep = $conn->query($querySalesRep);
                    ?>
                    <div>
                        <label>Sales Rep Employee Number</label>
                        <select name="salesRepEmployeeNumber" required>
                            <option value="">Pilih Salah Satu</option>
                            <?php while($dataSalesRep = $resultSalesRep->fetch(PDO::FETCH_ASSOC) ): ?>
                                <option value="<?= $dataSalesRep['employeeNumber'] ?>" <?= $dataSalesRep['employeeNumber'] == $data['salesRepEmployeeNumber'] ? "selected" :"" ?>><?= $dataSalesRep['employeeNumber'] ?></option>
                                <?php endwhile; ?>
                        </select>
                    </div>
                    <?php endwhile; ?>
                    <button type="submit">Menyimpan Data</button>
                </form>
            </main>
        </div>
    </div>
</body>
</html>