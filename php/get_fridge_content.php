<?php
    session_set_cookie_params(0);
    session_start();
    $email = $_SESSION['email'];
    $nomeFrigo = $_GET['nomeFrigorifero'];
    $_SESSION['nomeFrigorifero'] = $nomeFrigo;
    $dbconn = pg_connect("host=localhost password=Foodmate user=Foodmate port=5432 dbname=progetto") or die("Errore di connessione: " . pg_last_error());

    if($dbconn){
        $q1 = "SELECT p.nome as nome,p.dataScadenza as dataScadenza,p.tipo as tipologia,c.quantita as quantita,p.id as id
                FROM contiene c,provvista p
                WHERE nomeDispensa = $1 AND nomeUtente = $2 AND c.provvista = p.id";
        $result = pg_query_params($dbconn, $q1, array($nomeFrigo,$email));

        //codifica dei dati in formato JSON
        $data = array();
        while($row = pg_fetch_assoc($result)){
            $data[] = $row;
        }
        $json_data = json_encode($data);

        //output del JSON
        header('Content-Type: application/json');
        echo ($json_data);
        pg_close($dbconn);
    }
    


?>