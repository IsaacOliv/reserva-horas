$(document).ready(function () {
    $('form').on('submit', function (e) {
        if ($('.form-control').attr('disabled')) {
            e.preventDefault();
            $('.form-control').removeAttr('disabled');
            $('#botao-editar').removeClass('btn-warning');
            $('#botao-editar').addClass('btn-success');
            $('#botao-editar').html('Salvar');
        }else {
            let foto = $('#foto-time').val();
            e.preventDefault();
            let form = $(this);
            cadastrarInformacoes(form, foto);
            $('.form-control').attr('disabled', 'true');
            $('#botao-editar').removeClass('btn-success');
            $('#botao-editar').addClass('btn-warning');
            $('#botao-editar').html('Editar');
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

function cadastrarInformacoes(form,foto)
{
    $.ajax({
        type: "post",
        url: form.attr('action'),
        data: form.serialize(),
        success: function (response) {

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
