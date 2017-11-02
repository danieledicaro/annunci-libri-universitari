    COMINCIA DICENDOCI COSA STAI CERCANDO
    <div class="searchform">
        <form name="ricercaDefault" action="index.php" method="get">
            <fieldset>
                <input name="keyword" placeholder="Fisica generale, anatomia, storia contemporanea, termodinamica, ..." size="50" required/>
                <input type="hidden" name="controller" value="ricerca" />
                <input type="submit" name="task" value="cerca" onclick="return ValidazioneRicerca('default')" />
            </fieldset>
        </form>
</div>