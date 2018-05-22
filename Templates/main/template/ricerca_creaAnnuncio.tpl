{if $errore != false}ERRORE <span id="errore">{$errore}</span><br />{/if}
Stai creando un annuncio riferito al libro:
<br />ISBN: {$libro->getIsbn()}
<br />TITOLO: {$libro->getTitolo()}
<br />CASA EDITRICE: {$libro->getCasaeditrice('nome')}
<br />ANNO STAMPA: {$libro->getAnno_stampa()}
<br />AMBITO: {$libro->getAmbito('nome')}
<form method="post" id="form" enctype="multipart/form-data" action="/index.php?controller=ricerca&task=salva">
    <input type="hidden" name="isbn" value="{$libro->getIsbn()}"/>
    <fieldset>
        <input type="hidden" name="corso" value="" disabled />
        <p>città consegna:
        <select name="citta" required>
            <option value="1">L'Aquila</option>
            <option value="2">Chieti</option>
            <option value="3">Sambuceto</option>
            <option value="4">Rieti</option>
        </select></p>
        <p>se spedisce:
        <input type="radio" name="spedisce" value="1" checked="checked">Si
        <input type="radio" name="spedisce" value="0">No</p>
        <p>descrizione: <textarea name="descrizione"> </textarea></p>
        <p>condizione (da 1 a 5):
        <select name="condizione" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select></p>
        <p>foto: <input type="file" name="foto" accept="image/*" /></p>
        <p>prezzo: <input type="text" name="prezzo" required /></p>
        <br /> <input type="submit" value="Crea Annuncio">
    </fieldset>
</form>