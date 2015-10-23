<!DOCTYPE html>
<html>
<?php

    include 'public/header.php';
    
    echoHeader('Teste');
?>

<body>
    <div id="page">
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
		
                var mediaQuery = window.matchMedia('(max-width: 700px)');
                mediaQuery.addListener(setPage);
                setPage(mediaQuery);
            }		
        }
		
        function setPage(mediaQuery) {
		
            // Se a largura tela é menor ou igual a 700px
            if (mediaQuery.matches) {
            
                $('#menu').css('position', 'absolute');
                $('#menu').css('top', '0');
                $('#menu').css('left', '0');                
                $('#menu').css('height', '100%');                
                $('#menu').css('visibility', 'hidden');                
            }
            else {
                $('#menu').css('position', 'static');
                $('#menu').css('visibility', 'visible');
            }
        }
    </script>
</body>
</html>