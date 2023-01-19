<?php

include_once('connect.php');



if (isset($_POST['daftar_registrasi'])) {


  $nama = $_POST['nama'];
  $user_name = $_POST['user_name'];
  $no_telp = $_POST['no_telp'];
  $email = $_POST['email'];

  if ($nama == '' || $user_name == '' || $email == '' || $email == '' || !isset($_POST['tipe_user'])) {
    $field_kosong = true;
  } else {
    if ($_POST['tipe_user'] == 'pembeli') {

      $insert = mysqli_query($mysqli, " INSERT INTO `user`(`nama_user`, `email`, `no_telp`, `user_name`, `id_tipe_user`) VALUES('$nama', '$email', '$no_telp', '$user_name', 1)  ");

      header("location:login.php");
    } elseif ($_POST['tipe_user'] == 'penjual') {

      $insert = mysqli_query($mysqli, " INSERT INTO `user`(`nama_user`, `email`, `no_telp`, `user_name`, `id_tipe_user`) VALUES('$nama', '$email', '$no_telp', '$user_name', 2)  ");

      header("location:login.php");
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@1,300&family=Roboto:wght@300&display=swap" rel="stylesheet">

  <title>Daftar</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      outline: 0;
      font-family: 'Roboto', sans-serif;
    }

    body {
      height: 100vh;
      background: url('img/background1.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }

    .container {
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      padding: 20px 25px;
      width: 300px;

      background-color: rgba(255, 255, 255, .7);
      box-shadow: 0 0 10px rgba(255, 255, 255, .3);
      border-radius: 2rem;
    }

    .container h1 {
      font-family: 'Cormorant Garamond';
      font-size: 50px;
      text-align: center;
      color: #000000;
      margin-bottom: 30px;
      text-transform: uppercase;
      /* border-bottom: 4px solid #2979ff; */
    }

    .container label {
      text-align: left;
      color: #000000;
    }

    .bold {
      font-weight: bold;
    }

    .username {
      width: calc(100% - 20px);
      padding: 8px 10px;
      margin-bottom: 15px;
      border: none;
      background-color: transparent;
      border-bottom: 2px solid #000000;
      color: #fff;
      font-size: 20px;
    }

    .container form button {
      width: 100%;
      padding: 5px 0;
      border: none;
      background-color: #000000;
      font-size: 18px;
      color: #fafafa;
      margin-bottom: 5px;
      border-radius: 2rem;
    }

    .radio-item {
      margin-left: 8px; 
      margin-top: 5px;
    }

    .radio-item label {
      color: #000000;
    }

    p {
      text-align: center;
    }
  </style>

</head>


<body>
  <div class="container">
    <h1>Daftar</h1>
    <form action="" method="POST">
      <label class="bold">Masukkan nama</label>
      <input type="text" class="username" name="nama">

      <label class="bold">Masukkan username</label>
      <input type="text" class="username" name="user_name">

      <label class="bold">Masukkan email</label>
      <input type="email" class="username" name="email" id="">

      <label class="bold">Masukkan no telpon</label>
      <input type="text" class="username" name="no_telp">

      <label class="bold">registrasi sebagai</label>
      <div class="radio-item">
        <input type="radio" id="opsia" name="tipe_user" value="penjual">
        <label for="opsia">Penjual</label>
      </div>
      <div class="radio-item">
        <input type="radio" id="opsib" name="tipe_user" value="pembeli">
        <label for="opsib">Pembeli</label>
      </div>

      <!-- <p>Masukkan password</p>
    <input type="text" name="password"> -->

      <br>
      <button type="submit" name="daftar_registrasi" class="btn btn-primary">Daftar</button>
      <button typr="" class="btn btn-primary" formaction="login.php">Kembali</button>
      <!-- <a href="login.php" class="btn btn-primary">back</a> -->
      <?php

  
      if (isset($field_kosong)) {
        echo "<p style='color:red'>ada field yang belum diisi!</p>";
      }


      ?>

    </form>
  </div>

</body>

</html>