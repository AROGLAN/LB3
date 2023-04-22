<?php
  
  #@$on_link = mysqli_connect(localhost, root, '');
  $link = mysqli_connect("localhost", "root", "","lb_pdo_netstat");
  if (!$link) {
  echo "Ошибка соединения с сервером MySQL!";
  exit;
  }

  #$clientID = '123'     ;
  #$clientID = $_GET['123'];
  try{
    #if ( $stmt = $link->prepare("SELECT * FROM seanse WHERE fid_client='123'"))
    if ( $stmt = $link->prepare("SELECT * FROM client WHERE balance < '0'"))
    # if ( $stmt = $link->prepare("SELECT id_seanse FROM seanse WHERE start > '10:00:00' AND stop <'18:00:00'"))
    {
     # $stmt->bind_param("s",$clientID);
      $stmt->execute(); 
      #$stmt->execute();
      $resultSet = $stmt->get_result();
      $res = $resultSet->fetch_all(MYSQLI_ASSOC);
      #$res = $stmt->fetchAll();
	}
     #$stmt->execute(array($clientID));     
     

      echo "<table border='1'>";
      echo "<thead><tr><th>Client ID</th></thead>";
      echo "<tbody>";

      foreach($res as $row)
      {
       echo "<tr><td>".$row['id_client']."</td></tr>";
	  }

      echo "</tbody>";
      echo "</table>";
  }
  catch(PDOExeption $ex){
      echo $ex->getMessage();
  }
  $link = null;
?>