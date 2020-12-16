
<?php
session_start();
include('components/connect.php');
include('components/link.script.php');
include('components/component.php');

$sql = mysqli_query($conn,"SELECT * FROM camera LIMIT 8");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/index.css">
    <link rel="stylesheet" href="src/css/carousel.css">
    <link rel="icon" type="image/png" href="src/image/iicon.jpg"/>
    <title>Camera MP3</title>
</head>
<body>
  <div class="bs-example ">
    <main-navbar></main-navbar>
    <br>
        <main-carousel></main-carousel>
      
    <div class="container">
      <hr>
        <h3 class=" text-center text-info">สินค้าที่แนะนำ</h3>
      <div class="row">
<?php
  $x=1;
  while($x <= $row=mysqli_fetch_assoc($sql)){
    saveCart($row['camera_name'],$row['images'],$row['price'],$row['camera_id'],$row['detail']);
  }
?>

      </div>
      <!--/.Carousel Wrapper-->
      <br>
        <div class="card text-center mt-3">
            <div class="card-header">ช่องทางการติดต่อ</div>
            <div class="card-body">
                <p class="card-text">มหาวิทยาลัยเกษตรศาสตร์  วิทยาเขตศรีราชา 199 ม.6 ต.ทุ่งสุขลา อ.ศรีราชา จ.ชลบุรี 20230</p>
                <p class="card-text"> โทร 0753148890</p>
                <!-- <a href="https://web.facebook.com/profile.php?id=100009554539757" class="btn btn-primary">facebook</a> -->
            </div>
            <div class="card-footer text-muted">&nbsp;</div>
        </div> 
        <main-modal></main-modal>
        <card-modal></card-modal>
    </div>
  </div>
  
<script src="src/js/card.modal.js"></script>
<script src="src/js/view.js"></script>
</body>
</html>