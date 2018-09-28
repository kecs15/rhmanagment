/**
 * Created by kedin on 9/9/18.
 */

function validarIdioma() {
    var nombre = $('#nombre').val().trim();
    if(nombre == null || nombre == '') {
        console.log(message);
        $('#nombre').addClass('form-control-danger');
        $('#divDanger').addClass('has-danger');
        $('.alert').show();
        $('#message').text('El idioma no puede estar vacio.');
        return false;
    }
    return true;
}

$("#idiomaNuevo").submit(function(event){
    event.preventDefault();

    if(!validarIdioma()) return;
    
    var posting = $.post( '/idiomas', { nombre: $('#nombre').val() } );

    posting.done(function( data ) {
       if(data.status == 'error') {
           $('.alert').show();
           $('#message').text(data.message);
           return false;
       }
           location.reload();
    });
});

$("#editarIdioma").submit(function (event) {
    event.preventDefault();

    if(!validarIdioma()) return;

    $.ajax({
        method: "PUT",
        url: "/idiomas/"+$("#idiomaID").val(),
        data: $("#editarIdioma").serialize()
    }).done(function( data ) {
            if(data.status == 'error') {
                $('.alert').show();
                $('#message').text(data.message);
                return false;
            }
            location.href = '/idiomas';
        });
});