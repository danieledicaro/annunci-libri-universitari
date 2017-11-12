Stai creando un annuncio riferito al libro:
<br />ISBN: {$libro->getIsbn()}
<br />TITOLO: {$libro->getTitolo()}
<br />CASA EDITRICE: {$libro->getCasaeditrice()}
<br />ANNO STAMPA: {$libro->getAnno_stampa()}
<br />AMBITO: {$libro->getAmbito()}
<form method="post" enctype="multipart/form-data" action="index.php?controller=ricerca&task=salva">
    <input type="hidden" name="isbn" value="{$libro->getIsbn()}"/>
    <fieldset>
        <br /> corso: <input type="text" name="corso" value="" disabled />
        <br /> città consegna: <input type="text" name="città" value="" disabled />
        <br /> se spedisce:
        <input type="radio" name="spedisce" value="1" checked="checked">Si
        <input type="radio" name="spedisce" value="0">No
        <br /> descrizione: <textarea name="descrizione"> </textarea>
        <br /> condizione (da 1 a 5):
        <select name="condizione" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <br /> foto: <input type="file" name="foto" accept="image/*" />
        <br /> prezzo: <input type="text" name="prezzo" required />
        <br /> <input type="submit" value="Crea Annuncio">
    </fieldset>
</form>