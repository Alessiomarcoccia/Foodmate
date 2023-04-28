<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: /");
}
else {
    $dbconn = pg_connect("host=localhost port=5432 dbname=Accedi
                user=postgres password=liuxing8896") 
                or die('Could not connect: ' . pg_last_error());
}
?>
<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <?php
            if ($dbconn) {
                $email = $_POST['inputEmail'];
                $q1 = "select * from utente where email= $1";
                $result = pg_query_params($dbconn, $q1, array($email));
                if (!($tuple=pg_fetch_array($result, null, PGSQL_ASSOC))) {
                    echo "<h1>Non sembra che ti sia registrato/a</h1>
                        <a href=registrazione.html> Clicca qui per farlo </a>";
                }
                else {
                    $password = $_POST['inputPassword'];
                    $q2 = "select * from utente where email = $1 and paswd = $2";
                    $result = pg_query_params($dbconn, $q2, array($email,$password));
                    if (!($tuple=pg_fetch_array($result, null, PGSQL_ASSOC))) {
                        echo "<h1> La password e' sbagliata! </h1>
                            <a href=login.html> Clicca qui per loggarti </a>";
                    }
                    else {
                        $nome = $tuple['nome'];
                        echo "<a href=logged.html> Premi qui </a>
                            per inziare a usare il sito";
                    }
                }
            }
        ?> 
    </body>
</html>