function validaCedula(ced) {
    var c = ced.replace(/-/g,'');
    var cedula = c.substr(0, c.length - 1);
    var verificador = c.substr(c.length - 1, 1);
    var suma = 0;
    var cedulaValida = false;
    if(ced.length < 11) { return false; }
    for (i=0; i < cedula.length; i++) {
        mod = "";
        if((i % 2) == 0){mod = 1} else {mod = 2}
        res = cedula.substr(i,1) * mod;
        if (res > 9) {
            res = res.toString();
            uno = res.substr(0,1);
            dos = res.substr(1,1);
            res = eval(uno) + eval(dos);
        }
        suma += eval(res);
    }
    el_numero = (10 - (suma % 10)) % 10;
    if (el_numero == verificador && cedula.substr(0,3) != "000") {
        cedulaValida = true;
    }
    else   {
        cedulaValida = false;
    }
    return cedulaValida;
}

$('#agregarCapacitacion').click( function () {
    $('#capacitacion').clone().find('input:text').val("").end().appendTo('#capacitaciones');
});
$('#agregarIdioma').click( function () {

    $('#idiomaDivRow').clone().appendTo('#idiomas');

});
$('#agregarExperiencia').click( function () {
    $('#experienciaLaboral').clone().find('input:text').val("").end().appendTo('#experienciasLaborales');
});

$('#candidato').submit(function (event) {
    var foo = $('.fecha-desde').siblings('.fecha-hasta').val();
    console.log(foo);
    return false;
    event.preventDefault();
    if($('#nombre').val().trim() == null ||$('#nombre').val().trim() == '') {
        alert('entrot');
        $('#nombre').addClass('form-control-danger');
        $('#divDanger').addClass('has-danger');
        $('.alert').show();
        $('#message').text('Error en el nombre.');
        return false;
    }

    if(!validaCedula($('#cedula').val())) {
        $('#cedula').addClass('form-control-danger');
        $('#divDanger').addClass('has-danger');
        $('.alert').show();
        $('#message').text('Cedula invalida');
        return false;
    }

    if($)

    $.ajax({
        method: "POST",
        url: "/candidatos",
        data: $("#candidato").serialize()
    }).done(function( data ) {

        $('html,body').scrollTop(0);
        if(data.status == 'success') {
            $('#divDanger').addClass('has-danger');
            $('#alert').removeClass('alert-danger').addClass('alert-success');
            $('.alert').show();
            $('#message').text('Su solictud fue enviada correctamente');

            window.setTimeout(function(){
                location.href = '/';
            }, 3000);
        }

    });
});