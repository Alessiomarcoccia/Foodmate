<?php
    session_set_cookie_params(0);
    session_start();
    //ottengo l'email dell'utente loggato
    $email = $_SESSION['email'];
    //ottengo i dati dalla form
    $nome = $_POST['nomeProvvista'];
    $descrizione = $_POST['descrizioneProvvista'];
    $dbconn = pg_connect("host=localhost password=Foodmate user=Foodmate port=5432 dbname=progetto") or die("Errore di connessione: " . pg_last_error());

    if ($dbconn) {

        //inserisco la provvista nella tabella che rappresenta la lista della spesa
        $q1 = "insert into spesa(nomeutente,id,nome,descrizione) values ($1,default,$2,$3) returning id";
        $result = pg_query_params($dbconn, $q1, array($email,$nome,$descrizione));
    
        //ottengo i dati della lista della spesa che dovrà essere stampata
        $q1 = "select id, nome, descrizione 
               from spesa
                where nomeutente=$1 ";
        $result = pg_query_params($dbconn, $q1,array($email));
        // array dati
        
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