<?php

include_once('connect.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Document</title>


</head>


<body>

  <!-- <select id="gender">
  <option value="male"> Male </option>
  <option value="female"> Female</option>
  </select> -->

  <?php

  $id_barang = $_GET['id_barang'];

  $det_barang = mysqli_query($mysqli, "SELECT barang.*, user.nama_user
  FROM barang
  JOIN user 
  ON barang.id_user = user.id_user WHERE id_barang = '$id_barang' ");

  ?>

  <?php

  while ($arr_det_barang = mysqli_fetch_array($det_barang)) :

  ?>

    <img src="img/<?= $arr_det_barang['gambar_barang'];?>" width="200px" alt="">
    <p><?= $arr_det_barang['nama_barang']; ?></p>
    <p><?= $arr_det_barang['harga_barang']; ?></p>
    <p><?= $arr_det_barang['stok_barang']; ?></p>
    <p><?= $arr_det_barang['nama_user']; ?></p>

  <?php endwhile ?>

  <label for="quantity">Jumlah pesanan:</label><br>
  <input type="number" id="quantity" name="quantity" min="1" max="<?= $arr_det_barang['stok_barang']; ?>">
  <!-- session untuk menyimpan jumlah barang -->
  <?php 
  session_start(); //inisialisasi session
  if(isset($_POST['quantity'])){
    $_SESSION['quantity']=$_POST['quantity'];
  }

  ?>
  <p>Opsi Pengiriman</p>
  <select id="opsi_pengiriman">
    <option value="instan">Instan</option>
    <option value="same_day">Same Day</option>
    <option value="reguler">Reguler</option>
    <option value="kargo">Kargo</option>
  </select>
    
  <br><br>
  <p>Metode Pembayaran</p>
  <select id="metode_pembayaran">
    <option value="cod">COD</option>
    <option value="transfer_atm">Transfer ATM</option>
    <option value="m_banking">M-Banking</option>
    <option value="supermarket">Supermarket</option>
  </select>
  <br> <br>
  <?php 
  echo'<a class="btn btn-primary" href="show_cart.php?id_barang='.$id_barang.'">Add to Cart</a>';
   ?>
  

</body>

</html>