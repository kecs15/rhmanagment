/**
 * Created by kedin on 9/9/18.
 */

function validarDepartamento() {
    var nombre = $('#nombre').val().trim();
    if(nombre == null || nombre == '') {
        console.log(message);
        $('#nombre').addClass('form-control-danger');
        $('#divDanger').addClass('has-danger');
        $('.alert').show();
        $('#message').text('El departamento no puede estar vacio.');
        return false;
    }
    return true;
}

$("#departamentoNuevo").submit(function(event){
    event.preventDefault();

    if(!validarDepartamento()) return;

    var posting = $.post( '/departamentos', { nombre: $('#nombre').val() } );

    posting.done(function( data ) {
        if(data.status == 'error') {
            $('.alert').show();
            $('#message').text(data.message);
            return false;
        }
        location.reload();
    });
});

$("#editarDepartamento").submit(function (event) {
    event.preventDefault();

    if(!validarDepartamento()) return;
    
    $.ajax({
        method: "PUT",
        url: "/departamentos/"+$("#departamentoID").val(),
        data: $("#editarDepartamento").serialize()
    }).done(function( data ) {
        if(data.status == 'error') {
            $('.alert').show();
            $('#message').text(data.message);
            return false;
        }
        location.href = '/departamentos';
    });
});