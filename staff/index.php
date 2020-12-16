<?php

session_start();
include('../components/connect.php');
include('../components/component.staff.php');
include('../components/link.script.php');
if(!isset($_SESSION['user_data'])){
    echo "
            <script>
                alert('pless your login');
                window.location = '../index.php';
            </script>
        ";
}else{
    $sessionUser = $_SESSION['user_data']['name_last'];
    $que = mysqli_query($conn,"SELECT * FROM camera");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/index.staff.css">
    <title>Staff Page</title>
</head>
<body>
  <div class="bs-example">
<?php
        navbarStaff($sessionUser);
?>
    <br><br>
    <div class="container mt-3">
        <h3 class="h3">&nbsp;</h3>
        
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="row mt-3">
<?php
$i=0;
  while($i < $row=mysqli_fetch_assoc($que)){
    cardStaff($row['camera_name'],$row['images'],$row['price'],$row['camera_id']);
  }
?>
               
            </div>
          </div>
        </div>
        <staff-modal></staff-modal>
    </div>
  </div>
  <script src="../src/js/view.staff.js"></script>
</body>
</html>

<?php
}
?>

