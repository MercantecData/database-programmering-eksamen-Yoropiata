<?php
	include "../sql-cfg.php";
	$sql = "SELECT id, imageURL FROM images";
	$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Image List</title>

</head>
<body>
	<a href="userlist.php">user list</a>
	<h1>Images:</h1>
	<?php 
	while($row = $result->fetch_assoc()){
        $id = $row['id'];
		echo "<a href='delete.php?image=$id'>delete</a><br>";
        $url = $row["imageURL"];
        echo "<img src='$url'><br>";
		
	}
	?>
</body>
</html>