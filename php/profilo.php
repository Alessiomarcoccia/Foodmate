<?php
    session_set_cookie_params(0);
    session_start();
    $email = $_SESSION['email'];
    $dbconn = pg_connect("host=localhost password=Foodmate user=Foodmate port=5432 dbname=progetto")
      or die("Errore di connessione: " . pg_last_error());

    if($dbconn) {
      $query   = 'SELECT * FROM utenti WHERE email=$1';
      $result = pg_query_params($dbconn, $query,array($email));

      $data = array();
        while($row = pg_fetch_assoc($result)){
            $data[] = $row;
        }
        $json_data = json_encode($data);
    }
    
    /* header('Location:./profilo.html'); */
    header('Content-Type: application/json');
    echo ($json_data);
    pg_close($dbconn);
  ?>
