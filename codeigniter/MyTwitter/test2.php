<html>
<head><title>output.php</title></head>
<body>
<?php
 $name = $_POST['name'];
 print("receive data</br>");
 print("name:$name</br>");
 
 
 
 $targetID = 'keita';
		$newPW = 9999999;
		printf("UPDATE UserIDPW SET PW = %s WHERE ID = %s",$newPW, $targetID);
?>
</body>
</html>