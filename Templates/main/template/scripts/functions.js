$(document).ready( function() {
    $('#chisiamo').on('click', function (event) {
        event.preventDefault();
        var credits = window.open('', 'CREDITI', 'scrollbars=yes,resizable=yes,top=200,left=400,width=400,height=350');
		var getUrl = window.location;
		var urlBase = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + "/img";
        credits.document.write("<div style='text-align: center;'><h2>"+credits.name+"</h2><img style='width:200px' src='"+urlBase+"/team.png'> <p>Unibookstore by Daniele, Enrico, Ilaria, Rajan</p>" +
            "<p><a href='' onclick='window.close();'>Chiudi questa finestra</a></p></div>");
    });
    $('div.ricerca').css('visibility','visible').hide().fadeIn(1500);


});
window.onload = function() {
    var x = document.getElementById('disabilitaIncolla');
    x.onpaste = function(e) {
        e.preventDefault();
    }
}


function  ValidazioneRegistrazione() {
    var x=document.forms["formRegistrazione"];

    if ( ! (x.username.value).match(/^[a-zA-Z0-9]{4,10}$/) ) {
        x.username.focus();
        alert("Username non valido. Lunghezza minima 4, massima 10. Sono accettati i seguenti caratteri a-z A-z 0-9");
        return false;
    }

    if ( ! (x.password.value).match(/^[a-zA-Z0-9]{4,10}$/) ) {
        x.password.focus();
        alert("Password non valida. Lunghezza minima 4, massima 10. Sono accettati i seguenti caratteri a-z A-z 0-9");
        return false;
    }

    if ( (x.password.value) != (x.password_1.value) ) {
        x.password_1.focus();
        alert("La conferma della password non coincide.");
        return false;
    }

    if ( ! (x.mailvalue).match(/^([A-Za-z0-9])+@([A-Za-z0-9])+.([A-Za-z]{2,4})$/) ) {
        x.mail.focus();
        alert("Indirizzo e-mail non valido.");
        return false;
    }

    return true;
}

function ValidazioneRicerca(type) {
    switch(type) {
        case 'default':
            var x=document.forms["ricercaDefault"]["keyword"];
            break;
        case 'avanzata':
            var x=document.forms["ricercaAvanzata"]["stringa"];
            break;
        default:
            var x=document.forms["ricercaDefault"]["keyword"];
    }
    if ( (x.value).length < 4) {
        x.focus();
        alert("Inserire almeno 4 caratteri.");
        return false;
    }

    return true;
}

function BeSure() {
    if( confirm('L\'azione sarà irreversibile. Desideri continuare?') )
        return true;
    else
        return false;
}