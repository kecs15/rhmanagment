function validarPuesto() {
    var nombre = $('#nombre').val().trim();
    var salarioMin = $('#salarioMin').val().trim();
    var salarioMax = $('#salarioMax').val().trim();

    if(nombre == null || nombre == '') {
        $('#nombre').addClass('form-control-danger');
        $('#divDanger').addClass('has-danger');
        $('.alert').show();
        $('#message').text('El puesto no puede estar vacio.');
        return false;
    }
    if(salarioMin == null || salarioMin == '' || salarioMin == NaN || salarioMin <= 0) {
        $('#salarioMin').addClass('form-control-danger');
        $('#divDangerSalarioMin').addClass('has-danger');
        $('.alert').show();
        $('#message').text('Salario minimo incorrecto.');
        return false;
    }
    if(salarioMax == null || salarioMax == '' || salarioMax == NaN || salarioMax <= salarioMin) {
        $('#salarioMax').addClass('form-control-danger');
        $('#divDangerSalarioMax').addClass('has-danger');
        $('.alert').show();
        $('#message').text('Salario maximo incorrecto.');
        return false;
    }
    return true;
}

$('#puestoNuevo').submit(function (event) {
    event.preventDefault();

    if(!validarPuesto()) return;

    $.ajax({
        method: "POST",
        url: "/puestos",
        data: $("#puestoNuevo").serialize()
    }).done(function( data ) {
                location.href = '/puestos';
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