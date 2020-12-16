
<?php
session_start();
include('components/connect.php');

$user_name = $_POST['username'];
$passwd = $_POST['password'];

$sql = "SELECT * FROM user_data WHERE username='$user_name' && passwd='$passwd'";
$que = mysqli_query($conn,$sql) or die(mysqli_error());
$num = mysqli_fetch_assoc($que);
$_SESSION['status']=$num['status'];
    if($num['status'] == 'admin'){
        $_SESSION['user_data'] = $num;
        echo '
        <script type="text/javascript">
            alert("ยินต้อนรับ คุณ admin");
            window.location = "admin";
        </script>';
    }else if($num['status']== 'staff'){
        $_SESSION['user_data'] = $num;
        echo '
        <script type="text/javascript">
            alert("ยินต้อนรับ คุณ staff");
            window.location = "staff";
        </script>';
    }else if($num['status'] == 'user'){
        $_SESSION['user_data'] = $num;
        echo '
        <script type="text/javascript">
            alert("ยินต้อนรับ คุณ user");
            window.location = "user";
        </script>';
    }else{
        echo '
        <script type="text/javascript">
            alert("username or password IS not Null");
            window.location = "index.php";
        </script>';
    }

?>