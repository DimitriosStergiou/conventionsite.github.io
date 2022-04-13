<?php
header('Content-Type: text/html; charset=utf-8');
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
	
		//foreach ($pdo->query("SELECT count(*) as c FROM admin where usr='$usr' and pwd='$pwd'") as $row)
			//$num=$row["c"];
		
		$stmt=$pdo->prepare("SELECT count(*) as c FROM admin where usr=:u and pwd=:p");
		$stmt->bindParam('u',$usr);
		$stmt->bindParam('p',$pwd);
		$stmt->execute();
		$row=$stmt->fetch();
		$num=$row["c"];
		
		if ($num==0)
			echo $num;
		else{
			echo "<table width='50%'>
					<tr>
						<th>ID</th>
						<th>Όνομα</th>
						<th>Επώνυμο</th>
						<th>Email</th>
						<th>Τηλέφωνο</th>
						<th>Username</th>
						<th>info Mail</th>
					</tr>";
			foreach ($pdo->query("SELECT * FROM user") as $row){ 
				echo "<tr class='row'>
					<td>".$row['id']."</td>
					<td>".$row['name']."</td>
					<td>".$row['surname']."</td>
					<td>".$row['mail']."</td>
					<td>".$row['phone']."</td>
					<td>".$row['usr']."</td>
					<td>".$row['getEmail']."</td>
				</tr>";

			}
			echo "</table>";	
		}
		
		
}catch (Exception $e) {
	echo $e->getMessage();
	echo "Μη δυνατή σύνδεση";
	exit();
}		

?>