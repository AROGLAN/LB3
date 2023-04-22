<?php

	$link = mysqli_connect("localhost", "root", "","lb_pdo_netstat");
	if (!$link) {
	echo "Ошибка соединения с сервером MySQL!";
	exit;
	}

	$clientID =($_POST['id_client']);
	
	try{
		if ( $stmt = $link->prepare("SELECT * FROM seanse WHERE fid_client='$clientID'"))
		{
			$stmt->execute(); 
			$resultSet = $stmt->get_result();
			$res = $resultSet->fetch_all(MYSQLI_ASSOC);
		}

		echo "<table border='1'>";
		echo "<thead><tr><th>Seanse ID</th><th>Start time</th><th>End time</th><th>Incoming traffic</th><th>Outgoinging traffic</th></thead>";
		echo "<tbody>";

		foreach($res as $row)
		{
			echo "<tr><td>".$row['id_seanse']."</td><td>".$row['start']."</td><td>".$row['stop']."</td><td>".$row['in_traffic']."</td><td>".$row['out_traffic']."</td></tr>";
		}

		echo "</tbody>";
		echo "</table>";
	}
	catch(PDOExeption $ex){
		echo $ex->getMessage();
	}
	
	$link = null;

?>