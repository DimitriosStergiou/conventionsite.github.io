<?php
try {
    $pdo=new PDO("sqlite:cov");
}catch (Exception $e) {
    echo "Μη δυνατή σύνδεση";
    echo $e->getMessage();
	exit();      
}
try {
    $name=$_REQUEST["name"];           
	$surname=$_REQUEST["surname"];
	$gender=$_REQUEST["gender"];
	$mail=$_REQUEST["mail"];
	$phone=$_REQUEST["phone"];
	$usr=$_REQUEST["usr"];
	$pwd=password_hash($_REQUEST["pwd"],PASSWORD_DEFAULT);
	$getMail=$_REQUEST["getMail"];


	//$pdo->exec("INSERT INTO user (name,surname,gender,phone,mail,usr,pwd,getEmail) VALUES
	//	('$name','$surname','$gender','$phone','$mail','$usr','$pwd','$getMail');");
	
	
		$stmt=$pdo->prepare("INSERT INTO user (name,surname,gender,phone,mail,usr,pwd,getEmail) VALUES
		(:n,:s,:g,:p,:m,:u,:pw,:gm);");
		$stmt->bindParam('n',$name);
		$stmt->bindParam('s',$surname);
		$stmt->bindParam('g',$gender);
		$stmt->bindParam('p',$phone);
		$stmt->bindParam('u',$usr);
		$stmt->bindParam('m',$mail);
		$stmt->bindParam('pw',$pwd);
		$stmt->bindParam('gm',$getMail);
		$stmt->execute();
	}catch (Exception $e) {                   
		echo $e->getMessage();
		echo "Μη δυνατή σύνδεση";           
		exit();
	}
	echo "Ευχαριστούμε για την εγγραφή"      

?>