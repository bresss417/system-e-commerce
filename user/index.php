<?php

session_start();
include('../components/connect.php');
include('../components/component.php');
include('../components/link.script.php');
include('card.php');
if(!isset($_SESSION['user_data'])){
    echo "
            <script>
                alert('pless your login');
                window.location = '../index.php';
            </script>
        ";
}else{
    $sessionUser = $_SESSION['user_data']['name_last'];
    $sql = mysqli_query($conn,"SELECT * FROM camera LIMIT 8");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/index.user.css">
    <link rel="stylesheet" href="../src/css/product.css">
    <title>Camera MP3</title>
</head>
<body>
  <div class="bs-example">
<?php
       if(isset($_SESSION['shopping_cart'])){
          $count  = count($_SESSION['shopping_cart']);
          navbarUsers($sessionUser,$count);
      } else{
          navbarUsers($sessionUser,'0');
      }
      
?>
    <br><br>
    <main-carousels></main-carousels>
    <div class="container mt-3">
        
        <h3 class="h3">recommend</h3>
        <div class="row">
<?php
  $x=1;
  while($x <= $row=mysqli_fetch_assoc($sql)){
    savePrice($row['camera_name'],$row['images'],number_format($row['price']),$row['camera_id'],$row['detail']);
  }
?>
        </div>
        <form action="index.php" method="POST">
          <user-modal></user-modal>
        </form>
         <div class="card text-center mt-3">
            <div class="card-header">ช่องทางการติดต่อ</div>
            <div class="card-body">
                <p class="card-text">มหาวิทยาลัยเกษตรศาสตร์  วิทยาเขตศรีราชา 199 ม.6 ต.ทุ่งสุขลา อ.ศรีราชา จ.ชลบุรี 20230</p>
                <p class="card-text"> โทร 0753148890</p>
                <!-- <a href="https://web.facebook.com/profile.php?id=100009554539757" class="btn btn-primary">facebook</a> -->
            </div>
            <div class="card-footer text-muted">&nbsp;</div>
         </div>
    </div>
  </div>
  <script src="../src/js/card.modal.js"></script>
</body>
</html>

<?php
}
?>