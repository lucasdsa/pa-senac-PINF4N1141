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
            <div id="menu">
                <ul id="menulist">
                    <li class="menuitem"><a id="home" href="/">Página inicial</a></li>
                    <li class="menuitem"><a id="articles" href="#">Artigos</a></li>
                    <li class="menuitem"><a id="game" href="#">Competências</a></li>
                    <li class="menuitem"><a id="articles" href="#">Experiências</a></li>
                    <li class="menuitem"><a id="articles" href="#">Interesses</a></li>
                    <li class="menuitem"><a id="articles" href="#">Pessoal</a></li>
                </ul>
            </div>
            <div id="text" class="thin-border">

                <h2>Corpo</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>

        <div id="footer">
            <p>Lucas Viegas</p>
        </div>
    </div>
</body>
</html>