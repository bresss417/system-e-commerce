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
    $GetId = $_GET['camera_id'];
    $getCamera = mysqli_query($conn,"SELECT * FROM camera WHERE camera_id='$GetId' ");


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="imagetoolbar" content="no" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/index.staff.css">
    <link rel="stylesheet" href="../src/css/updateProduct.staff.css">
    <title>Page UpdateProduct</title>
</head>
<body>
  <div class="bs-example">
<?php
        navbarPlain($sessionUser);
?>
<br>
<br>
    <div class="container col-12">
      <div class="card">
<?php			
    foreach($getCamera as $show){
        $Caname = $show['camera_name'];
        $Cprice = $show['price'];
        $Cimg = $show['images'];
        $Cdetail = $show['detail'];
        $colorC = $show['color'];
        UpdateCamera($GetId,$Caname,$Cprice,$Cimg,$Cdetail,$colorC);
    }
?>		
	  </div>
    </div>
  </div>
<script src="../src/js/view.staff.js"></script>
</body>
</html>

<?php

}
?>