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

<?php

  $id_barang = $_GET['id_barang'];  

	$det_barang = mysqli_query($mysqli, "SELECT barang.*, penjual.nama_penjual
  FROM barang
  JOIN penjual 
  ON barang.id_penjual = penjual.id_penjual WHERE id_barang = '$id_barang' ");

?>

<?php

    while($arr_det_barang = mysqli_fetch_array($det_barang)):

  ?>

  <p><?= $arr_det_barang['nama_barang']; ?></p>
  <p><?= $arr_det_barang['harga_barang']; ?></p>
  <p><?= $arr_det_barang['stok_barang']; ?></p>
  <p><?= $arr_det_barang['nama_penjual']; ?></p>
  <p><?= $arr_det_barang['deskripsi']; ?></p>
 
  <br><br>

  <a href="pembelian.php?id_barang=<?=$arr_det_barang['id_barang']; ?>" class="btn btn-primary">beli</a>
      
  <?php endwhile?>
  
</body>
</html>