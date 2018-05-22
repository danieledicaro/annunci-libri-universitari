<div class="ricerca hidden">
    <h3>COMINCIA DICENDOCI COSA STAI CERCANDO</h3>
    <form name="ricercaDefault" action="/index.php" method="get">
        <fieldset>
            <input class="width75" name="keyword" placeholder="Fisica generale, anatomia, storia contemporanea, termodinamica, ..." required/>
            <input type="hidden" name="controller" value="ricerca" />
            <br /><input type="submit" name="task" value="cerca" onclick="return ValidazioneRicerca('default')" />
        </fieldset>
    </form>
</div>