<div style="border:1px solid sandybrown">
    {if $dati != false}
        Messaggi con
        <b>{$dati.messaggio[0]->getAcquirente()}</b>
        riferiti all'annuncio
        <b>{$dati.messaggio[0]->getLibro()}</b>
        <hr width="200px"/>
        <table>
            <tr>
                <th></th>
                <th>Data</th>
                <th>Ora</th>
                <th>Messaggio</th>
            </tr>
            {section name=i loop=$dati.messaggio}
            <tr>
                <td>{if $dati.messaggio[i]->getDaAcquirente() == 1}
                        Acquirente
                    {else}
                        Venditore
                    {/if}</td>
                <td>{$dati.messaggio[i]->getData()}</td>
                <td>{$dati.messaggio[i]->getOra()}</td>
                <td>{$dati.messaggio[i]->getTesto()}</td>
            <tr>
                {/section}
        </table>
    {/if}
    <form action="index.php" method="get">
        <fieldset>
            <input name="messaggio" class="field"  placeholder="Scrivi qui il messaggio di risposta" />
            <input type="hidden" name="controller" value="boxmail" />
            <input type="hidden" name="task" value="nuovo_messaggio" />
            <input type="hidden" name="acquirente" value="{$dati.messaggio[0]->getAcquirente()}" />
            <input type="hidden" name="idAnnuncio" value="{$dati.messaggio[0]->getAnnuncio()}" />
            <input type="submit" class="button" value="Invia" />
        </fieldset>
    </form>
</div>