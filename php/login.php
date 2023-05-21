<?php
$dbconn = pg_connect("host=localhost port=5432 dbname=progetto user=Foodmate password=Foodmate")
    or die('Could not connect: ' . pg_last_error());

if ($dbconn) {
    session_set_cookie_params(0);
    session_start();

    $email = $_POST['inputEmail'];
    $q1 = "SELECT * FROM utenti WHERE email = $1";
    $result = pg_query_params($dbconn, $q1, array($email));

    if (!($tuple = pg_fetch_array($result, null, PGSQL_ASSOC))) {
        $error = "Spiacente, l'indirizzo email non e' disponibile";
        echo json_encode(array('error' => $error));
    } else {
        $password = $_POST['inputPassword'];
        $q2 = "SELECT * FROM utenti WHERE email = $1 AND psw = $2";
        $result = pg_query_params($dbconn, $q2, array($email, $password));

        if (!($tuple = pg_fetch_array($result, null, PGSQL_ASSOC))) {
            $error = "Spiacente, la password non e' corretta";
            echo json_encode(array('error' => $error));
        } else {
            $_SESSION['email'] = $email;
            $success = "Login effettuato con successo";
            echo json_encode(array('success' => $success));
        }
    }

    pg_close($dbconn);
}

?>
