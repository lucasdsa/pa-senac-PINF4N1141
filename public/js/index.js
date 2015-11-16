$(document).ready(ready);

function ready() {

    $('button#menuButton').click(function () {

        var menuVisibility = $('div#menu').css('visibility');

        if (menuVisibility !== 'visible') {
            $('div#menu').css('visibility', 'visible');
        }
        else {
            $('div#menu').css('visibility', 'hidden');
        }
    });

    var touchDistanceX = 0;
    var lastX = 0;
    var right = true;

    window.addEventListener('touchmove', function (event) {

        // Recupera posição do touch e determina direção do movimento
        var currentX = event.touches[0].clientX;
        var distanceX = currentX - lastX;

        right = (currentX > lastX) ? true : false;
        lastX = currentX;

        if (right) {

            if (touchDistanceX == 0)
                touchDistanceX = 1;
            else
                touchDistanceX += distanceX;
        }
        else {

            if (touchDistanceX == 0)
                touchDistanceX = -1;
            else
                touchDistanceX += distanceX;
        }
    });

    window.addEventListener('touchend', function (event) {

        if (touchDistanceX > 150) {

            $('div#menu').css('visibility', 'visible');
        }
        else if (touchDistanceX < -150) {

            $('div#menu').css('visibility', 'hidden');
        }

        touchDistanceX = 0;
    });
    
    // CSRF
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    // Links
    $('#menu, #text').on('click', 'a', (function (event) {
       
       event.preventDefault();
       
       if ($('#menu').css('width') !== '400px')
           $('#menu').css('visibility', 'hidden');
       
       switch (event.target.id) {
           
           case 'home':
               window.location = '/';
               break;
           case 'add':
           case 'subscribe':
               getForm('/subscribe');
               break;
           case 'login':
               getForm('/login');
               break;
           case 'logout':
               logout();
               break;
           case 'listNext':
               getForm('/list/next');
               break;
           case 'listPrev':
               getForm('/list/previous');
               break;
           case 'list':
               getForm('list');
       }
    }));
}

function getForm(url) {
    
    $.ajax(url, {
           
        success: function (data, statusString, jqXHR) {
               
            $('#text').html(data);
        },
           
        error: function () {
            
            $('#text').text('Error!');
        }
    });
}

function logout() {
    
    $.ajax('/logout', {
        method: 'POST',
        success: function () {
            
            window.location = '/';
        },  
        error: function () {
            
            $('#text').text('Ocorreu um erro inesperado!');
        }
    })
}