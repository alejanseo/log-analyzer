# log-analyzer
<h2>Script in PHP per importare i log access in un database MySQL</h2>

Questo script in PHP consente di importare i dati (log access) degli accessi al tuo server Apache all'interno di un database MySQL.
Su tale database potrai effettuare delle utilissime analisi utilizzando i connettori MySQL di Data Studio. Per crearti uno storico appfofindito di tutti gli accessi lo script va eseguito ogni giorno con un cron-job.

Qui un valido <a href="https://datastudio.google.com/open/0B4XIs_msfiVTaUdubExIREZkdTQ">esempio</a>

<h2>Cosa analizzare con Data Studio</h2>
Per prima cosa ti puoi effettuare un'analisi delle richieste dei differenti user-agent, immagino ti vorrai soffermare su Googlebot e le diverse varianti quali Smartphone e Immagini.
Inoltre potrai raggruppare e aggregare i dati in base a delle regole di regex come ad esempio tutti i file che terminano con .js .css. oppure path di categorie di url.
