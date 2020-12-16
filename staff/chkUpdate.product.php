<?php

include('../components/connect.php');

$Cid = $_POST['Cid'];
$Cname = $_POST['C_name'];
$Cdetail = $_POST['C_detail'];
$Cprice = $_POST['C_price'];
$color = $_POST['C_color'];

$update = "UPDATE camera SET camera_name='$Cname',price='$Cprice',detail='$Cdetail',color='$color' WHERE camera_id ='$Cid'";
$query = mysqli_query($conn,$update);

    if($query){
        echo "
                <script>
                    alert('update สินค้า เรียบร้อยแล้ว');
                    window.location = 'update.product.php?camera_id=$Cid';
                </script>
            ";
    }else{
        echo "
                <script>
                    alert('ล้มเหลว เกิดข้อผิดพลาด ไม่สามารถเพิ่มสินค้าได้');
                    window.location = 'update.product.php?camera_id=$Cid';
                </script>
            ";
    }

?>