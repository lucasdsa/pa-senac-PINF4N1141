<!DOCTYPE html>
<html>
<?php

    include 'public/header.php';
    
    echoHeader('Teste');
?>

<body>
    <div id="page">
        <button id="menuButton">+</button>
        <div id="header">
            <h1>Descubra a Web</h1>
        </div>

        <div id="content">
            <div id="menu" class="float">
                <ul id="menulist">
                    <li class="menuitem"><a id="home" href="/">Página inicial</a></li>
                    <li class="menuitem"><a id="articles" href="#">Artigos</a></li>
                    <li class="menuitem"><a id="game" href="tictactoe.html">Jogo da Velha</a></li>
                </ul>
            </div>
            <div id="text" class="float thin-border">

                <h2>Corpo</h2>

            </div>
        </div>

        <div id="footer">
            <p>Lucas Viegas</p>
        </div>
    </div>
</body>
</html>