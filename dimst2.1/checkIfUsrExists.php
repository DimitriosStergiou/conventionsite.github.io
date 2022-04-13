<?php
try {
    $pdo=new PDO("sqlite:cov");
}catch (Exception $e) {
    echo "Μη δυνατή σύνδεση";
    echo $e->getMessage();
	exit();
}

$usr=$_REQUEST["usr"];

try{
	
	$found=0;
    foreach ($pdo->query("SELECT * FROM user") as $row) 
		if($usr==$row["usr"]){
			$found=1;	
		}
		
}catch (Exception $e) {
	echo $e->getMessage();
	echo "Μη δυνατή σύνδεση";
	exit();
}
	
echo $found;
	
		

?>