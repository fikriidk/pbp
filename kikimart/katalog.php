<?php

  include_once('connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  
  <!-- CSS only -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->

  <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <header>
    <nav>
        <ul>
            <li class="nav li"><a href="user.php?id_user=<?=$arr_barang['id_barang']; ?>" class="akun">Akun</a></li>
        </ul>
    </nav>
    <div class="jumbotron1">
        
        <h1>KIKIMART</h1>
        
    </div>
    <nav>
        <ul>
            <li class="nav li"><a href="#Sunscreen">Sunscreen</a></li>
            <li class="nav li"><a href="#Face Wash">Face Wash</a></li>
        </ul>
    </nav>
    </div>
    </header>

  <?php  

    $barang = mysqli_query($mysqli, "SELECT barang.*, user.nama_user
    FROM barang
    JOIN user 
    ON barang.id_user = user.id_user; ");  

    

  ?>

  <h2 id="Sunscreen">Sunscreen</h2>
  <?php

    while($arr_barang = mysqli_fetch_array($barang)):

  ?>

  <br><br>
  <div class="card">
  <img src="img/<?=  $arr_barang['gambar_barang']; ?>" width="200px" alt="">
  <p><?= $arr_barang['nama_barang']; ?></p>
  <p><?= $arr_barang['harga_barang']; ?></p>
  <p><?= $arr_barang['stok_barang']; ?></p>
  <p><?= $arr_barang['nama_user']; ?></p>
  <a href="detail.php?id_barang=<?=$arr_barang['id_barang']; ?>" class="akun">detail</a>
  <a href="pembelian.php?id_barang=<?=$arr_barang['id_barang']; ?>" class="akun">beli</a>
  <br><br>
    </div>
      
  <?php endwhile?>
  
</body>
</html>
