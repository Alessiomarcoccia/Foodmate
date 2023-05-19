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
                <a href="dashboard.html" class="langSidebar" key="home">
                    <i class="fas fa-home"></i>
                    <span class="link-text"></span>
                </a>      
            <li>
                <a href="profilo.html" class="langSidebar" key="profilo">
                    <i class="fas fa-user"></i>
                    <span class="link-text"></span>
                </a>
            </li>
            <li>
                <a href="statistiche.html" class="langSidebar" key="statistiche">
                    <i class="fa-sharp fa-solid fa-chart-simple"></i>
                    <span class="link-text"></span>
                </a>
            </li>
            <li>
                <a href="listaSpesa.html" class="langSidebar" key="lista spesa">
                    <i class="fa-sharp fa-solid fa-chart-simple"></i>
                    <span class="link-text"></span>
                </a>
            </li>
            <li>
                <a href="ricette.html" class="langSidebar" key="ricette">
                    <i class="fa-solid fa-list-ul"></i>
                    <span class="link-text"></span>
                </a>
            <li>
                <a href="../php/logout.php?action=logout" class="langSidebar" key="logout" >
                     <i class="fa-sharp fa-solid fa-sign-out"></i>
                     <span class="link-text"></span>
                </a>
            </li>
        </ul>
    </div>
EOD;

header('Content-Type: html/text');
echo ($data);

?>

<script src="../js/traduzione.js"></script> 