$("[data-form-contato]").validate({
    rules: {
        nome: {
            required: true,
        },
        email: {
            required: true,
            email: true,
        }
    },
    submitHandler: function (form) {
        form.submit();
    }
});


$("[data-alterar-contato]").on("click", function () {
    const idContato = $(this).data("alterar-contato");
    window.location.href = `/editar-contato?idContato=${idContato}`;
})
