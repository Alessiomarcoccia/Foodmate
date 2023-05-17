<?php
session_set_cookie_params(0);
session_start();
$email = $_SESSION['email'];
$nomeFrigorifero = $_SESSION['nomeFrigorifero'];
$id = $_POST['idProvvista'];
$dbconn = pg_connect("host=localhost password=Foodmate user=Foodmate port=5432 dbname=progetto")
    or die("Errore di connessione: " . pg_last_error());

if ($dbconn) {
    $q1 = "delete from contiene where provvista=$1 and nomeDispensa=$2 and nomeUtente=$3";
    $result = pg_query_params($dbconn, $q1, array($id, $nomeFrigorifero, $email));
    if ($result) {
        $q2 = "delete from provvista where id=$1";
        $result = pg_query_params($dbconn, $q2, array($id));
    }

}

$response = array('nomeFrigorifero' => $nomeFrigorifero);
header('Content-Type: application/json');
echo json_encode($response);
pg_close($dbconn);
?>