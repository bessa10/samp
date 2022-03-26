setTimeout(function () {
    $('#msg-alert').hide();
}, 4000);

function removePost(cod_post = '', title = '')
{   
    $("#title").html(title);
    $("#exc_cod_post").val(cod_post);
    $("#modal_remove_post").modal('show');
}