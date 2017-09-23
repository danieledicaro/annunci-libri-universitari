
<!--
 * Created by PhpStorm.
 * User: Ilaria
 * Date: 02/09/2017
 * Time: 10:01
 -->
{include 'includes/header.php'}
<form action="Utente.php"
      method="Post">
   <!--seguendo la funzione modifica password del controller: uso il tipe password in tutti i casi per renderla criptata-->
    inserire la vecchia password: <input type="password"
                     id="txtOld"
                     name="txtOld">
    <br>
    <br>
    inserire la nuova password: <input type="password"
                     id="txtNew"
                     name="txtNew">

    <br>
    <br>
    conferma password: <input type="password"
                     id="txtNew_1"
                     name="txtNew_1">
    <br>
    <br>


    <input type="submit"
           id="commandSubmit"
           value="Salva Dati"
           name="commandSubmit">

</form>
{include 'includes/footer.php'}
