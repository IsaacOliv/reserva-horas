function verificaDiaDaSemana(dia_semana){
    switch (dia_semana) {
        case '1':
            return 'Domingo';
            break;
        case '2':
            return 'Segunda-feira';
            break;
        case '3':
            return 'Terça-feira';
            break;
        case '4':
            return 'Quarta-feira';
            break;
        case '5':
            return 'Quinta-feira';
            break;
        case '6':
            return 'Sexta-feira';
            break;
        case '7':
            return 'Sabado';
            break;
        default:
            return 'DATA INVALIDA';
            break;
    }
}

function aplicarEveneListenerDoClickDoBotaoDeExcluir(){
    $('.excluir-hora').on('click', function (e) {
        const _token = $('#_token').val();
        const dados = {
            id: $(this).data('id'),
            token: _token
        }
        deleta_hora(dados)
    });
}

function deleta_hora(dados) {
    $.ajax({
        type: "delete",
        url: `/admin/horario/${dados.id}`,
        data: {_token : dados.token},
        success: function (response){
            $(`#tr-hora-${dados.id}`).remove();
            iziToast.success({
                title: 'Sucesso!',
                message: response.sucesso,
            });
        },
        error:function(response){
            iziToast.error({
                title: 'Falha!',
                message: response.responseJSON.falha,
            });
        }
    });
}


$(document).ready(function(){
    aplicarEveneListenerDoClickDoBotaoDeExcluir();
})
