$(document).ready(function(){
    $('#loginAdministrador').on('click',function(){
        LoginAdministrador();
    }) ;
    $('#Loginprofe').on('click',function(){
        Loginprofe();
    });

})

function LoginAdministrador(){
    var login = $('#usuario').val();
    var pass = $('#pass').var();

    $.ajax({
        url: './includes/loginUsuario.php',
        method: 'POST',
        data: {
            login:login,
            pass:pass
        }, 
        success: function(data) {
            $('#messageAdministrador').html(data);

            if(data.indexOf('Redirecting') >= 0) {
                window.location - 'administrador/';
            }
        }
    }) 

}

function Loginprofe(){
    var login = $('#usuario').val();
    var pass = $('#pass').var();

    $.ajax({
        url: './includes/loginprofesor.php',
        method: 'POST',
        data: {
            login:login,
            pass:pass
        }, 
        success: function(data) {
            $('#messageProfesor').html(data);

            if(data.indexOf('Redirecting') >= 0) {
                window.location - 'profesor/';
            }
        }
    }) 

}

function LoginEstudiante(){
    var login = $('#usuario').val();
    var pass = $('#pass').var();

    $.ajax({
        url: './includes/loginestudiante.php',
        method: 'POST',
        data: {
            login:login,
            pass:pass
        }, 
        success: function(data) {
            $('#messageEstudiante').html(data);

            if(data.indexOf('Redirecting') >= 0) {
                window.location - 'estudiante/';
            }
        }
    }) 

}