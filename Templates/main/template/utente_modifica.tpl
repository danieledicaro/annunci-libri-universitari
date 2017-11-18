{if $modifica == 'mail'}
    {assign var='title' value="dell'indirizzo e-mail ($mail)"}
    {assign var='placeholder1' value='Inserisci il nuovo indirizzo email'}
    {assign var='placeholder2' value='Inserisci di nuovo il nuovo indirizzo email'}
    {assign var='task' value='mail'}
{/if}
{if $modifica == 'password'}
    {assign var='title' value='della password'}
    {assign var='placeholder1' value='Inserisci la nuova password'}
    {assign var='placeholder2' value='Inserisci di nuovo la nuova password'}
    {assign var='task' value='password'}
{/if}

<form method="post" action="index.php">
    <p><input type="hidden" name="controller" value="profile" /></p>
    <p><input type="hidden" name="task" value="modifica_{$task}" /></p>
    <fieldset>
        <p><label>Richiesta di modifica {$title}:</label><br />
            {if $modifica == 'password'}
                <input name="old" placeholder="Inserisci la password attuale" size="50" required/>
            {/if}
            <input name="new" placeholder="{$placeholder1}" size="50" required/>
            <input name="new_1" id="disabilitaIncolla" placeholder="{$placeholder2}" size="50" required/>
        <p><input type="submit" class="button" value="Cerca ISBN"  /></p>
    </fieldset>
</form>