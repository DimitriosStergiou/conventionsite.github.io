<?php
try {
    $pdo=new PDO("sqlite:cov");
}catch (Exception $e) {
    echo "Μη δυνατή σύνδεση";
    echo $e->getMessage();
	exit();
}

$usr=$_REQUEST["usr"];
$pwd=$_REQUEST["pwd"];

try{
	
	$found=0;
    //foreach ($pdo->query("SELECT * FROM user where usr='$usr' and pwd='$pwd'") as $row){ 
		//	echo "<H2>".$row['gender']." ".$row['name']." ".$row['surname']." καλώς ορίσατε</H1></br></br>";
		//	echo "<input type='button' onclick='discon()' value='Αποσύνδεση'/>";
		//	$found=1;
		//	$pdo->exec("UPDATE connect SET usrId= ".$row['id']." WHERE id=1");
		//	}

		$found=0;
		$stmt=$pdo->prepare("SELECT * FROM user where usr=:u");
		$stmt->bindParam('u',$usr);
		$stmt->execute();
		
		while ($row=$stmt->fetch()){
			if (password_verify($pwd,$row["pwd"])){
				echo "<H2>".$row['gender']." ".$row['name']." ".$row['surname']." καλώς ορίσατε</H1></br></br>";
				echo "<input type='button' onclick='discon()' value='Αποσdύνδεση'/>";
				$found=1;
				$pdo->exec("UPDATE connect SET usrId= ".$row['id']." WHERE id=1");
			}
		}
}catch (Exception $e) {
	echo $e->getMessage();
	echo "Μη δυνατή σύνδεση";
	exit();
}
	
if ($found==0)
	echo $found;
		

?>