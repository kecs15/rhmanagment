// function validarPuesto() {
//     var nombre = $('#nombre').val().trim();
//     var salarioMin = $('#salarioMin').val().trim();
//     var salarioMax = $('#salarioMax').val().trim();
//
//     if(nombre == null || nombre == '') {
//         $('#nombre').addClass('form-control-danger');
//         $('#divDanger').addClass('has-danger');
//         $('.alert').show();
//         $('#message').text('El puesto no puede estar vacio.');
//         return false;
//     }
//     if(salarioMin == null || salarioMin == '' || salarioMin == NaN || salarioMin <= 0) {
//         $('#salarioMin').addClass('form-control-danger');
//         $('#divDangerSalarioMin').addClass('has-danger');
//         $('.alert').show();
//         $('#message').text('Salario minimo incorrecto.');
//         return false;
//     }
//     if(salarioMax == null || salarioMax == '' || salarioMax == NaN || salarioMax <= salarioMin) {
//         $('#salarioMax').addClass('form-control-danger');
//         $('#divDangerSalarioMax').addClass('has-danger');
//         $('.alert').show();
//         $('#message').text('Salario maximo incorrecto.');
//         return false;
//     }
//     return true;
// }

$('#agregarCapacitacion').click( function () {
    $('#capacitacion').clone().find('input:text').val("").end().appendTo('#capacitaciones');
});
$('#agregarIdioma').click( function () {

    $('#idiomaDivRow').clone().appendTo('#idiomas');

});
$('#agregarExperiencia').click( function () {

    $('#experienciaLaboral').append("<label for='nombreEmpresa'>Empresa</label>\n" +
                                    "<input type='text' name='nombreEmpresa[]' class='form-control' placeholder='Nombre de la Empresa'>"+
                                    "<div class='row'><div class='col'><label for='posicion'>Posicion</label>" +
                                    "<input type='text' name='posicion[]' class='form-control' placeholder='Posicion'> </div>" +
                                    "<div class='col'><label for='salario'>Salario</label>" +
                                    "<input type='number' name='salario[]' class='form-control' placeholder='Salario'></div></div>" +
                                    "<div class='row'><div class='col'><label for='desde'>Desde</label>" +
                                    "<input type='date' class='form-control' name='fechaDesde[]'></div>" +
                                    "<div class='col'><label for='hasta'>Hasta</label>" +
                                    "<input type='date' name='fechaHasta[]' class='form-control'></div></div>");
});
$('#candidato').submit(function (event) {
    event.preventDefault();

    // if(!validarPuesto()) return;

    $.ajax({
        method: "POST",
        url: "/candidatos",
        data: $("#candidato").serialize()
    }).done(function( data ) {
        // location.href = '/puestos';
    });
});

$('#puestoEditar').submit(function (event) {
    event.preventDefault();

    if(!validarPuesto()) return;

    $.ajax({
        method: "PUT",
        url: "/puestos/"+$('#puestoID').val(),
        data: $("#puestoEditar").serialize()
    }).done(function( data ) {
        location.href = '/puestos';
    });

});