<?php
	$conn = mysqli_connect("localhost", "root", "", "DatabaseExam");
	$sql = "SELECT id, name FROM users WHERE 1";
	$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>User List</title>

</head>
<body>
	<h1>Users:</h1>
	<?php 
	while($row = $result->fetch_assoc()){
		echo $row["name"];
		echo "<a href='?'>delete</a>";
	}
	?>
</body>
</html>