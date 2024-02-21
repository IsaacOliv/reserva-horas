$(document).ready(function () {
    $('#editar-conta').on('submit', function (e) {
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

});

function cadastrarInformacoes(form)
{
    var formData = new FormData(form[0]);
    $('input').removeClass('border border-danger');
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
        },error:function(response){
            if (response.responseJSON.error) {
                $.each(response.responseJSON.errors, function (indexInArray, valueOfElement) {
                    if (!$(`#${indexInArray}`).hasClass('border border-danger')) {
                        $(`#${indexInArray}`).addClass('border border-danger')
                    }
                    if (valueOfElement.length > 1) {
                        $.each(valueOfElement, function (indexInArray, valueOfElement) {
                            iziToast.error({
                                message: valueOfElement,
                            });
                        });
                    }else{
                        iziToast.error({
                            message: valueOfElement,
                        });
                    }
                });
            }else if(response.responseJSON.falha){
                $(`#${response.responseJSON.campo}`).addClass('border border-danger')
                iziToast.error({
                    message: response.responseJSON.falha,
                });
            }
        }
    });
}
