<?php

$data = <<<EOD
<div class="sidebar">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="/">
                    <strong>Foodmate</strong>
                </a>
            </li>
            <li>
                <a href="dashboard.html">
                    <i class="fas fa-home"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-user"></i>
                    Profilo
                </a>
            </li>
            <li>
                <a href="statistiche.html">
                    <i class="fa-sharp fa-solid fa-chart-simple"></i>
                    Statistiche
                </a>
            </li>
        </ul>
    </div>
EOD;

header('Content-Type: html/text');
echo ($data);

?>