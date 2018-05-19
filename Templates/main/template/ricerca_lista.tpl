<table class="listaAnnunci">
    {if $dati == false}
    <p>nessun annuncio pubblicato</p>
    {/if}
    {if $dati != false}
    <tr>
        <th></th>
        <th colspan="2">Libro</th>
        <th>Prezzo</th>
        <th>Città</th>
        <th>se Spedisce</th>
        <th>Condizione</th>
    </tr>
    
        {section name=i loop=$dati}
            {if $smarty.section.i.iteration % 2 == 1}
                <tr>
                    <td><a href="?controller=ricerca&task=dettagli&id_annuncio={$dati[i]->getIdAnnuncio()}">APRI</a></td>
                    <td><a href="?controller=ricerca&task=dettagli&id_annuncio={$dati[i]->getIdAnnuncio()}"><img src="?controller=ricerca&task=foto&id_annuncio={$dati[i]->getIdAnnuncio()}" /></a></td>
                    <td><a href="?controller=ricerca&task=dettagli&id_annuncio={$dati[i]->getIdAnnuncio()}">{$dati[i]->getLibro()}</a></td>
                    <td>{$dati[i]->getPrezzo()|string_format:"%.2f"}</td>
                    <td>{$citta[i]}</td>
                    <td>{$dati[i]->getSeSpedisce()}</td>
                    <td>{section name=foo start=1 loop=$dati[i]->getCondizione() step=1}
                            <img src="{$appPath}/img/star.png" />
                        {/section}</td>
                </tr>
            {/if}
        {/section}
    {/if}
    {*uguale a sopra*}
    {if $dati != false}
    {section name=i loop=$dati}
    {if $smarty.section.i.iteration % 2 == 0}
        <tr>
            <td><a href="?controller=ricerca&task=dettagli&id_annuncio={$dati[i]->getIdAnnuncio()}">APRI</a></td>
            <td><a href="?controller=ricerca&task=dettagli&id_annuncio={$dati[i]->getIdAnnuncio()}"><img src="?controller=ricerca&task=foto&id_annuncio={$dati[i]->getIdAnnuncio()}" /></a></td>
            <td><a href="?controller=ricerca&task=dettagli&id_annuncio={$dati[i]->getIdAnnuncio()}">{$dati[i]->getLibro()}</a></td>
            <td>{$dati[i]->getPrezzo()|string_format:"%.2f"}</td>
            <td>{$citta[i]}</td>
            <td>{$dati[i]->getSeSpedisce()}</td>
            <td>{section name=foo start=1 loop=$dati[i]->getCondizione() step=1}
                    <img src="{$appPath}/img/star.png" />
                {/section}</td>
        </tr>
    {/if}
    {/section}
    {/if}
    </table>
{if $pagine!=''}
    <br/>----------------------------------------------
    <br/>naviga le pagine
            {section name=pages loop=$pagine}
                <a href="index.php?controller=ricerca&task={$task}{if $parametri!=''}&{$parametri}{/if}&page={$smarty.section.pages.iteration-1}">{$smarty.section.pages.iteration}</a>
            {/section}
{/if}