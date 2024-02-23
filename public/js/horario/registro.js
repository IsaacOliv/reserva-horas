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
$('#cadastro-horario').on('submit', function (e) {
    const _token = $('#_token').val();
    const hora_inicio = $('#hora_inicio').val();
    const hora_fim = $('#hora_fim').val();
    const dia_semana = $('#dia_semana').val();
    const dados = {hora_inicio,
        hora_fim,
        dia_semana,
        _token}
    if (hora_fim < hora_inicio) {
        e.preventDefault();
        iziToast.error({
            title: 'Falha!',
            message: 'A hora fim não pode ser inferior a hora inicio!',
        });
    }
    else if(dia_semana > 7 || dia_semana < 1){
        e.preventDefault();
        iziToast.error({
            title: 'Falha!',
            message: 'São permitidos apenas dias de domingo a domingo!',
        });
    }
    else{
        e.preventDefault();
        registra_horario(dados)
    }

});

function registra_horario(dados) {
    $.ajax({
        type: "post",
        url: "/admin/horario",
        data: dados,
        success: function (response){
            iziToast.success({
                title: 'Sucesso!',
                message: response.sucesso,
            });
            if ($('#thead-0').length > 0) {
                $('#table-hora').prepend(
                    `<tr id="tr-hora-${response.id}">
                        <td>${dados.hora_inicio}</td>
                        <td>${dados.hora_fim}</td>
                        <td>
                            <button class="btn btn-danger excluir-hora" data-id="${response.id}>Excluir</button>
                        </td>
                    </tr>`)
            }
            else if ($(`#thead-${dados.dia_semana}`).length > 0) {
                $('#table-hora').prepend(
                    `<tr id="tr-hora-${response.id}">
                        <td>${dados.hora_inicio}</td>
                        <td>${dados.hora_fim}</td>
                        <td>
                            <button class="btn btn-danger excluir-hora" data-id="${response.id}">Excluir</button>
                        </td>
                    </tr>`)
            }
            aplicarEveneListenerDoClickDoBotaoDeExcluir();
        },
        error:function(response){
            if (response.responseJSON.message) {
                $.each(response.responseJSON.errors, function (indexInArray, valueOfElement) {
                    iziToast.error({
                        title: 'Falha!',
                        message: valueOfElement,
                    });
                });
            }
            iziToast.error({
                title: 'Falha!',
                message: response.responseJSON.falha,
            });

        }
    });
}
