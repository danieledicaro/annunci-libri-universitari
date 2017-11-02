        <form name="formRegistrazione" id="formRegistrazione" method="post" action="index.php" >
            <fieldset><legend>&nbsp;CREDENZIALI DI ACCESSO&nbsp;</legend>
                <p><label for="username" class="left">Nome utente:</label>
                    <input type="text" name="username" tabindex="1" required/></p>
                <p><label for="password" class="left">Password:</label>
                    <input type="password" name="password" tabindex="2" required/></p>
                <p><label for="password_1" class="left">Ripeti password:</label>
                    <input type="password" name="password_1" tabindex="3" required/></p>
            </fieldset>
            <fieldset><legend>&nbsp;DETTAGLI ANAGRAFICI&nbsp;</legend>
                <p><label for="nome" class="left">Nome:</label>
                    <input type="text" name="nome" tabindex="4" required/></p>
                <p><label for="cognome" class="left">Cognome:</label>
                    <input type="text" name="cognome" tabindex="5"/></p>
                <p><label for="stato" class="left">Stato:</label>
                    <select name="stato" id="stato" tabindex="6" required>
                        <option disabled selected value> -- scegli uno stato -- </option>
                        {foreach from=$stati item=nome key=id}
                            <option value="{$id}">{$id} - {$nome}</option>
                        {/foreach}
                    </select></p>
                <p><label for="email" class="left">Email:</label>
                    <input type="text" name="mail" tabindex="7" required/></p>
                <input type="hidden" name="controller" value="registrazione" />
                <input type="hidden" name="task" value="salva" />
                <p><input type="submit" value="Registrati" tabindex="8" onclick="return ValidazioneRegistrazione()" /></p>
            </fieldset>
        </form>
