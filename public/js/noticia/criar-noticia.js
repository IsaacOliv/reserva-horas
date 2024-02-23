$(document).ready(function () {
    $('#editar-noticia').on('submit', function (e) {
        e.preventDefault();
        let form = $(this);
        cadastrarNoticia(form);
    });

});

function cadastrarNoticia(form)
{
    var formData = new FormData(form[0]);
    console.log(formData);
    $.ajax({
        type: "post",
        url: form.attr('action'),
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
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
