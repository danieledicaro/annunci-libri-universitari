    DETTAGLI RICERCA:
    {$dati.titolo}
    {$dati.id_annuncio}
    {$dati.data}
    {$dati.libro}
    {$dati.venditore}
    {$dati.corso}
    {$dati.citta_consegna}
    {$dati.se_spedisce}
    {$dati.descrizione}
    {$dati.condizione}
    foto{*$dati.foto*}
    {$dati.foto_tipo}
    {$dati.prezzo}
    {if $dati.acquirente != false}
    <form action="index.php" method="get">
        <input type="hidden" name="controller" value="boxmail" />
        <input type="hidden" name="task" value="contatta_venditore" />
        <input type="hidden" name="acquirente" value="{$dati.acquirente}" />
        <input type="hidden" name="venditore" value="{$dati.venditore}" />
        <input type="hidden" name="idAnnuncio" value="{$dati.id_annuncio}" />
        <fieldset>
            <input name="messaggio" class="field"  placeholder="Salve, sono interessato al libro." />
            <input type="submit" class="button" value="Invia il messaggio" />
        </fieldset>
    </form>
        {else}
        <form action="index.php" method="get">
                <input type="hidden" name="controller" value="registrazione" />
                <input type="hidden" name="task" value="login" />
                <input type="hidden" name="idAnnuncio" value="{$dati.id_annuncio}" />
            <fieldset>
                <input type="submit" class="button" value="Esegui il login per contattare il venditore" />
            </fieldset>
        </form>
    {/if}
