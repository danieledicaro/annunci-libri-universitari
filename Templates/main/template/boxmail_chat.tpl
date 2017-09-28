<div style="border:1px solid sandybrown">
    {if $dati != false}
        {section name=i loop=$dati}
            <br/>{$dati[i].idAnnuncio}
            <br/>{$dati[i].messaggio.acquirente}
            <br/>{$dati[i].messaggio.annuncio}
            <br/>{$dati[i].messaggio.data}
            <br/>{$dati[i].messaggio.ora}
            <br/>{$dati[i].messaggio.testo}
            <br/>{$dati[i].messaggio.da_acquirente}
        {/section}
    {/if}
    form per l'invio di un nuovo messaggio
</div>