<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: /");
}
else {
    $dbconn = pg_connect("host=localhost port=5432 dbname=progetto
                user=Foodmate password=Foodmate") 
                or die('Could not connect: ' . pg_last_error());
}
?>
<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <?php
            if ($dbconn) {
                session_start();
                session_set_cookie_params(0);
                $email = $_POST['inputEmail'];
                $q1 = "select * from utenti where email= $1";
                $result = pg_query_params($dbconn, $q1, array($email));
                if (!($tuple=pg_fetch_array($result, null, PGSQL_ASSOC))) {
                    echo "<h1>Non sembra che ti sia registrato/a</h1>
                        <a href=registrazione.html> Clicca qui per farlo </a>";
                }
                else {
                    $password = $_POST['inputPassword'];
                    $q2 = "select * from utenti where email = $1 and psw = $2";
                    $result = pg_query_params($dbconn, $q2, array($email,$password));
                    if (!($tuple=pg_fetch_array($result, null, PGSQL_ASSOC))) {
                        echo "<h1> La password e' sbagliata! </h1>
                            <a href=login.html> Clicca qui per loggarti </a>";
                    }
                    else {
                        header("Location: ../html/dashboard.html");
                        $_SESSION['email'] = $email;
                    }
                }
                pg_close($dbconn);
            }
        ?> 
    </body>
</html>