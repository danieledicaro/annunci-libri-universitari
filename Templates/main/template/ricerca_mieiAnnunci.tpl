<table class="listaAnnunci">
    {if $dati == false}
    <p>nessun annuncio pubblicato</p>
    {/if}
    {if $dati != false}
    <tr>
        <th></th>
        <th colspan="2">Libro</th>
        <th>Prezzo</th>
        <th>Cancella</th>
    </tr>
    
        {section name=i loop=$dati}
            {if $smarty.section.i.iteration % 2 == 1}
                <tr>
                    <td><a href="/?controller=ricerca&task=dettagli&id_annuncio={$dati[i]->getIdAnnuncio()}">APRI</a></td>
                    <td><a href="/?controller=ricerca&task=dettagli&id_annuncio={$dati[i]->getIdAnnuncio()}"><img src="/?controller=ricerca&task=foto&id_annuncio={$dati[i]->getIdAnnuncio()}" /></a></td>
                    <td><a href="/?controller=ricerca&task=dettagli&id_annuncio={$dati[i]->getIdAnnuncio()}">{$dati[i]->getLibro()}</a></td>
                    <td>{$dati[i]->getPrezzo()|string_format:"%.2f"}</td>
                    <td><a onclick="return BeSure()" href="/?controller=ricerca&task=cancella&id_annuncio={$dati[i]->getIdAnnuncio()}">Cancella</a></td>
               </tr>
            {/if}
        {/section}
    {/if}
    {*uguale a sopra*}
    {if $dati != false}
    {section name=i loop=$dati}
    {if $smarty.section.i.iteration % 2 == 0}
        <tr>
                    <td><a href="/?controller=ricerca&task=dettagli&id_annuncio={$dati[i]->getIdAnnuncio()}">APRI</a></td>
                    <td><a href="/?controller=ricerca&task=dettagli&id_annuncio={$dati[i]->getIdAnnuncio()}"><img src="/?controller=ricerca&task=foto&id_annuncio={$dati[i]->getIdAnnuncio()}" /></a></td>
                    <td><a href="/?controller=ricerca&task=dettagli&id_annuncio={$dati[i]->getIdAnnuncio()}">{$dati[i]->getLibro()}</a></td>
                    <td>{$dati[i]->getPrezzo()|string_format:"%.2f"}</td>
                    <td><a onclick="return BeSure()" href="/?controller=ricerca&task=cancella&id_annuncio={$dati[i]->getIdAnnuncio()}">Cancella</a></td>
               </tr>
    {/if}
    {/section}
    {/if}
    </table>
{if $pagine!=''}
    <br/>----------------------------------------------
    <br/>naviga le pagine
            {section name=pages loop=$pagine}
                <a href="index.php/?controller=ricerca&task={$task}{if $parametri!=''}&{$parametri}{/if}&page={$smarty.section.pages.iteration-1}">{$smarty.section.pages.iteration}</a>
            {/section}
{/if}