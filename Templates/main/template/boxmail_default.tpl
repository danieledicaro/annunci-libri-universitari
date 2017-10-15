
    {if $dati != false}
        MESSAGGI RICEVUTI DAGLI ACQUIRENTI
        <table>
            <tr>
                <th></th>
                <th>Annuncio</th>
                <th>Acquirente</th>
                <th>Numero messaggi</th>
            </th>

        {section name=i loop=$dati}
                {if $dati[i]->getAcquirente() != $username}
            <tr>
                <td><a href="?controller=boxmail&task=dettagli&acquirente={$dati[i]->getAcquirente()}&idAnnuncio={$dati[i]->getIdAnnuncio()}">Apri</a></td>
                <td>{$dati[i]->getIdAnnuncio()}</td>
                <td>{$dati[i]->getAcquirente()}</td>
                <td>{$dati[i]->getNumeroMessaggi()}</td>
            </tr>
            {/if}
        {/section}

        </table>
        <hr width="150px"/>
        MESSAGGI INVIATI AI VENDITORI
        <table>
            <tr>
                <th></th>
                <th>Annuncio</th>
                <th>Acquirente</th>
                <th>Numero messaggi</th>
                </th>

                {section name=i loop=$dati}
                {if $dati[i]->getAcquirente() == $username}
            <tr>
                <td><a href="?controller=boxmail&task=dettagli&acquirente={$dati[i]->getAcquirente()}&idAnnuncio={$dati[i]->getIdAnnuncio()}">Apri</a></td>
                <td>{$dati[i]->getIdAnnuncio()}</td>
                <td>{$dati[i]->getAcquirente()}</td>
                <td>{$dati[i]->getNumeroMessaggi()}</td>
            </tr>
            {/if}
            {/section}

        </table>
    {/if}
