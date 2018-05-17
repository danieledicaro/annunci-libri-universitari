{if $errore != false}ERRORE <span id="errore">{$errore}</span><br />{/if}
{if $dati != false}
Messaggi
{*$dati.venditore*}
per 
<b>{$dati.messaggio[0]->getLibro()}</b>
<hr width="200px"/>
<table id="chatContainer">
    {section name=i loop=$dati.messaggio}
    <tr><td>
            {if $dati.messaggio[i]->getDaAcquirente() == 1}
            <table class="messaggio msgRight fl_right">
                {else}
                <table class="messaggio msgLeft fl_left">
                    {/if}
                    <tr><td>{$dati.messaggio[i]->getData()}</td><td>{$dati.messaggio[i]->getOra()}</td></tr>
                    <tr><td class="testoMessaggio" colspan="2">{$dati.messaggio[i]->getTesto()}</td></tr>
                    <tr><td colspan="2">&nbsp;</td></tr>
                </table>
                </td></tr>
                {/section}
                {/if}
                <tr><td colspan="2">
                        <form action="index.php" method="get">
                            <fieldset class="">
                                <input name="messaggio" class="campoMessaggio"  placeholder="Scrivi qui il messaggio di risposta" />
                                <input type="hidden" name="controller" value="boxmail" />
                                <input type="hidden" name="task" value="nuovo_messaggio" />
                                <input type="hidden" name="acquirente" value="{$dati.messaggio[0]->getAcquirente()}" />
                                <input type="hidden" name="idAnnuncio" value="{$dati.messaggio[0]->getAnnuncio()}" />
                                <input type="submit" class="button" value="Invia" />
                            </fieldset>
                        </form></td></tr>
            </table>