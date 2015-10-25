$(document).ready(ready);

function ready() {
    if (window.matchMedia) {

        var mediaQuery = window.matchMedia('(max-width: 1200px)');
        mediaQuery.addListener(setPage);
        setPage(mediaQuery);
    }

    $('button#menuButton').click(function () {

        var menuVisibility = $('div#menu').css('visibility');

        if (menuVisibility !== 'visible') {
            $('div#menu').css('visibility', 'visible');
        }
        else {
            $('div#menu').css('visibility', 'hidden');
        }
    });
}

function setPage(mediaQuery) {
		
    // Se a largura tela é menor ou igual a 700px
    if (mediaQuery.matches) {
            
        // Habilita o botão
        $('button#menuButton').css('visibility', 'visible');
                
        // e esconde o menu
        $('div#menu').css('position', 'fixed');
        $('div#menu').css('visibility', 'hidden');
        $('div#menu').css('width', '100%');
        $('div#menu').css('float', 'none');
        $('div#menu').css('top', '0');
        $('div#menu').css('margin', '0');
        $('div#text').css('float', 'none');
        $('div#text').css('width', '100%');
    }
    else {
                
        // Exibe menu e esconde o botão
        $('button#menuButton').css('visibility', 'hidden');
        $('div#menu').css('position', 'static');
        $('div#menu').css('visibility', 'visible');
        $('div#menu').css('width', '230px');
        $('div#menu').css('float', 'left');
        $('div#menu').css('opacity', '1.0');
        $('div#menu').css('margin', '20px 0 20px 0');
        $('div#text').css('width', '80%');
        $('div#text').css('float', 'right');
    }
}