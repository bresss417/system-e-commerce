<?php 

    session_start();
    session_destroy();
    echo "
        <script>
            alert('Logout to Successs');
            window.location = '../index.php';
        </script>
    ";

?>