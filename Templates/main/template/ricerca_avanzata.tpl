    <div class="searchform">
        <form name="ricercaAvanzata" action="index.php" method="get">
            <input type="hidden" name="controller" value="ricerca" />
            <input type="hidden" name="task" value="cerca" />
            <fieldset>
                <table>
                    <tr>
                <td colspan="2"> <input name="stringa" class="field" placeholder="Ricerca..." required/></td>
                    </tr>
                    <tr>
               <td> Condizione minima da 1 a 5:</td> <td><input name="condizione" value="2" /> </td>
                    </tr>
                    <tr>
               <td>  anno stampa minimo </td> <td><input name="anno_stampa" value="2010" /> </td>
                    </tr>
                    <tr>
              <td>  comune </td>
                <td><select name="comune">
                    <option value="">Tutti</option>
                    <option value="Ascoli Piceno">Ascoli Piceno</option>
                    <option value="Chieti">Chieti</option>
                    <option value="Sambuceto">Sambuceto</option>
                    <option value="Rieti">Rieti</option>
                </select></td>
                    </tr>
                    <tr>
                        <td> prezzo (verrà filtrato da -10 a +10):</td><td><input name="prezzo" value="30" /></td>
                    </tr>
                    <tr>
                <td>Ordina per: <td><select name="ordinamento">
                 <option value="data">data</option>
                    <option value="prezzo">prezzo</option>
                    <option value="condizione">condizione</option>
                </select> </td>
                    </tr>
                    <tr>
                        <td>Se spedisce:</td><td><select name="se_spedisce">
                       <option value=""> </option>
                    <option value="1">SI</option>
                    <option value="0">NO</option>
                </select></td>
                    </tr>
                </table>
                <input type="submit" class="button" value="cerca" onclick="return ValidazioneRicerca('avanzata')" />
            </fieldset>
        </form>
    </div>
