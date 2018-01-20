    <div class="formRicercaAvanzata">
        <form name="ricercaAvanzata" action="index.php" method="get">
            <input type="hidden" name="controller" value="ricerca" />
            <input type="hidden" name="task" value="cerca" />
            <fieldset>
                <table>
                    <tr>
               <td>Condizione (da 1 a 5)</td>
               <td>Anno stampa minimo</td>
              <td>Comune</td>

                        <td>Prezzo</td>
                <td>Ordina per: </td>
                        <td>spedizione</td>
                    </tr>
                    <tr>
                        <td><select name="condizione">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select></td>
                        <td><input name="anno_stampa" value="2010" /> </td>
                        <td><select name="comune">
                                <option value="">Tutti</option>
                                <option value="Ascoli Piceno">Ascoli Piceno</option>
                                <option value="Chieti">Chieti</option>
                                <option value="Sambuceto">Sambuceto</option>
                                <option value="Rieti">Rieti</option>
                            </select></td>
                        <td><input name="prezzo" value="30" /></td>
                        <td><select name="ordinamento">
                                <option value="data">data</option>
                                <option value="prezzo">prezzo</option>
                                <option value="condizione">condizione</option>
                            </select> </td>
                        <td><select name="se_spedisce">
                                <option value=""> </option>
                                <option value="1">SI</option>
                                <option value="0">NO</option>
                            </select></td>
                    </tr>
                </table>
                <input name="stringa" id="stringaRicerca" placeholder="Ricerca..." required/>
                <input type="submit" class="button" value="cerca" onclick="return ValidazioneRicerca('avanzata')" />
            </fieldset>
        </form>
    </div>
