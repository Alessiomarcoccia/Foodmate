<?php
    session_set_cookie_params(0);
    session_start();
    $email = $_SESSION['email'];
    $dbconn = pg_connect("host=localhost password=Foodmate user=Foodmate port=5432 dbname=progetto")
      or die("Errore di connessione: " . pg_last_error());

    if($dbconn) {
      $password_cur = $_POST['current_password'];
      $password_new = $_POST['new_password'];
      $nome_cur = $_POST['current_nome'];
      $nome_new = $_POST['new_nome'];

      $query_psw = "UPDATE utenti 
                SET psw = '$password_new'
                WHERE psw = '$password_cur'";
      
      $result_psw = pg_query($dbconn, $query_psw);

      $query_nome = "UPDATE utenti 
      SET nome = '$nome_new'
      WHERE nome = '$nome_cur'";

      $result_nome = pg_query($dbconn, $query_nome);  
      
      
  }

      header('Location:../html/profilo.html');
      pg_close($conn);
  ?>
