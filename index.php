<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>LB3</title>
</head>
    
<body>
<?php
	$link = mysqli_connect("localhost", "root", "","lb_pdo_netstat");
	if (!$link) {
	echo "Ошибка соединения с сервером MySQL!";
	exit;
	}

	$sql = "SELECT name, id_client FROM `client`";
	$result_select = mysqli_query($link, $sql);
	$res = mysqli_fetch_all($result_select, MYSQLI_ASSOC);
?>

<form action="req1.php" method="post" >
        <select name="id_client" size="1">
            <?php foreach($res as[ 'name' => $name, 'id_client' => $id_client]): ?>
                $select .= <option value ="<?=$id_client?>"><?=$name?></option>
            <?php endforeach ?>
	    </select>
	<p><input  type="submit" name="button1" value="Get info" /></p>

</form>

<form action="req2.php" method="post">
	<p>Start time: <input type="text" name="Start time" /></p>
	<p>End time: <input type="text" name="End time" /></p>
	<p><input  type="submit" name="button2" value="Get info" /></p>
</form>

    List of debtors
<form action="req3.php" method="post">
    <input  type="submit" name="button3" value="Get info" />
</form>

</body>
</html>

