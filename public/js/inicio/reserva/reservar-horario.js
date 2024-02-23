

$('.botao-reservar-horario').on('click', function (e) {
    reservarHorario($(this).data('id'))
});

const reservarHorario = (id_horario) => {
    let _token = $('#_token').val()
    $.ajax({
        type: "post",
        url: "/reservar-horario",
        data: {id_horario, _token},
        success: function (response) {
            console.log(response);
            $(`#hora-${id_horario}`).remove();
            iziToast.success({
                message: response.sucesso,
            });
        },error:function(response){
            if (response.responseJSON.link) {
                iziToast.error({
                    timeout: 9000,
                    message: response.responseJSON.falha + ` <a style="color:black" href='${response.responseJSON.link}'>Clique aqui</a>`,
                });

            }else{
                iziToast.error({
                    message: response.responseJSON.falha,
                });
            }

        }
    });
}
