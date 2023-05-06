<?php
session_set_cookie_params(0);
session_start();
$email = $_SESSION['email'];


$dbconn = pg_connect("host=localhost password=FoodMate user=FoodMate port=5432 dbname=progetto")
    or die("Errore di connessione: " . pg_last_error());

if ($dbconn) {

   /*query che seleziona tutti i tipi di provvista che si trovano nei frigororiferi di 
   un utente e la somma di tutte le quantità delle provviste aventi quel tipo*/
    $q1 = "select p.tipo as tipologia,sum(c.quantita) as quantita
            from provvista p,contiene c
            where p.id=c.provvista and c.nomeutente=$1
            group by p.tipo";
    $result = pg_query_params($dbconn, $q1, array($email));

    //crea due array vuoti,uno per le labels e uno per i valori
    $labels = array();
    $values =array();

    // Inserisce i risultati della query in due array
    while ($row = pg_fetch_assoc($result)) {
        $labels[] = $row['tipologia'];
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
}
pg_close($dbconn);




?>


