<?php

session_start();
include('../components/connect.php');

$order_id = $_GET['orderID'];
$p_number = $_POST['p_number'];
    $update = "UPDATE order_system SET status_pay='approve',p_number='$p_number' WHERE order_id='$order_id'";
    $query=mysqli_query($conn,$update);
        if($query == TRUE){
            echo "
            <script>
                alert('ทำการอนุมัติ เรียบร้อยแล้ว');
                window.location = 'orders.php';
            </script>
        ";
        }else{
            echo "error";
        }

?>