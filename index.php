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
    <script type="text/javascript">
	
        $(document).ready(ready);
		
        function ready() {
            if (window.matchMedia) {
		
                var mediaQuery = window.matchMedia('(max-width: 1200px)');
                mediaQuery.addListener(setPage);
                setPage(mediaQuery);
            }		
        }
		
        function setPage(mediaQuery) {
		
            // Se a largura tela é menor ou igual a 700px
            if (mediaQuery.matches) {
            
                $('#page').css('margin', '0');
                $('#menuButton').css('display', 'initial');
            }
            else {
                $('#page').css('margin-left', '20%');                
                $('#page').css('margin-right', '20%');
                $('#menuButton').css('display', 'none');
            }
        }
    </script>
</body>
</html>