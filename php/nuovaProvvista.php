<?php
session_set_cookie_params(0);
session_start();
$email = $_SESSION['email'];
$nomeFrigorifero = $_SESSION['nomeFrigorifero']; 
$dbconn = pg_connect("host=localhost password=Foodmate user=Foodmate port=5432 dbname=progetto")
    or die("Errore di connessione: " . pg_last_error());

if ($dbconn) {
    $nomeProvvista = $_POST['nomeProvvista'];
    $scadenza = $_POST['expDate'];
    $quantita = $_POST['quantita'];
    $tipologia = $_POST['tipoProvvista'];

    //creo la nuova provvista e ne prendo l'id  
    $q1 = "insert into provvista(id,nome,datascadenza,tipo) values (default,$1,$2,$3) returning id";
    $result = pg_query_params($dbconn, $q1, array($nomeProvvista, $scadenza, $tipologia));
    $tuple = pg_fetch_array($result, null, PGSQL_ASSOC);
    $id = $tuple['id'];

    //inserisco la provvista nella tabella contiene
    $q2 = "insert into contiene(nomedispensa,nomeutente,provvista,quantita) values ($1,$2,$3,$4)";
    $data = pg_query_params($dbconn, $q2, array($nomeFrigorifero, $email, $id, $quantita));
}
 
$response = array('nomeFrigorifero' => $nomeFrigorifero);
header('Content-Type: application/json');
echo json_encode($response);
pg_close($dbconn);

?>