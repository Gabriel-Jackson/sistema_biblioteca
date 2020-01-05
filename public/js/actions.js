$(document).on('click','#retirar',function () {
    var url = "/livro/retirar";
    var data = {id: $('#id').val()};
    $.post(url, data,
        function (response,status) {
            if(status == "success"){
                alert("Livro Retirado Com Sucesso");
            }
        }
    );
})
$(document).on('click','#devolver',function () {
    var url = "/livro/devolver";
    var data = {id: $('#id').val()};

    $.post(url, data,
        function (response,status) {
            if(status == "success"){
                alert("Livro Devolvido Com Sucesso");
            }
        }
    );
})