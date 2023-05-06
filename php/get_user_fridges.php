<?php
session_set_cookie_params(0);
session_start();
$email = $_SESSION['email'];

$dbconn = pg_connect("host=localhost password=FoodMate user=FoodMate port=5432 dbname=progetto")
    or die("Errore di connessione: " . pg_last_error());

if ($dbconn) {
    $q1 = "select nome from dispensa where utente=$1";
    $result = pg_query_params($dbconn, $q1, array($email));
    $data = array();

    // Loop through the rows and add them to the data array
    while ($row = pg_fetch_assoc($result)) {
        $data[] = $row;
    }

    // Encode the data in JSON format
    $json_data = json_encode($data);

    // Output the JSON data
    header('Content-Type: application/json');
    echo ($json_data);
}

?>