<?php
  
	$link = mysqli_connect("localhost", "root", "","lb_pdo_netstat");
	if (!$link) {
	echo "Ошибка соединения с сервером MySQL!";
	exit;
	}

	$start_time = htmlspecialchars($_POST["Start_time"]);
	$stop_time  = htmlspecialchars($_POST["End_time"]);

	try{
		if ( $stmt = $link->prepare("SELECT id_seanse FROM seanse WHERE start > '$start_time' AND stop <'$stop_time' "))
		{
			$stmt->execute(); 
			$resultSet = $stmt->get_result();
			$res = $resultSet->fetch_all(MYSQLI_ASSOC);
		}
   
		echo "<table border='1'>";
		echo "<thead><tr><th>Seanse ID</th></thead>";
		echo "<tbody>";
	
		foreach($res as $row)
		{
			echo "<tr><td>".$row['id_seanse']."</td></tr>";
		}
	
		echo "</tbody>";
		echo "</table>";
	}
	
	catch(PDOExeption $ex){
		echo $ex->getMessage();
	}
	
	$link = null;

?>