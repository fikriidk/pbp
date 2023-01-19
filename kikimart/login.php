<?php

include_once("connect.php");
$user = mysqli_query($mysqli, "SELECT user.*, tipe_user.tipe_user
                                FROM user
                                JOIN tipe_user
                                ON user.id_tipe_user = tipe_user.id_tipe_user");

if (isset($_POST['submit'])) {

  $user_name = $_POST['user_name'];

  if ($user_name == '' || !isset($_POST['tipe_user'])) {
    $field_kosong_login = true;
  } else {

    while ($arr_user = mysqli_fetch_array($user)) {

      if ($user_name == $arr_user['user_name']) {

        $det_user = $arr_user['id_user'];

        header("location:katalog.php?id_user=$det_user");
        exit;
      } else {
        $user_name_salah = true;
      }
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

  <title>Login</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      outline: 0;
      font-family: 'Roboto', sans-serif;
    }

    h1 {
      font-family: 'Cormorant Garamond';
      font-size: 50px;
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
      padding: 35px 35px;
      width: 320px;

      background-color: rgba(255, 255, 255, .7);
      box-shadow: 0 0 10px rgba(255, 255, 255, .3);
      border-radius: 2rem;
    }

    .container h1 {
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
      font-weight: bolder;
    }

    .username {
      width: calc(100% - 20px);
      padding: 8px 10px;
      margin-bottom: 15px;
      border: none;
      background-color: transparent;
      border-bottom: 2px solid #000000;
      color: #000000;
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
    <h1>Welcome</h1>
    <form action="" method="POST">

      <label class="bold">Masukkan username</label><br>
      <input type="text" class="username" name="user_name"><br>
      <label class="bold">Masuk sebagai</label><br>
      <div class="radio-item">
        <input type="radio" id="opsia" name="tipe_user" value="penjual">
        <label for="opsia">Penjual</label>
        <br>
        <input type="radio" id="opsib" name="tipe_user" value="pembeli">
        <label for="opsib">Pembeli</label>
      </div>
      <br>
      <button type="submit" class="btn btn-primary" name="submit">Login</button><br>
      <button type="" class="btn btn-primary" name="daftar_login" formaction="registrasi.php">Daftar</button>



      <?php

      if (!isset($field_kosong_login)) {
        echo "<br/><br/>";
      } else{
        echo "<p style='color:red'>ada field yang belum diisi!</p>";
      }

      ?>


    </form>
  </div>




</body>

</html>