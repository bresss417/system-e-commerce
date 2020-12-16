<?php
session_start();
include('../components/connect.php');
$c_id = $_GET['camera_id'];
    $De = mysqli_query($conn,"DELETE FROM camera WHERE camera_id='$c_id' LIMIT 1");
    if($De){
        echo "
            <script>
                alert('ทำการลบ เรียบร้อยแล้ว');
                window.location = 'index.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('error เกิดข้อผิดพลาด');
                window.location = 'index.php';
            </script>
        ";
    }
    mysqli_close($conn);
?>