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

 /* mail address */
 $ads1 = $_POST['ads1'];
 $ads2 = $_POST['ads2'];
 $ads3 = $_POST['ads3'];
 $ads4 = $_POST['ads4'];
 $ads5 = $_POST['ads5'];
 $ads6 = $_POST['ads6'];
 $ads7 = $_POST['ads7'];

$userId = $_POST['UserId'];
$qty = $_POST['QtyAll'];
$priceAll = $_POST['PriceAll'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phone = $_POST['phone'];
$maxAddress = join(array($ads1,"  ",$ads2,"  ",$ads3," ",$ads4,"  ",$ads5,"  ",$ads6,"  ",'Thailand',"  ",$ads7));
$Date = date('Y-m-d G:i:s');

mysqli_query($conn, "BEGIN");

/* insert OrderSystem Where address Contack*/
$isqlOrder = "INSERT INTO order_system VALUES(null,'$fname','$lname','$phone','$qty','$maxAddress','$priceAll','$Date','$photo','1','-')";
$QueryOrder = mysqli_query($conn,$isqlOrder);

//ฟังก์ชั่น MAX() จะคืนค่าที่มากที่สุดในคอลัมน์ที่ระบุ ออกมา หรือจะพูดง่ายๆก็ว่า ใช้สำหรับหาค่าที่มากที่สุด นั่นเอง
$maxFunction = "SELECT Max(order_id) AS order_id FROM order_system ";
$QueryMax = mysqli_query($conn,$maxFunction);
$RowMax = mysqli_fetch_array($QueryMax);
$IdOrder = $RowMax['order_id'];

foreach($_SESSION['shopping_cart'] as  $keyValue){
    $IdProduct = $keyValue['C_id'];
    $ItemQty = $keyValue['Qty'];
    $queryS = mysqli_query($conn,"SELECT * FROM camera WHERE camera_id='$IdProduct' ");
    $RowSys = mysqli_fetch_array($queryS);
    $totla = $RowSys['price'] * $ItemQty;
    $isqlDetail = "INSERT INTO order_detil VALUES(null,'$IdProduct',$IdOrder,$userId,$ItemQty,$totla)";
    $QueryDetail = mysqli_query($conn,$isqlDetail);
}
    if($QueryOrder && $QueryDetail){
        mysqli_query($conn,"COMMIT");
        $msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";
        foreach($_SESSION['shopping_cart'] as $valueCart){
            unset($_SESSION['shopping_cart']);
        }
    }else{
        mysqli_query($conn, "ROLLBACK"); 
        $msg = "บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ ";	
    }

?>
<script type="text/javascript">
	alert("<?php echo $msg;?>");
	window.location ='index.php';
</script>