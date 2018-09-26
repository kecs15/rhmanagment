/**
 * Created by kedin on 9/9/18.
 */
$("#idiomaNuevo").submit(function(event){
    event.preventDefault();
    var nombre = $('#nombre').val().trim();
    if(nombre == null || nombre == '') {
        $('#nombre').addClass('form-control-danger');
        $('#divDanger').addClass('has-danger');
        $('.alert').show();
        $('#message').text('El idioma no puede estar vacio.');
        return false;
    }
     var posting = $.post( '/idiomas', { nombre: $('#nombre').val() } );
    //

    posting.done(function( data ) {
       if(data.status == 'error') {
           $('.alert').show();
           $('#message').text(data.message);
       } else {
           location.reload();
       }
       console.log(data);

    });
});

$("#editarIdioma").submit(function (event) {
    event.preventDefault();

    var nombre = $('#nombre').val().trim();
    if(nombre == null || nombre == '') {
        $('#nombre').addClass('form-control-danger');
        $('#divDanger').addClass('has-danger');
        $('.alert').show();
        $('#message').text('El idioma no puede estar vacio.');
        return false;
    }
    $.ajax({
        method: "PUT",
        url: "/idiomas/"+$("#idiomaID").val(),
        data: $("#editarIdioma").serialize()
    }).done(function( data ) {
        console.log(data);
            if(data.status == 'error') {
                $('.alert').show();
                $('#message').text(data.message);
                return false;
            }
            window.location.href = '/idiomas';
        });

});