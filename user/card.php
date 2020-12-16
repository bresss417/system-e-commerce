<?php
  if(isset($_POST["ADD_carmera"])){
    if(isset($_SESSION["shopping_cart"])){
      $item_array_id = array_column($_SESSION["shopping_cart"], "C_id");
       if(!in_array($_POST["C_id"], $item_array_id)){
          $count = count($_SESSION["shopping_cart"]);
          $item_array= array(
            'Qty' => $_POST["Qty"],
            'C_id'     =>   $_POST["C_id"],
          
          );
          $_SESSION["shopping_cart"][$count] = $item_array;
          /* echo "<script type=\"text/javaScript\">
                swal.fire({
                    title: \"เพิ่มสินค้าเรียบร้อยแล้ว\",
                    icon: \"success\",
                    width: \"450px\",
                    showConfirmButton: true
                })</script>"; */

          
          echo "<script type=\"text/javaScript\">
                  alert(\"เพิ่มสินค้าเรียบร้อยแล้ว\")
                </script>";
          echo '<script>window.close()</script>';
          
       }else{
        /* echo "<script type=\"text/javaScript\">
                swal.fire({
                  title :\"มีสินค้านี้อยู่เเล้ว\",
                  icon:\"error\",
                  width:\"450px\",
                  showConfirmButton: true
                });</script>"; */
        echo "<script type=\"text/javaScript\">
                  alert(\"มีสินค้านี้ อยู่แล้ว\")
                </script>";
        echo '<script> window.close()</script>';
              
       }

    }else{
      $item_array= array(
        'Qty' => $_POST["Qty"],
        'C_id'     =>   $_POST["C_id"]
      ); 
    $_SESSION["shopping_cart"][0] = $item_array;
    }
      
  }
   
  
?>
