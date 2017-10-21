<?php /* Smarty version 2.6.26, created on 2017-10-15 23:55:12
         compiled from ricerca_avanzata.tpl */ ?>
    <div class="searchform">
        <form action="index.php" method="get">
            <input type="hidden" name="controller" value="ricerca" />
            <input type="hidden" name="task" value="cerca" />
            <fieldset>
                <input name="stringa" class="field"  placeholder="Ricerca..." />
                condizione minima da 1 a 5<input name="condizione" value="2" />
                anno stampa minimo <input name="anno_stampa" value="2010" />
                comune
                <select name="comune">
                    <option value="">Tutti</option>
                    <option value="Chieti">Chieti</option>
                    <option value="Sambuceto">Sambuceto</option>
                    <option value="Rieti">Rieti</option>
                    <option value="Ascoli Piceno">Ascoli Piceno</option>
                </select>
                prezzo (verrà filtrato da -10 a +10)<input name="prezzo" value="30" />
                <select name="ordinamento">
                    <option value="data">data</option>
                    <option value="prezzo">prezzo</option>
                    <option value="condizione">condizione</option>
                </select>
                se spedisce<input name="se_spedisce" type="checkbox" checked="checked"/>
                <input type="submit" class="button" value="cerca" />
            </fieldset>
        </form>
    </div>