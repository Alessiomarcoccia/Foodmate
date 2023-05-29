<?php
    session_set_cookie_params(0);
    session_start();
    //ottengo l'email dell'utente loggato
    $email = $_SESSION['email'];

    //ottengo i dati dalla form
    $scadenza = $_POST['expDate'];
    $quantita = $_POST['quantita'];
    $tipologia = $_POST['tipoProvvista'];
    $id = $_POST['id'];
    $name = $_POST['name'];
    $frigo = $_POST['nomeFrigo'];

    $dbconn = pg_connect("host=localhost password=Foodmate user=Foodmate port=5432 dbname=progetto")
    or die("Errore di connessione: " . pg_last_error());

if ($dbconn) {
    $idP = $id;
    $q1 = "insert into provvista(id,nome,datascadenza,tipo) values (default,$1,$2,$3) returning id";
    $result = pg_query_params($dbconn, $q1, array($name, $scadenza, $tipologia));
    $tuple = pg_fetch_array($result, null, PGSQL_ASSOC);
    $id = $tuple['id'];

    //inserisco la provvista nella tabella contiene
    $q2 = "insert into contiene(nomedispensa,nomeutente,provvista,quantita) values ($1,$2,$3,$4)";
    $data = pg_query_params($dbconn, $q2, array($frigo, $email, $id, $quantita));

    //elimino dalla lista della spesa l'elemento aggiunto
    $q3 = "delete from spesa where id = $1";
    $result = pg_query_params($dbconn, $q3, array($idP));

    //ottengo i dati della lista della spesa che dovrà essere stampata
    $q1 = "select id, nome, descrizione 
               from spesa
                where nomeutente=$1 ";
    $result = pg_query_params($dbconn, $q1, array($email));

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
    } 
    pg_close($dbconn);


?>