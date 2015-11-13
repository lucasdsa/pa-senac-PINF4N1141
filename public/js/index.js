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

        if (touchDistanceX > 300) {

            $('div#menu').css('visibility', 'visible');
        }
        else if (touchDistanceX < -300) {

            $('div#menu').css('visibility', 'hidden');
        }

        touchDistanceX = 0;
    });
}