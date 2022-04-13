<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<ul id="menu">
		  <li class="menu"><a class="active" href="index.html">Κεντρική</a></li>
		  <li class="menu"><a href="content.html">Περιεχόμενο</a></li>
		  <li class="menu"><a href="speakers.html">Ομιλητές</a></li>
		  <li class="menu"><a href="program.php">Πρόγραμμα</a></li>
		  <li class="menu"><a href="location.html">Tοποθεσία</a></li>
		  <li class="menu"><a href="sign-up.html">Εγγραφείτε</a></li>
		  <li class="menu"><a href="log-in.html">Log in</a></li>
		</ul>
</html>
<?php
	try {
    $pdo=new PDO("sqlite:cov");
}catch (Exception $e) {
    echo "Μη δυνατή σύνδεση";
    echo $e->getMessage();
	exit();
}
try{
	$connect=0;
    foreach ($pdo->query("SELECT usrId FROM connect") as $row)
		if ($row["usrId"]!="0")
			echo $row["usrId"];
		else
			echo "jh";
}catch (Exception $e) {
	echo $e->getMessage();
	echo "Μη δυνατή σύνδεση";
	exit();
}
?>