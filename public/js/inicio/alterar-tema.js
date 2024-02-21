$('#form-alterar-tema').on('submit', function(e) {
    e.preventDefault();
    $.ajax({
        type: "put",
        url: $(this).attr('action'),
        data: $(this).serialize(),
        success: function(response) {
            $('html').attr('data-bs-theme', response.tema)
            $('#icone-tema').removeClass();
            $('#icone-tema').addClass(response.icone);
        }
    });
})
