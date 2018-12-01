# log analyzer
<h2>Importa i log access del tuo server in un database MySQL</h2>

Questo script in PHP ti consente di importare i dati degli accessi al tuo server all'interno di un database MySQL.
Su tale database potrai effettuare delle utilissime analisi utilizzando i connettori MySQL di Data Studio. Per crearti uno storico appfofindito di tutti gli accessi lo script va eseguito ogni giorno con un cron-job. Nel corso del tempo, otterrai un'infinità di dati da poter analizzare.

<h2>Cosa analizzare con Data Studio</h2>
Per prima cosa Data Studio ti permette di effettuare un'analisi delle richieste dai differenti user-agent, immagino ti vorrai soffermare su Googlebot e le <a href="https://support.google.com/webmasters/answer/1061943?hl=it">diverse varianti</a>.
Inoltre potrai aggregare i dati in base a delle regole di regex come ad esempio tutti i file che terminano con .js .css. oppure path di categorie di url.
Esempio di <a href="https://datastudio.google.com/open/0B4XIs_msfiVTaUdubExIREZkdTQ">cosa puoi analizzare</a>

<h2>Struttura di MySQL</h2>
Lo script va a definire 9 stringhe per poi inserirle nei campi del db. Tali stringhe sono:<br>

- ip: inserisce l'indirizzo IP della richiesta;
- request: Tipologia di richiesta effettuata (POST, GET, HEAD);
- url: singolo percorso richiesto;
- status: status code che ha risposto il server alla singola richiesta;
- bite: numero di byte trasferiti;
- referral: origine della visita - Google però non ha referral ;-); 
- useragent: nome dell'user agent della singola richiesta;
- date: data della singola richiesta.
