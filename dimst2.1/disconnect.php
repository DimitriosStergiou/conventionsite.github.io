<?php
try {
    $pdo=new PDO("sqlite:cov");
}catch (Exception $e) {
    echo "Μη δυνατή σύνδεση";
    echo $e->getMessage();
	exit();
}
try{ 
	$pdo->exec("UPDATE connect SET usrId=0 WHERE id=1");  //βαζουμε 0 στο μονο πεδιο του table
}catch (Exception $e) {
	echo $e->getMessage();
	echo "Μη δυνατή σύνδεση";
	exit();
}
?>