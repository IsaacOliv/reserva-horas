$('button[id=filtrar-dia]').on('click', function (e) {
    const horario = $(this).data('dia');
    $('.tr-dias-da-semana').removeAttr('style');
    const parent = $(this).parent().parent();
    $(parent).css('background-color', 'green');
    filtraHorarios(horario);
});

function filtraHorarios(horario){
    let horarios = '';
    let dia_semana = 0;
$.ajax({
    type: "get",
    url: `/admin/horario/${horario}`,
    success: function (response) {
        $.each(response, function (indexInArray, valueOfElement) {
            dia_semana = valueOfElement.dia_semana;
            horarios += `
                <tr id="tr-hora-${valueOfElement.id}">
                    <td>${valueOfElement.hora_inicio}</td>
                    <td>${valueOfElement.hora_fim}</td>
                    <td>
                        <button type="button" class="btn btn-danger excluir-hora" data-id="${valueOfElement.id}">Excluir</button>
                    </td>
                </tr>
            `
        });
        $('#tabela-de-horarios').html(`
        <table>
            <thead id="thead-${dia_semana}">
                <tr class="text-center">
                    <th>Hora inicio</th>
                    <th>Hora fim</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody id="table-hora">
                ${horarios}
            </tbody>
        </table>`);
        aplicarEveneListenerDoClickDoBotaoDeExcluir();
    }
});
}
