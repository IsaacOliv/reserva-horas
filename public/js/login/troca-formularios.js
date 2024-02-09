$('#trocar-formulario').on('click', function() {
    abrirFormRegistro();
})

function abrirFormRegistro() {
    $('#div-login').fadeOut('slow', function() {
        $('#div-login').addClass('hide');
        $('#div-registro').fadeIn('slow', function() {
            $('#div-registro').removeClass('hide');
        })
    });
 }

 $('#trocar-formulario2').on('click', function() {
    abrirFormLogin();
})

function abrirFormLogin() {
    $('#div-registro').fadeOut('slow', function() {
        $('#div-registro').addClass('hide');
        $('#div-login').fadeIn('slow', function() {
            $('#div-login').removeClass('hide');
        })
    });
 }

