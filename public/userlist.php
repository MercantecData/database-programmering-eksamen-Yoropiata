<?php
	include "../sql-cfg.php";
	$sql = "SELECT id, name FROM users WHERE 1";
	$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>User List</title>

</head>
<body>
	<a href="imagelist.php">image list</a>
	<h1>Users:</h1>
	<?php 
	while($row = $result->fetch_assoc()){
		echo $row["name"];
		$id = $row['id'];
		echo "<a href='delete.php?user=$id'>delete</a>";
	}
	?>
</body>
</html>