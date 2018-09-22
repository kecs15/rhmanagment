/**
 * Created by kedin on 9/9/18.
 */
$("#idioma").submit(function(event){

     var posting = $.post( '/idiomas', { nombre: $('#nombre').val() } );
    //

    posting.done(function( data ) {
       console.log(data);

    });
});

$("#editarIdioma").submit(function (event) {
    $.ajax({
        method: "PUT",
        url: "/idiomas/"+$("#idiomaID").val(),
        data: $("#editarIdioma").serialize()
    })
        .done(function( msg ) {
            console.log(msg);

        });

});