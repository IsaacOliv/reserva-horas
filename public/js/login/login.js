$('#botao-submeter').on('click', function(e){
    limpaCssCampos('login');
    let email = $('#email-login').val().trim();
    let senha = $('#senha-login').val();
    let _token = $('#_token').val();
    verificaNulls = [];
    if (email == null || email == '') {
        verificaNulls.push('email-login');
    }
    if (senha == null || senha == '') {
        verificaNulls.push('senha-login');
    }
    if (verificaNulls.length > 0) {
        verificaCampos(verificaNulls);
    }
    let dados = {email:email, senha:senha, _token:_token}
    logar(dados);
});

function logar(dados) {
    console.log(dados);
    $.ajax({
        type: "post",
        url: "/logar",
        data: dados,
        success: function (response) {
            console.log(response);
            window.location.href = '/';
            setTimeout(function(){
                iziToast.success({
                    message: response.sucesso,
                });
            }, 2000)
        },error: function (response){
            console.log('a'+response);
            iziToast.error({
                message: response.responseJSON.falha,
            });
        }
    });

 }

