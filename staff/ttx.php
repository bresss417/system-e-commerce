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
    $que = mysqli_query($conn,"SELECT * FROM order_detil 
            INNER JOIN order_system ON order_system.order_id = order_detil.o_id 
              INNER JOIN  camera ON order_detil.c_id = camera.camera_id
                INNER JOIN user_data ON order_detil.u_id = user_data.user_id");

?>

<!DOCTYPE html >
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
	<script type="text/javascript" src="../lib/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="../lib/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="../lib/fancybox/jquery.fancybox-1.3.4.css" media="screen">
    <script>
		!window.jQuery && document.write(`<script src="../lib/jquery-1.4.3.min.js"></script>`)
	</script>
    <link rel="stylesheet" href="../src/css/index.staff.css">
    <link rel="stylesheet" href="../src/css/orders.staff.css">
    <title>Staff Page</title>
</head>
<body>
  <div class="bs-example">
<?php
        navbarStaff($sessionUser);
?>
    <br><br>
    <div class="container mt-3">
        <h3 class="h3">รายการสั่ง ที่ user ซื่อ </h3>
        <div class="col-md-12">
<?php

  foreach($que as $value){
    $cameraName = $value['camera_name'];
    $cameraImg = $value['images'];
    $userName = $value['name_last'];
    $ferstName = $value['ferst_name'];
    $lastName = $value['last_name'];
    $phone = $value['phone'];
    $Qty = $value['qty'];
    $Adress = $value['address'];
    $priceAll = $value['price_all'];
    $Date = $value['currents_date'];
    $sliptImg = $value['img_slipt'];
    $statusPay = $value['status_pay'];
    $ChengData =  changeDate($Date);
    if($value['order_id'] == $value['o_id']){
        ordersList($cameraName,$cameraImg,$userName,$ferstName,$lastName,$phone,$Qty,$Adress,$priceAll,$ChengData,$sliptImg,$statusPay);
    }
  }
?>
            
        </div>
        <staff-modal></staff-modal>
    </div>
  </div>
  <script src="../lib/script.js"></script>
  <script src="../src/js/view.staff.js"></script>
</body>
</html>

<?php
}
?>