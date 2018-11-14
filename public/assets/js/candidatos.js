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
    event.preventDefault();
    $('.fecha-desde').each(function(){
        var desde = new Date($(this).val());
        var hasta =  new Date ($(this).closest('.row').find('.fecha-hasta').eq(0).val());
        if (!isNaN(desde.getTime()) && !isNaN(hasta.getTime())) {
            if(desde.getTime() > hasta.getTime()){
                $('#divDanger').addClass('has-danger');
                $('.alert').show();
                $('#message').text('Error en las fechas.');
                $('html,body').scrollTop(0);
                return false;
            }
        }
    });


    if($('#nombre').val().trim() == null ||$('#nombre').val().trim() == '') {
        $('#nombre').addClass('form-control-danger');
        $('#divDanger').addClass('has-danger');
        $('.alert').show();
        $('#message').text('Error en el nombre.');
        $('html,body').scrollTop(0);
        return false;
    }

    if(!validaCedula($('#cedula').val())) {
        $('#cedula').addClass('form-control-danger');
        $('#divDanger').addClass('has-danger');
        $('.alert').show();
        $('#message').text('Cedula invalida');
        $('html,body').scrollTop(0);
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

$('#candidatoEstado').submit(function (event) {
    event.preventDefault();
    if($('#estado').val() == 'Pendiente') return false;
    if($('#estado').val() == 'Contratado')
    {
        if($('#salario').val() == null || $('#salario').val() <= 0)
        {
            $('#salario').addClass('form-control-danger');
            $('#divDanger').addClass('has-danger');
            $('.alert').show();
            $('#message').text('Salario invialido');
            return false;
        }
    }
    $.ajax({
        method: "PUT",
        url: "/candidatos/"+$("#candidatoID").val(),
        data: $("#candidatoEstado").serialize()
    }).done(function( data ) {
            if(data.status = 'hired')
            {
                $('#alert').removeClass('alert-danger').addClass('alert-success');
                $('.alert').show();
                $('#message').text(data.message);
                window.setTimeout(function(){
                    location.href = '/dashboard';
                }, 3000);
            }else if(data.status == 'rejected'){
                $('#alert').removeClass('alert-success').addClass('alert-danger');
                $('.alert').show();
                $('#message').text(data.message);
                window.setTimeout(function(){
                    location.href = '/dashboard';
                }, 3000);
            }
    });
});

// $('#buscarCandidatos').submit(function (event) {
//
//    event.preventDefault();
//    var valor = $('#valor').val().trim();
//    if(valor == null || valor == '') {
//        $('#valor').addClass('form-control-danger');
//        $('#divDanger').addClass('has-danger');
//        $('.alert').show();
//        $('#message').text('Debe introducir un valor a buscar.');
//        return false;
//    }
//
//     var posting = $.post( '/find', { criterio: $('#criterio').val(), valor: valor } );
// });