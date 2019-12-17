<?php
     //session_destroy();
     $hostname = $_SERVER['HTTP_HOST'];
     $path = dirname($_SERVER['PHP_SELF']);
     header('Location: ../mainlogin.php?action=delete&site=deleted');
?>