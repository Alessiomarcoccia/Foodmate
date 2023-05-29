<?php
session_set_cookie_params(0);
session_start();
//ottengo i dati dalla sessione
$email = $_SESSION['email'];
$nomeFrigorifero = $_SESSION['nomeFrigorifero'];
//ottengo i dati dalla richiesta
$id = $_POST['idProvvista'];
$value = $_POST['valore'];
$dbconn = pg_connect("host=localhost password=Foodmate user=Foodmate port=5432 dbname=progetto") or die("Errore di connessione: " . pg_last_error());

//aggiorno la quantità della provvista
//se il valore è 1 allora incremento la quantità
if ($value == "1") {
    if ($dbconn) {
        $q1 = "UPDATE contiene SET quantita = quantita +1 WHERE provvista = $1;";
        $result = pg_query_params($dbconn, $q1, array($id));
    }
} 
//altrimenti decremento la quantità
else
{
    $q1 = "UPDATE contiene SET quantita = quantita -1 WHERE provvista = $1;";
    $result = pg_query_params($dbconn, $q1, array($id));
}

$response = array('nomeFrigorifero' => $nomeFrigorifero);

//output del JSON
header('Content-Type: application/json');
echo json_encode($response);
pg_close($dbconn);
?>