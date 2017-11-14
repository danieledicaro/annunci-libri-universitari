{php}$path = "/WebProg/unibookstore";{/php}
    ERRORE BOXMAIL: {$errore} <br />
    {if $annuncio != false}<a href="http://{$smarty.server.HTTP_HOST}{php}echo $path;{/php}/index.php?controller=ricerca&task=dettagli&id_annuncio={$annuncio}">Torna all'annuncio</a>{/if}