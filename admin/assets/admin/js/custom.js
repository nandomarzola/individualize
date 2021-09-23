var input = document.getElementById('dateInputs');
input.addEventListener('change', function() {
    var agora = new Date();
    var escolhida = new Date(this.value);
    if (escolhida < agora) this.value = [agora.getFullYear(), agora.getMonth() + 1, agora.getDate()].map(v => v < 10 ? '0' + v : v).join('-');
});


$(document).ready(function(){

    /*$("#create").submit(function(e) {

        e.preventDefault();

        var form = $(this);
        var url = form.attr('action');
        var method = form.attr('method');
        var title = form.data('title');

        $.ajax({
            type: method,
            url: url,
            data: form.serialize(), // serializes the form's elements.
            success: function (data) {
                messages(title+' CADASTRADO COM SUCESSO', 'success');
                //reload();
            },
            error: function (data) {
                messages('ERROR AO CADASTRAR '+title, 'error');
                //reload();
            },
        });


    });*/

    $("#img").change(function () {
        var fileInput = $(this);
        var extPermitidas = ['jpg', 'png', 'jpeg'];

        if (fileInput.get(0).files.length) {
            if(typeof extPermitidas.find(function(ext){ return fileInput.val().split('.').pop() == ext; }) == 'undefined') {
                toastr.error('arquivo inválido');
                $("#img").val("");
            }
        }
    });

    function messages(msg, type){
        switch (type) {
            case 'warning':
                toastr.warning(msg);
                break;
            case 'error':
                toastr.error(msg);
                break;
            default:
                toastr.success(msg);
                break;
        }
    }


});