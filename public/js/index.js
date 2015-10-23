(function () {
    $('#subscribe').submit(onSubscribe);
    $('#reset').click(function () {
        $('#name').css('background-color', 'white');
    });

    $('#name').change(onNameFieldChange);
}());

function onSubscribe(event) {
    event.preventDefault();
    event.stopPropagation();
    
    var name = encodeURIComponent($('#name').val());
    var email = encodeURIComponent($('#email').val());
    var password = encodeURIComponent($('#password').val());
    var sex = $('#male').attr('checked') ? 1 : 0;

    if (email && password) {

        request = new XMLHttpRequest();
        request.open('POST', 'subscribe', true);
        request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        var data = 'email=' + email + '&password=' + password +
                   '&sex=' + sex + '&name=' + name;

        request.send(data);
        request.onreadystatechange = response;
    }

    function response() {
        
        if (request.readyState === 4) {
            
            var innerHTML = $('#text').html();
            
            if (request.status === 200) {
                
                $('#status').html('Usuário criado com sucesso!');
            }
            else {
                $('#status').html('Erro ao criar usuário!');
            }
            
            request = null;
        }
    }
}

function onNameFieldChange(event) {

    var name = $('#name').val();

    if (name) {

        var request = new XMLHttpRequest();
        request.open('POST', 'search', true);
        request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        
        request.onreadystatechange = function () {
            
            if (request.readyState === 4 && request.status === 200) {
                
                if (request.responseText === 'true')
                    $('#name').css('background-color', 'green');
                else
                    $('#name').css('background-color', '#CF0000');

                request = null;
            }
        };

        request.send('name=' + name);
    }
    else
        $('#name').css('background-color', 'white');
}