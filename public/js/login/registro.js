const verifica = (form) => {
    let nome = $('#nome-registro').val().trim();
    let email = $('#email-registro').val().trim();
    let senha = $('#senha-registro').val();
    let _token = $('#_token').val();
    let action = form.attr('action');
    dados = {
        nome:nome,
        email:email,
        senha:senha,
        _token:_token
    }
    registrar(dados, action);
}


function registrar(dados, action) {
    $.ajax({
        type: "post",
        url: action,
        data: dados,
        success: function (response) {
            console.log(response);
            $('#nome-registro').val('').css({"border": ""});
            $('#email-registro').val('').css({"border": ""});
            $('#senha-registro').val('').css({"border": ""});
            abrirFormLogin();
                iziToast.success({
                    message: response.sucesso,
                });
        },error: function(response){
            if (response.responseJSON.errors != null) {
                $.each(response.responseJSON.errors, function (indexInArray, valueOfElement) {
                    verificaCampos(indexInArray+'-registro');
                    iziToast.error({
                        message: valueOfElement
                    });
                });
            }
            iziToast.error({
                message: response.responseJSON.falha,
            });
        }
    });
}


function verificaCampos(dado) {
    $(`#${dado}`).css({"border": "1px solid red"});
}
function limpaCssCampos(dados){

}

$('#form-registro').on('submit', function(e) {
    e.preventDefault();
    verifica($(this))
})
