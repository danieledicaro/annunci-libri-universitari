<div style="border:1px solid sandybrown">
    ELENCO CONVERSAZIONI
    {$task}
    {if $dati != false}
        {section name=i loop=$dati}
            <br/>{$dati[i].conversazioni[0]} {*acquirente*}
            <br/>{$dati[i].conversazioni[1]} {*id annuncio*}
        {/section}
    {/if}
</div>