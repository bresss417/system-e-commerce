<?php
session_start();
include('components/connect.php');
include('components/link.script.php');
include('components/component.php');

$sql = mysqli_query($conn,"SELECT * FROM camera");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/index.css">
    <link rel="stylesheet" href="src/css/product.css">
    <title>Product Document</title>
</head>
<body>
    <div class="bs-example">
        <main-navbar></main-navbar>
        <br><br>
        <div class="container mt-3">
          
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <div class="row mt-3">
<?php
  $x=1;
  while($x <= $row=mysqli_fetch_assoc($sql)){
    cardCamera($row['camera_name'],$row['images'],$row['price'],$row['camera_id'],$row['detail']);
  }
?>
              </div>
            </div>
            
          </div>
        <main-modal></main-modal>
        <card-modal></card-modal>
        </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="src/js/card.modal.js"></script>
<script src="src/js/view.js"></script>
</body>
</html>