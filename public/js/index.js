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
}