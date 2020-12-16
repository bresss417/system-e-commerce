<?php

session_start();
include('../components/connect.php');

$ext = pathinfo(basename($_FILES['image']['name']), PATHINFO_EXTENSION);
    if($ext !=''){
        $new_img_name = 'img_'.uniqid().".".$ext;
        $image_path = "../data/";
        $upload_path = $image_path.$new_img_name;
        move_uploaded_file($_FILES['image']['tmp_name'], $upload_path);
        $photo = $new_img_name;
    }else{
        $photo = $_POST["image"];
    }
    $c_name = $_POST['camera_name'];
    $c_price = $_POST['c_price'];
    $c_detail = $_POST['c_detail'];
    $color = $_POST['c_color'];

    $Insert = "INSERT INTO camera(camera_name,price,images,detail,color)VALUES('$c_name','$c_price','$photo','$c_detail','$color')";
    $query = mysqli_query($conn,$Insert) or die(mysqli_error());
        if($query){
            echo "
                    <script>
                        alert('เพิ่ม สินค้า เรียบร้อยแล้ว');
                        window.location = 'index.php';
                    </script>
                ";
        }else{
            echo "
                    <script>
                        alert('ล้มเหลว เกิดข้อผิดพลาด ไม่สามารถเพิ่มสินค้าได้');
                        window.location = 'index.php';
                    </script>
                ";
        }
        mysqli_close($conn);

?>