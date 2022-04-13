<?php
try {
    $pdo=new PDO("sqlite:cov");
}catch (Exception $e) {
    echo "Μη δυνατή σύνδεση";
    echo $e->getMessage();
	exit();
}
try{
	
    foreach ($pdo->query("SELECT * FROM connect join user where user.id=usrId") as $row){ 
		echo "<H2>".$row['gender']." ".$row['name']." ".$row['surname']." καλώς ορίσατε</H1></br></br>";
		echo "<input type='button' onclick=discon() value='Αποσύνδεση'/>";	 //βρισκουμε το ονομα του χρηστη με βαση το id και εμφανιζουμε το μνμ
	}                                                                        // επισης βαζουμε και ενα κουμπι αποσυνδεση που οταν το παταμε εκτελειται τη συναρτηση discon
}catch (Exception $e) {
	echo $e->getMessage();
	echo "Μη δυνατή σύνδεση";
	exit();
}
?>