<?php

$data = <<<EOD
<div class="sidebar">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="../html/index.html">
                    <strong>Foodmate</strong>
                </a>
            </li>
            <li>
                <a href="dashboard.html" class="lang" key="home">
                    <i class="fas fa-home"></i>
               <!--  <a href="dashboard.html" class="lang" key="home"></a> -->
                </a>      
            <li>
                <a href="profilo.html" class="lang" key="profilo">
                    <i class="fas fa-user"></i>
                </a>
            </li>
            <li>
                <a href="statistiche.html" class="lang" key="statistiche">
                    <i class="fa-sharp fa-solid fa-chart-simple"></i>
                </a>
            </li>
            <li>
                <a href="ricette.html" class="lang" key="ricette">
                <i class="fa-solid fa-list-ul"></i>
                </a>
            <li>
                <a href="#" class="lang" key="logout">
                <i class="fa-solid fa-right-from-bracket"></i>
                </a>
            </li> 
        </ul>
    </div>
EOD;

header('Content-Type: html/text');
echo ($data);

?>

<script src="../js/traduzione.js"></script> 