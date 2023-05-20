<?php

session_set_cookie_params(0);
session_start();
$email = $_SESSION['email'];
$dbconn = pg_connect("host=localhost password=Foodmate user=Foodmate port=5432 dbname=progetto")
    or die("Errore di connessione: " . pg_last_error());

if ($dbconn) {

    /* ritorna la quantita totale di provviste che scadono nello stesso mese per ogni mese */
    $q1 = "select sum(c.quantita) as quantita, extract(month from p.datascadenza) as mese 
           from provvista p ,contiene c
           where c.nomeutente= $1 and p.id = c.provvista
           group by mese 
           order by mese";
    $result = pg_query_params($dbconn, $q1, array($email));

    //crea due array vuoti,uno per le labels e uno per i valori
    $labels = array();
    $values =array();

    // Inserisce i risultati della query in due array
    while ($row = pg_fetch_assoc($result)) {
        $labels[] = $row['mese'];
        $values[] = $row['quantita'];
    }

    //incapsula labels e values in un unico array
    $data = array();
    $data['labels'] = $labels;
    $data['values'] = $values;

    // codifica i dati in formato JSON
    $json_data = json_encode($data);

    // Output the JSON data
    header('Content-Type: application/json');   
    echo ($json_data);
    pg_close($dbconn);
}


?>
