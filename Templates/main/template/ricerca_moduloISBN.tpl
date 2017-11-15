{if $errore != false}ERRORE <span id="errore">{$errore}</span><br />{/if}
<form method="post" action="index.php">
    <p><input type="hidden" name="controller" value="ricerca" /></p>
    <p><input type="hidden" name="task" value="nuovo_annuncio" /></p>
    <fieldset>
        <p><label>Codice ISBN:</label><br />
            <input name="isbn" placeholder="Inserisci l'ISBN del tuo libro" size="50" required/>
        <p><input type="submit" class="button" value="Cerca ISBN"  /></p>
    </fieldset>
</form>