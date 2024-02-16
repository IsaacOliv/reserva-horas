$(document).ready(function () {
    $('form').on('submit', function (e) {
        e.preventDefault();
        if ($('.form-control').attr('disabled')) {
            $('.form-control').removeAttr('disabled');
            $('#botao-editar').removeClass('btn-warning').addClass('btn-success').html('Salvar');
        }else {
            let foto = $('#foto-time').val();
            let form = $(this);
            cadastrarInformacoes(form);

        }
    });

    $('#cpf').on('keypress', function (e) {
        if ($(this).val().length < 14) {
            cpf($(this).val());
        }else{
            e.preventDefault();
        }
    });

    $('#telefone').on('keypress', function (e) {
        if ($(this).val().length < 14) {
            telefone($(this).val());
        }else{
            e.preventDefault();
        }
    });
});

function cadastrarInformacoes(form)
{
    var formData = new FormData(form[0]);
    $.ajax({
        type: "post",
        url: form.attr('action'),
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            console.log(response);
            $('.form-control').attr('disabled', 'true');
            $('#botao-editar').removeClass('btn-success').addClass('btn-warning').html('Editar');
            response.imagem == 0
            ? console.log('sem imagem')
            : $('#div-imagem').html(`
                <img style="text-align: center; max-width: 30vw"
                    src="/storage/${response.imagem}" alt="imagem do time">
                `);
            iziToast.success({
                message: response.sucesso,
            });
        }
    });
}

function cpf(v){

    //Remove tudo o que não é dígito
    v=v.replace(/\D/g,"")

    //Coloca um ponto entre o terceiro e o quarto dígitos
    v=v.replace(/(\d{3})(\d)/,"$1.$2")

    //Coloca um ponto entre o terceiro e o quarto dígitos
    //de novo (para o segundo bloco de números)
    v=v.replace(/(\d{3})(\d)/,"$1.$2")

    //Coloca um hífen entre o terceiro e o quarto dígitos
    v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2")

   $('#cpf').val(v);
}

function telefone(v){

    //Remove tudo o que não é dígito
    v=v.replace(/\D/g,"")

    //Coloca entre parenteses o primeiro e o seguindo digito
    v=v.replace(/(\d{1})(\d)/,"($1$2)")

    //Coloca um hifen dentre o setimo e o oitavo digito
    v=v.replace(/(\d{5})(\d)/,"$1-$2")

   $('#telefone').val(v);
}
