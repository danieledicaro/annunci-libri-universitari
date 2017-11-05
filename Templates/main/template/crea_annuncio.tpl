<form
      method="Post">

    titolo libro: <input type="text"
                               id="titolo"
                               name="titolo">
    <br>
    <br>

    nome venditore: <input type="text"
                         id="venditore"
                         name="venditore">
    <br>
    <br>

    corso: <input type="text"
                         id="corso"
                         name="corso">
    <br>
    <br>

    città consegna: <input type="text"
                         id="città"
                         name="città">
    <br>
    <br>

    se spedisce: <select
                         id="spedizione"
                         name="spedizione">
        <option value="true"> Sì </option>
        <option value="false"> No </option>
    </select>
    <br>
    <br>

    descrizione: <textarea
                         id="descrizione"
                         name="descrizione">
    </textarea>
    <br>
    <br>

    condizione: <select
                         id="condizione"
                         name="condizione">
        <option value="nuovo"> Nuovo </option>
        <option value="usato"> Usato </option>
    </select>
    <br>
    <br>

    foto: <input type="file"
                         id="foto"
                         name="foto">
    <br>
    <br>

    tipo foto: <select
                         id="tipo file"
                         name="tipo file">
        <option value="jpeg"> JPEG </option>
        <option value="png"> PNG </option>
    <br>
    <br>

    prezzo: <input type="text"
                         id="prezzo"
                         name="prezzo">
    <br>
    <br>



    <input type="submit"
           id="commandSubmit"
           value="Salva Dati"
           name="commandSubmit">

</form>
