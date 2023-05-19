<?php

session_set_cookie_params(0);
session_start();
$email = $_SESSION['email'];
$dbconn = pg_connect("host=localhost password=Foodmate user=Foodmate port=5432 dbname=progetto")
    or die("Errore di connessione: " . pg_last_error());

if ($dbconn) {

    /* seleziona tutte le ricette i cui ingredienti sono disponibili nelle dispense dell'utente*/
    $q1 = "SELECT r.nome, r.tempo, r.pasto
           FROM ricetta r
           WHERE NOT EXISTS (
                SELECT x.nome
                FROM ingrRic ir
                LEFT JOIN (SELECT p.nome 
                           FROM provvista p,contiene c
                           WHERE c.nomeutente=$1 AND p.id = c.provvista
                          )x ON x.nome = ir.ingrediente
                WHERE ir.ricetta = r.nome AND x.nome IS NULL    
  );";
    
    $result = pg_query_params($dbconn, $q1, array($email));

    //codifica dei dati in formato JSON
    $data = array();
    while ($row = pg_fetch_assoc($result)) {
        $data[] = $row;
    }
    $json_data = json_encode($data);
    //output del JSON
    header('Content-Type: application/json');
    echo ($json_data);
    pg_close($dbconn);
}
?>