<?php

$data = <<<EOD
    <footer>
        <div class="footer-selection">
            <div class="left-selection">
                <h3>FoodMate</h3>
            </div>
            <div class="right selection">
                <a href="https://github.com/Alessiomarcoccia/Foodmate"><img src="../assets/icons/GitHub.png" alt="GitHub"></a>
            </div>
        </div>
    </footer>
EOD;
header('Content-Type: html/text');
echo ($data);

?>
