$('#form-login').on('submit', function(e){
    e.preventDefault();
    fazLogin($(this))
});

function fazLogin(form){
    let email = $('#email-login').val().trim();
    let senha = $('#senha-login').val();
    let _token = $('#_token').val();
    let action = form.attr('action');
    $('#email-login').css({"border": ""});
    $('#senha-login').css({"border": ""});
    let dados = {
        email:email,
        senha:senha,
        _token:_token}
    logar(dados, action);
}

function logar(dados, action) {

    $.ajax({
        type: "post",
        url: action,
        data: dados,
        success: function (response) {
            $('#email-login').css({"border": ""});
            $('#senha-login').css({"border": ""});
            window.location.href = '/';
            setTimeout(function(){
                iziToast.success({
                    message: response.sucesso,
                });
            }, 2000)
        },error: function (response){
            $.each(response.responseJSON.errors, function (indexInArray, valueOfElement) {
                verificaCampos(indexInArray+'-login');
                iziToast.error({
                    message: valueOfElement,
                });
            });

        }
    });
 }
