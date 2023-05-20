<?php

session_set_cookie_params(0);
session_start();
$email = $_SESSION['email'];
$dbconn = pg_connect("host=localhost password=Foodmate user=Foodmate port=5432 dbname=progetto")
    or die("Errore di connessione: " . pg_last_error());

if ($dbconn) {

    $q1 = " select p.nome,c.quantita
            from contiene c,provvista p
            where c.nomeutente = $1 and p.id = c.provvista and c.quantita < 5;";

    $result = pg_query_params($dbconn, $q1, array($email));
    $data = array();
    while ($row = pg_fetch_assoc($result)) {
        $data[] = $row;
    }

    $json_data = json_encode($data);
    echo ($json_data);
    pg_close($dbconn);
}
?>