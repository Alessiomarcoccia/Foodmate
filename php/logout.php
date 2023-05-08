<!DOCTYPE html>
<html>
    <head></head>
    <body>
    <?php
        if($_GET['action'] == 'logout')
        {
          header("Location:../html/index.html");
          session_start();
          setcookie('cookiename', NULL);
          session_unset();
          session_destroy();
          echo 'Return to HomePage afeter 3s';
        }
    ?>