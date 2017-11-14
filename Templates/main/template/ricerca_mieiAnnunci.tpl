    ANNUNCI PUBBLICATI:
    {if $dati == false}
    <p>nessun annuncio pubblicato</p>
    {/if}
    {if $dati != false}
        {section name=i loop=$dati}
            {if $smarty.section.i.iteration % 2 == 1}
                <br/>----------------------------------------------
                <br/> titolo {$dati[i]->getLibro()}
                <br/> <a href="?controller=ricerca&task=dettagli&id_annuncio={$dati[i]->getIdAnnuncio()}">dettagli</a>
                <br /> <a href="?controller=ricerca&task=cancella&id_annuncio={$dati[i]->getIdAnnuncio()}">cancella</a>
                <br/>venditore {$dati[i]->getVenditore()}
                <br/><img class="copertina" src="?controller=ricerca&task=foto&id_annuncio={$dati[i]->getIdAnnuncio()}" />
                <br/>corso {$dati[i]->getCorso()}
                <br/>prezzo {$dati[i]->getPrezzo()|string_format:"%.2f"}
                <br/> citta consegna {$dati[i]->getCittaConsegna()}
                <br/> se spedisce {$dati[i]->getSeSpedisce()}
                <br/> descrizione {$dati[i]->getDescrizione()}
                <br/> condizione {$dati[i]->getCondizione()}
            {/if}
        {/section}
    {/if}
    {*uguale a sopra*}
    {if $dati != false}
        {section name=i loop=$dati}
            {if $smarty.section.i.iteration % 2 == 0}
                <br/>----------------------------------------------
                <br/> titolo {$dati[i]->getLibro()}
                <br/> <a href="?controller=ricerca&task=dettagli&id_annuncio={$dati[i]->getIdAnnuncio()}">dettagli</a>
                <br /> <a href="?controller=ricerca&task=cancella&id_annuncio={$dati[i]->getIdAnnuncio()}">cancella</a>
                <br/>venditore {$dati[i]->getVenditore()}
                <br/><img class="copertina" src="?controller=ricerca&task=foto&id_annuncio={$dati[i]->getIdAnnuncio()}" />
                <br/>corso {$dati[i]->getCorso()}
                <br/>prezzo {$dati[i]->getPrezzo()|string_format:"%.2f"}
                <br/> citta consegna {$dati[i]->getCittaConsegna()}
                <br/> se spedisce {$dati[i]->getSeSpedisce()}
                <br/> descrizione {$dati[i]->getDescrizione()}
                <br/> condizione {$dati[i]->getCondizione()}
            {/if}
        {/section}
    {/if}

    {if $pagine!=''}
        <br/>----------------------------------------------
        <br/>naviga le pagine
        {section name=pages loop=$pagine}
            <a href="index.php?controller=ricerca&task={$task}{if $parametri!=''}&{$parametri}{/if}&page={$smarty.section.pages.iteration-1}">{$smarty.section.pages.iteration}</a>
        {/section}
    {/if}