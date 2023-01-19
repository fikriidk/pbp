<!-- // File      : show_cart.php
// Deskripsi : Menampilkan cart-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Keranjang Kikimart</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        
        <style>
            .error{
                color: red;
            }
        </style>
    </head>
    <body>
    <?php
    require_once('connect.php');
    session_start(); //inisialisasi session
    if(isset($_GET['id_barang'])){
        $id = $_GET['id_barang'];    
    }
    
    $id = !empty($_GET['id_barang']) ? $_GET['id_barang']:'';
    if($id != ""){
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = array();
        }

        if(isset($_SESSION['cart'][$id])){
            $_SESSION['cart'][$id]++;
        }else{
            $_SESSION['cart'][$id] = 1;
        }
    }
    ?>
        <br>
        <div class="card">
        <div class="card-header">Keranjang</div>
        <div class="card-body">
        <br>
        <table class="table table-striped">
            <tr>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
            </tr>

        <?php
        $sum_qty = 0;
        $sum_price = 0;
        $qty=$id;
        if(isset($_SESSION['cart'])){
            foreach ($_SESSION['cart'] as $id => $qty){
                $query = "SELECT * FROM barang WHERE id_barang = $id";
                $result = $mysqli->query($query);
                if (!$result){
                    die ("Could not connect to the database: <b />". $mysqli->error. "<br>Query:".$query);
                }
                while ($row = $result->fetch_object()){
                    echo'<tr>';
                    echo'<td>'.$row->nama_barang.'</td>';
                    echo'<td>'.$row->harga_barang.'</td>';
                    echo'<td>'.$qty.'</td>';
                    $price = $row->harga_barang;
                    echo'<td>' .$row->harga_barang * $qty.'</td>';
                    $sum_qty = $sum_qty+$qty;
                    $sum_price = $sum_price + ($row->harga_barang * $qty);
                }
            }
            echo'<tr><td></td><td></td><td>'.$sum_qty.'</td><td>'.$sum_price.'</td></tr>';
            $result->free();
            $mysqli->close();
        }else{
            echo '<tr><td colspan="6" align="center">There is no item in shopping cart</td></tr>';
        }
        ?>
       </table>
        Total items =  <?php echo $sum_qty; ?><br><br>
        <a class="btn btn-primary" href="katalog.php">Lanjut Belanja</a>
        <a class="btn btn-danger" href="delete_cart.php">Hapus Keranjang</a><br /><br />
        </div>
        </div>
    </body>
</html>