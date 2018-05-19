    <h1>{$dati.titolo}</h1>
    <table class="dettagli-annuncio">
        <tr>
            <td><img class="copertina" src="?controller=ricerca&task=foto&id_annuncio={$dati.id_annuncio}" /></td>
            <td>
                <ul><h3>€{$dati.prezzo}</h3>
                    <li>ISBN: {$dati.libro}</li>
                    <li>Condizione: {section name=foo start=1 loop=$dati.condizione step=1}
                            <img style="width:20px" src="{$appPath}/img/star.png" />
                        {/section}</li>
                    <li>Consegna a: {$dati.citta_consegna}
                    {if $dati.se_spedisce != true}
                        <li>Spedizione non disponibile</li>
                    {else}
                        <li>Spedizione disponibile</li>
                    {/if}
                </ul>
            </td>
        </tr>
    </table>
    <p>Annuncio (id: {$dati.id_annuncio}) inserito il {$dati.data} da {$dati.venditore}.</p>
    <p>Descrizione: {$dati.descrizione}</p>
    {$dati.corso}
    
    
    
    
    
    
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
