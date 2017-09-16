{include 'includes/header.php'}
<!--nel template di registrazione dobbiamo mettere il form, che riprende dati dal database, action serve a indicare al form la pagina
a cui inviare i dati dell'utente, metod definisce la modalità con cui invi i dati in questa pagina, può essere post o get, il get passa
i dati dell'utente sull'URL, e Post li manda come intestazione nascosta della pagina...di solito si usa post-->
<form action="Registrazione.php"
metod="Post">
    <!--input prende vari attributi, il più importante è type, che ti dice il tipo di campo,
     in questo ho messo type text per fare un campo di testo libero-->
    username: <input type="text"
                     id="txtUsername"
                     name="txtUsername">
    <br>
    <br>
    <!--il type password rende la password criptata-->
    password: <input type="password"
                     id="txtPassword"
                     name="txtPassword">

  nome:  <input type="text"
           id="txtNome"
           name="txtNome">
    <!--il br è lo spazio verticale, invio, accapo, chiamatelo come vi pare-->
    <br>
    <br>
    cognome : <input type="text"
                     id="txtCognome"
                     name="txtCognome">
    <br>
    <br>
    mail : <input type="text"
                  id="txtMail"
                  name="txtMail">
<!-- ora ci vuole il pulsante di salvataggio dati, il campo submit invia al server il form costruito sopra-->
    <input type="submit"
           id="commandSubmit"
           value="Salva Dati"
           name="commandSubmit">

</form> <!--il tag form dà l'opportunità di inserire campi compilati dall'utente (esempio: campi di testo libero)-->
{include 'includes/footer.php'}
