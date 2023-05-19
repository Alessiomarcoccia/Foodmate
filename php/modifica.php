<?php
    session_set_cookie_params(0);
    session_start();
    $email = $_SESSION['email'];
    $dbconn = pg_connect("host=localhost password=Foodmate user=Foodmate port=5432 dbname=progetto")
      or die("Errore di connessione: " . pg_last_error());

    if($dbconn) {
      $password_cur = $_POST['current_password'];
      $password_new = $_POST['new_password'];
      
      $query_psw = "UPDATE utenti 
                SET psw = '$password_new'
                WHERE psw = '$password_cur'";
      
      $result_psw = pg_query($dbconn, $query_psw);

      if($_POST['nome'] != NULL){
      $query_nome = "UPDATE utenti 
      SET nome = '$_POST[nome]'
      WHERE email = '$email'";
      $result_nome = pg_query($dbconn, $query_nome);
      }

      if($_POST['cognome'] != NULL){
      $query_cognome = "UPDATE utenti
                     SET cognome = '$_POST[cognome]'
                     WHERE email = '$email'";
      $result_cognome = pg_query($dbconn, $query_cognome);  
      }

      if($_POST['sesso'] != NULL){
      $query_sesso = "UPDATE utenti
                    SET sesso = '$_POST[sesso]'
                    WHERE email = '$email'";
      $result_sesso = pg_query($dbconn, $query_sesso);
      }

     
        $image = $_FILES['foto'];
        $targetPath = '../images/' . $image['name'];

        if (move_uploaded_file($image['tmp_name'], $targetPath)) {
        $query = "UPDATE utenti
                  SET foto = '$targetPath'
                  WHERE email = '$email'";
        $result = pg_query($dbconn, $query);
        }
      } 
      
     
      header('Location:../html/profilo.html');
      pg_close($dbconn);
  ?>
