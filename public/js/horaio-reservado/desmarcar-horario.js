$('.btn-desmarcar').on('click', function(){
    desmarcar($(this).data('id'));
});


const desmarcar = (id_horario_reservado) => {
    let _token = $('#_token').val();
    $.ajax({
        type: "delete",
        url: "/conta/desmarcar-horario",
        data: {id_horario_reservado, _token},
        success: function (response) {
            $(`#reserva-${id_horario_reservado}`).remove();
            iziToast.success({
                message: response.sucesso,
            });
        },error:function(response){
            iziToast.error({
                message: response.responseJSON.falha,
            });
        }
    });
}
