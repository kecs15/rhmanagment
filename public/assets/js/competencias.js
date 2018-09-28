/**
 * Created by kedin on 9/9/18.
 */
function validarCompetencia() {
    var descripcion = $('#descripcion').val().trim();
    if(descripcion == null || descripcion == '') {
        $('#descripcion').addClass('form-control-danger');
        $('#divDanger').addClass('has-danger');
        $('.alert').show();
        $('#message').text('La descripcion no puede estar vacia.');
        return false;
    }
    return true;
}

$("#competenciaNuevo").submit(function(event){
    event.preventDefault();
    
    if(!validarCompetencia()) return;

    var posting = $.post( '/competencias', { descripcion: descripcion } );
    //

    posting.done(function( data ) {
       if(data.status == 'error') {
           $('.alert').show();
           $('#message').text(data.message);
           return false;
       }
       location.reload();
    });
});

$("#editarCompetencia").submit(function (event) {
    event.preventDefault();

    console.log(validarCompetencia());
    if(!validarCompetencia()) return;

    $.ajax({
        method: "PUT",
        url: "/competencias/"+$("#competenciaID").val(),
        data: $("#editarCompetencia").serialize()
    }).done(function( data ) {
        console.log(data);
            if(data.status == 'error') {
                $('.alert').show();
                $('#message').text(data.message);
                return false;
            }
            location.href = '/competencias';
        });
});
