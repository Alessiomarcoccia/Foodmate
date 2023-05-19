<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: /");
}
else {
    $dbconn = pg_connect("host=localhost password=Foodmate user=Foodmate port=5432 dbname=progetto") 
                or die("Errore di connessione: " .pg_last_error()); 
}
?>
<!DOCTYPE html> 
<html>
    <head></head>
    <body>
        <?php
            session_set_cookie_params(0);
            session_start();
            if ($dbconn) {
                $email = $_POST['inputEmail'];
                $q1="select * from utenti where email= $1";
                $result=pg_query_params($dbconn, $q1, array($email));
                if ($tuple=pg_fetch_array($result, null, PGSQL_ASSOC)) {
                    echo "<h1> Spiacente, l'indirizzo email non e' disponibile</h1>
                        Se vuoi, <a href=../login> clicca qui per loggarti </a>";
                }
                else {
                    $nome = $_POST['inputName'];
                    $cognome = $_POST['inputSurname'];
                    $psw = $_POST['inputPassword'];
                    $foto = '';
                    $sesso = $_POST['inputSesso'];
                    $q2 = "insert into utenti values ($1,$2,$3,$4,$5,$6)";
                    $data = pg_query_params($dbconn, $q2,
                        array($nome, $cognome, $email, $psw, $sesso, $foto));
                    if ($data) {
                       header("Location: ../html/dashboard.html");
                       $_SESSION['email'] = $email;
                    }
                }
                pg_close($dbconn);
            }
            
        ?> 
    </body>
</html>