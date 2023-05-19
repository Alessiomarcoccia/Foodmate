<?php
    session_set_cookie_params(0);
    session_start();
    $email = $_SESSION['email'];
    $dbconn = pg_connect("host=localhost password=Foodmate user=Foodmate port=5432 dbname=progetto")
    or die("Errore di connessione: " . pg_last_error());

if ($dbconn) {
    $nome = $_POST['nomeDispensa'];
    //controlla se esiste già una dispensa con quel nome,se c'è non fa nulla, altrimenti la crea
    $q1="select * from dispensa where nome= $1 and utente=$2";
    $result=pg_query_params($dbconn, $q1, array($nome,$email));
    if (!($tuple=pg_fetch_array($result, null, PGSQL_ASSOC))) {
        $q2 = "insert into dispensa values ($1,$2)";
        $data = pg_query_params($dbconn, $q2,array($nome, $email));
        }
    }
    header("Location: ../html/dashboard.html");
    pg_close($dbconn);
?>