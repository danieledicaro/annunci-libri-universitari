{$errore}
<form method="post" action="index.php">
    <p><input type="hidden" name="rememberme" value="0" /></p>
    <p><input type="hidden" name="controller" value="registrazione" /></p>
    <p><input type="hidden" name="task" value="autentica" /></p>
    <fieldset>
        <p><label for="username" class="top">Nome utente:</label><br />
            <input type="text" name="username" id="username" tabindex="1" class="field" value="" /></p>
        <p><label for="password" class="top">Password:</label><br />
            <input type="password" name="password" id="password" tabindex="2" class="field" value="" /></p>
        <p><input type="submit" name="cmdweblogin" class="button" value="LOGIN"  /></p>
    </fieldset>
</form>
