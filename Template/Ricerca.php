{include 'includes/header.php'}
<!--campo per la ricerca di un libro-->
<form action="Ricerca.php"
      method="Post">

    termine di ricerca: <input type="text"
                     id="stringa"
                     name="stringa">
    <br>
    <br>

   <!-- città: <input type="text"
                     id="txtCitta"
                     name="txtCitta">


    <br>
    <br> -->
    <!-- il tag select costruisce una tendina (oppure un select box, ovvero una casella con i dati a discesa già impostati
    il tag option aggiunge un valore alla select box, si hanno tanti option quanti i valori che ti servono, dentro value (tra
    le virgolette) si vede il valore che però è nascosto all'utente; il valore che si vede nella tendina è fuori, tra i due
    option-->
   <!-- corso : <select><option value="Fisica">Fisica</option>
    <option value="Analisi">Analisi</option></select>
    <br>
    <br> (commento tutto per attenermi al codice di Enrico, ma nel caso si facesse una ricerca avanzata lo abbiamo pronto) -->


    <input type="submit"
           id="commandSubmit"
           value="Salva Dati"
           name="commandSubmit">

</form>
{include 'includes/footer.php'}