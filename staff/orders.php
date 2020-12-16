<?php

session_start();
include('../components/connect.php');
include('../components/component.staff.php');
include('../components/link.script.php');
include('../components/orderAll.staff.php');

if(!isset($_SESSION['user_data'])){
    echo "
            <script>
                alert('pless your login');
                window.location = '../index.php';
            </script>
        ";
}else{
    $sessionUser = $_SESSION['user_data']['name_last'];
    $selectQrderSystem = mysqli_query($conn,"SELECT * FROM order_system");

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
    <link rel="stylesheet" href="../src/css/orderall.staff.css">
    <title>Staff Page</title>
</head>
<body>
  <div class="bs-example">
<?php
        navbarStaff($sessionUser);
?>

    <div class="container">

	    <div class="row">
	<!-- Contenedor Principal -->
            <div class="comments-container">
                <ul id="comments-list" class="comments-list">
<?php
    for($num =1;$num <= $keyOrder = mysqli_fetch_assoc($selectQrderSystem);$num++){


        		  echo"<li>";
         
                    OrderContactUser($keyOrder['order_id'],$keyOrder['ferst_name'],$keyOrder['last_name'],$keyOrder['phone'],$keyOrder['address'],dateTime($keyOrder['currents_date']),number_format($keyOrder['price_all']),$keyOrder['qty'],$keyOrder['img_slipt'],$keyOrder['status_pay']);
 
$que = mysqli_query($conn,"SELECT * FROM order_detil INNER JOIN order_system ON order_system.order_id = order_detil.o_id 
              INNER JOIN  camera ON order_detil.c_id = camera.camera_id INNER JOIN user_data ON order_detil.u_id = user_data.user_id");

         for( $x = 1;$x <= $rows = mysqli_fetch_assoc($que);$x++){
             if($rows['o_id'] == $keyOrder['order_id']){
          			
        			  echo"<ul class=\"comments-list reply-list\">";
        				    echo"<li>";

                    detailOrder($rows['camera_name'],$rows['images'],number_format($rows['price']),$rows['qtyall'],number_format($rows['subtotal']));

        			      echo"</li>";
                echo"</ul>";
                }
            }                    
              echo"</li>"; 
?>
                    <div style="display: none;">
                        <div id="inline1" style="width:450px;height:120px;overflow:auto;">
                          <div class="container">
                            <p class="text-center text-secondary">&nbsp;</p>
                            <form action="update_status.php?orderID=<?php echo $keyOrder['order_id'];  ?>" class="row" method="POST">
                                   &nbsp;&nbsp;&nbsp; <div class="form-group col-6">
                                      <input type="text" placeholder="แจ้งเลขพัสดุ" name="p_number" class="form-control form-control-sm validate" required>
                                    </div>
                                    <div class="form-group col-4">
                                        <button type="submit" class="btn btn-primary">update</button>
                                    </div>
                            </form>
                          </div>
	                	</div>
	                </div>
<?php         
    }
?>
                    
                </ul>
        	</div>
        </div>
    </div>          
        
      <staff-modal></staff-modal>
  </div>
  <script src="../lib/script.js"></script>
  <script src="../src/js/view.staff.js"></script>
</body>
</html>

<?php
}
?>