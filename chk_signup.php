<?php
session_start();
include('components/connect.php');

$name = $_POST['name'];
$last = $_POST['last'];
$username = $_POST['username'];
$passwd = $_POST['password'];
$userfull = join(array($name,' ',$last));
$stt = "user";
$ss = mysqli_query($conn,"SELECT * FROM user_data WHERE username='$username'");
$num = mysqli_num_rows($ss);

    if($num == 1){
        echo "
            <script>
                alert('username นี้ มี อยู่แล้ว');
                window.location = 'index.php';
            </script>
            ";
    }else{
        $insert = mysqli_query($conn,"INSERT INTO user_data SET 
        name_last='$userfull',username='$username',passwd='$passwd',status='$stt'");
        if($insert){
                echo "
                    <script>
                        alert('สมัครสมาชิก เรียบร้อยแล้ว');
                        window.location = 'index.php';
                    </script>
            ";
            }else{
                echo "
                    <script>
                        alert('เพิ่มข้อมูลล้มเหลว');
                        window.location = 'index.php';
                    </script>
                ";
            }
    }

?>