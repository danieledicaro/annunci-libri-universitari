<div style="border:1px solid green">
    RISULTATO:
    {*copiato da ricerca_lista*}
    {if $dati != false}
        {section name=i loop=$dati}
            {if $smarty.section.i.iteration % 2 == 1}
                <br/> id annuncio {$id_annuncio}
                <br/> url ?controller=ricerca&task=dettagli&id_libro={$dati[i].libro}
                <br/>venditore {$dati[i].venditore}
                <br/>foto {$dati[i].foto}
                <br/>corso {$corso}
                <br/>prezzo {$dati[i].prezzo|string_format:"%.2f"}
                <br/> citta consegna {$citta_consegna}
                <br/> se spedisce {$se_spedisce}
                <br/> descrizione {$descrizione}
                <br/> condizione {$condizione}
            {/if}
        {/section}
    {/if}
    { *uguale a sopra*}
    {if $dati != false}
        {section name=i loop=$dati}
            {if $smarty.section.i.iteration % 2 == 0}
                <br/> id annuncio {$id_annuncio}
                <br/> url ?controller=ricerca&task=dettagli&id_libro={$dati[i].libro}
                <br/>venditore {$dati[i].venditore}
                <br/>foto {$dati[i].foto}
                <br/>corso {$corso}
                <br/>prezzo {$dati[i].prezzo|string_format:"%.2f"}
                <br/> citta consegna {$citta_consegna}
                <br/> se spedisce {$se_spedisce}
                <br/> descrizione {$descrizione}
                <br/> condizione {$condizione}
            {/if}
        {/section}
    {/if}
</div>