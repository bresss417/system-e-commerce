<?php
    $conn = new mysqli("localhost","root","","chimera_ant");
        mysqli_set_charset($conn,'utf8');
        if(!$conn){
            die("not connect !");
        }
?>