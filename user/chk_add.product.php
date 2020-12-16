<?php

session_start();
include('../components/connect.php');

   $ext = pathinfo(basename($_FILES['image']['name']), PATHINFO_EXTENSION);
    if($ext !=''){
        $new_img_name = 'img_'.uniqid().".".$ext;
        $image_path = "../images/";
        $upload_path = $image_path.$new_img_name;
        move_uploaded_file($_FILES['image']['tmp_name'], $upload_path);
        $photo = $new_img_name;
    }else{
        $photo = "null";
    }

 
 $u_id = $_POST['User_Id'];
 $c_id = $_POST['Camera_Id'];
 $f_name = $_POST['fname'];
 $l_name = $_POST['lname'];
 $phone = $_POST['phone'];

 /* mail address */
 $ads1 = $_POST['ads1'];
 $ads2 = $_POST['ads2'];
 $ads3 = $_POST['ads3'];
 $ads4 = $_POST['ads4'];
 $ads5 = $_POST['ads5'];
 $ads6 = $_POST['ads6'];
 $ads7 = $_POST['ads7'];

 $maxAddress = join(array($ads1,"  ",$ads2,"  ",$ads3," ",$ads4,"  ",$ads5,"  ",$ads6,"  ",'Thailand',"  ",$ads7));
 
 $price = $_POST['price'];
 $Qtys = $_POST['num1'];
 $PricesAll = $Qtys * $price;

 $Date = date('Y-m-d G:i:s');
 mysqli_query($conn, "BEGIN");

$sqli ="INSERT INTO order_system VALUES(null,'$f_name','$l_name','$phone','$Qtys','$maxAddress','$PricesAll','$Date','$photo','1','-')";
    $QuerySys = mysqli_query($conn,$sqli);

$maxFunction = "SELECT Max(order_id) AS order_id FROM order_system ";
$QueryMax = mysqli_query($conn,$maxFunction);
$RowMax = mysqli_fetch_array($QueryMax);
$IdOrder = $RowMax['order_id'];

$isqlDetail = "INSERT INTO order_detil VALUES(null,'$c_id','$IdOrder','$u_id','$Qtys','$PricesAll')";
    $QueryDetail = mysqli_query($conn,$isqlDetail);



    if($QuerySys && $QueryDetail){
        mysqli_query($conn,"COMMIT");
        $msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";
        if($_GET['getcameraID']){
          foreach($_SESSION['shopping_cart'] as $sKey => $reValue){
            if($reValue['C_id'] == $_GET['getcameraID']){
                unset($_SESSION['shopping_cart'][$sKey]);
            }
          }
        }
    }else{
        mysqli_query($conn, "ROLLBACK"); 
        echo  "บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ ";	
    }
 

?>
<script type="text/javascript">
	alert("<?php echo $msg;?>");
	window.location ='index.php';
</script>