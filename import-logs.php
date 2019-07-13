<?php
// definisco i valori del server sadasdasdas
$login = 'username';
$password = 'password';
$host = "nome_host";
$yesterday = date("Ymd", strtotime( '-1 days' ));
$current_month = date("m-Y", strtotime( '-1 days' ));
$file = 'allogs'.$yesterday.'.log.gz';
//definiamo il percorso di orgine del file di log
$data = file_get_contents("ftp://".$login.":".$password."@".$host."/logs/access.log-".$yesterday."");
file_put_contents($file, $data);
//questo file non necessita di unzip basterà rinominare il file in .log - in altri casi serve unzip
$new_file ="ultimo.log";
rename ($file , $new_file);
// apriamo il file
$apri = fopen($new_file, "r");
// trasformo ogni riga del file in array
while (!feof($apri)) {
	//apri il file
	$contenuto = fgets($apri);
	//distinguo i contenuti usando come separatore lo spazio
	$elementi = (explode(" ", $contenuto));
	//stampo la array così vedo cosa ha definito
	var_dump( explode( ' ', $contenuto) );
	// definisco la stringa indirizzo IP
	$ip = $elementi[0];
	//stringa data
	$data__ = $elementi[3];
	//rimuovo parentesi quadra e ora dalla data - nel mio caso non serve quest'ultimo valore
	$data_= substr($data__, 1, -9);
	//converto i contenuti della data e sostituisco lo slash al simbolo meno - definisco poi la stringa della data = $data
	$cambiodata = explode ('/', $data_);
	$reverse = array_reverse($cambiodata);
	$data = implode("-", $reverse);
	//modifico la data nel formato che serve a MySQL e data studio: gg-mm-aaaa
	$data = strtotime($data);
	$giorno = date('Y-m-j',$data);
	$giorno-> depositdate === NULL; 
	//stringa tipo request 
	$request_ = $elementi[5];
	//rimuovo l'apice dal campo della request
	$request = substr($request_, 1);
	//stringa della URL richiesta
	$url = $elementi[6];
	//stringa status code
	$status = $elementi[8];
	//bite della singola richiesta
	$bite = $elementi[9];
	//Referrer URL
	$ref_ = $elementi[10];
	//rimuovo doppi apici dal campo ref.
	$ref = substr($ref_, 1, -1);
	//user agent - unisco 40 campi tutti specifici dell'user agent
	$useragent_ = $elementi[11].' '.$elementi[12].' '.$elementi[12].' '.$elementi[13].' '.$elementi[14].' '.$elementi[15].' '.$elementi[16].' '.$elementi[17].''.$elementi[18].' '.$elementi[19].' '.$elementi[20].' '.$elementi[21].' '.$elementi[22].' '.$elementi[23].' '.$elementi[24].' '.$elementi[25].' '.$elementi[26].' '.$elementi[27].' '.$elementi[28].' '.$elementi[29].' '.$elementi[30].' '.$elementi[31].' '.$elementi[32].' '.$elementi[33].' '.$elementi[34].' '.$elementi[34].' '.$elementi[35].' '.$elementi[36].' '.$elementi[37].' '.$elementi[38].' '.$elementi[39].' '.$elementi[40].' '.$elementi[41].' '.$elementi[42].' '.$elementi[43].' '.$elementi[44].' '.$elementi[45].' '.$elementi[46].' '.$elementi[47].' '.$elementi[48].' '.$elementi[49].' '.$elementi[50];
//stampo le stringe così vedo cosa ha raccolto
	echo "<h1>Ip:";
	echo $ip;
	echo "</h1>";
	echo "<h1>Data:";
	echo $giorno;
	echo "</h1>";
	echo "<h1>Request:";
	echo $request;
	echo "</h1>";
	echo "<h1>URL:";
	echo $url;
	echo "</h1>";
	echo "<h1>Status:";
	echo $status;
	echo "</h1>";
	echo "<h1>bite:";
	echo $bite;
	echo "</h1>";
	echo "<h1>referr:";
	echo $ref;
	echo "</h1>";
	echo "<h1>useragent:";
	echo $useragent_;
	echo "</h1>";
	//ok, adesso inseriamo i dati raccolti nel database    
	//connessione al db
	$conn = new mysqli ('nome-host','user','password','nome-db');
	// definisco le query con i valori
	$sql = "INSERT INTO  nome-tabella (ip, date, request, url, status, bite, referal, uagent) VALUES ('$ip', '$giorno', '$request', '$url', '$status', '$bite', '$ref', '$useragent_')" ;
	//poiché il file di log ha sempre l'ultima riga vuota MySQL andrà ad inserire in tale campo un valore 19700101 - con questa query andremo a rimuoverla
	$sql_ = "DELETE FROM `nome-tabella` WHERE `date`=19700101";
	//con tale stringa rimuoveremo le richieste di questo file
	$sql__= "DELETE FROM `nome-tabella` WHERE `url` REGEXP '.*logs.php'";
	//eseguo le 3 query con php
	$conn->query($sql);
	$conn->query($sql_);
	$conn->query($sql__);
	echo "<pre>";
}
fclose($apri);
?>
