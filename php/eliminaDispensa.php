<?php
session_set_cookie_params(0);
session_start();
$email = $_SESSION['email'];
$nomeFrigorifero = $_SESSION['nomeFrigorifero']; 
$dbconn = pg_connect("host=localhost password=Foodmate user=Foodmate port=5432 dbname=progetto")
    or die("Errore di connessione: " . pg_last_error());

if ($dbconn) {

    //elimina la dispensa selezionata
    $q1 = " delete from dispensa where nome=$1 and utente=$2;";
    $result = pg_query_params($dbconn, $q1, array($nomeFrigorifero,$email));
    $response = array('nomeFrigorifero' => $nomeFrigorifero);
    header('Content-Type: application/json');
    echo json_encode($response);
    pg_close($dbconn);

}


?>