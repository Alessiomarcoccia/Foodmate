<?php

session_set_cookie_params(0);
session_start();
$email = $_SESSION['email'];

$dbconn = pg_connect("host=localhost password=Foodmate user=Foodmate port=5432 dbname=progetto")
    or die("Errore di connessione: " . pg_last_error());

if ($dbconn) {

    $labels = array();
    $values = array();
   
    //ritorna la quantita totale di provviste scadute
    $q1 = " select sum(c.quantita) as scaduti
            from provvista p,contiene c
            where p.id=c.provvista and c.nomeutente=$1 and p.dataScadenza<current_date;";
    $result = pg_query_params($dbconn, $q1, array($email));
    while ($row = pg_fetch_assoc($result)) {
        $labels[] = "scaduti";
        $values[] = $row['scaduti'];
    }

    //ritorna la quantita totale di provviste che scadono entro una settimana
    $q2 = " select sum(c.quantita) as scadenzaProssima
            from provvista p,contiene c
            where p.id=c.provvista and c.nomeutente=$1 and p.dataScadenza>=current_date and p.dataScadenza<=current_date+7;";
    $result = pg_query_params($dbconn, $q2, array($email));
    while ($row = pg_fetch_assoc($result)) {
        $labels[] = "scadenza prossima";
        $values[] = $row['scadenzaprossima'];
    }

    //ritorna la quantita totale di provviste che scadono entro un mese
    $q3 = " select sum(c.quantita) as ottimoStato
            from provvista p,contiene c
            where p.id=c.provvista and c.nomeutente=$1 and p.dataScadenza>current_date+7;";
    $result = pg_query_params($dbconn, $q3, array($email));

    while ($row = pg_fetch_assoc($result)) {
        $labels[] = "ottimo stato";
        $values[] = $row['ottimostato'];
    }

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