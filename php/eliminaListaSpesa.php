<?php
    session_set_cookie_params(0);
    session_start();
    $email = $_SESSION['email'];
    $id = array_map('intval', $_POST['idProvviste']);
    $id = implode(',', $id);

    $dbconn = pg_connect("host=localhost password=Foodmate user=Foodmate port=5432 dbname=progetto") or die("Errore di connessione: " . pg_last_error());

    if ($dbconn) {
        $q1 = "delete from spesa where id in ($id)";
        $result = pg_query($dbconn, $q1);
    
        $q1 = "select id, nome, descrizione 
               from spesa
                where nomeutente=$1 ";
        $result = pg_query_params($dbconn, $q1,array($email));

    }


    // array dati
    $data = [];
    while ($row = pg_fetch_assoc($result)) {
        $data[] = $row;
    }

    // Encode the data in JSON format
    $json_data = json_encode($data);

    // Output the JSON data
    header('Content-Type: application/json');
    echo ($json_data);
    pg_close($dbconn);

?>