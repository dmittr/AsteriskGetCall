<?php

include ("config.php");
if ((!isset($_SERVER['HTTPS'])) || ($_SERVER['HTTPS']!="on")) {
	die ("HTTPS REQUIRED");
}

if (count($_REQUEST)==0) {
	die ("EMPTY REQUEST");
}

if (!isset($_REQUEST['token'])){
	die ("EMPTY TOKEN");
}

if (!isset($_REQUEST['date'])){
	die ("EMPTY DATE");
}

if (!preg_match("/[0-9]{4}-[0-9]{2}-[0-9]{2}/", $_REQUEST['date'])){
	die ("WORNG DATE FORMAT");
}


if (!isset($_REQUEST['num'])){
	die ("EMPTY NUM");
}

if (!isset($conf['tokens'][$_REQUEST['token']])){
	die ("WORNG TOKEN");
}

$ALLOWED=false;
foreach($conf['tokens'][$_REQUEST['token']] as $NUM) {
	if ($NUM==$_REQUEST['num']) {
		$ALLOWED=true;
	}
}

if (!$ALLOWED) {
	die ("NUM NOT ALLOWED");
}

$opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
$pdo = new PDO("mysql:host=".$conf["DBHOST"].";dbname=".$conf["DBNAME"].";charset=utf8", $conf["DBUSER"], $conf["DBPASS"],$opt);

$QUERY="SELECT * FROM cdr WHERE `calldate` like '".$_REQUEST['date']."%' and ( 
	`cnum` like '".$_REQUEST['num']."' or 
	`src` like '".$_REQUEST['num']."' or 
	`dst` like '".$_REQUEST['num']."' 
) ";

$stmt = $pdo->query($QUERY);
$ARR=[];
$DOWNLOAD=false;
while ($row = $stmt->fetch()){
	if ((!empty($_REQUEST['file'])) && ($_REQUEST['file']==$row['recordingfile'])){
		$DOWNLOAD=$conf["recordpath"]."/".str_replace("-", "/", $_REQUEST['date'])."/".$row['recordingfile'];
		$FILENAME=$row['recordingfile'];
	}
	$ARR[]=$row;
}
if ($DOWNLOAD){
	header('Content-type: audio/wav');
	header('Content-Disposition: attachment; filename="'.$FILENAME.'"');
	readfile($DOWNLOAD);
} else {
	echo json_encode($ARR);
}


?>