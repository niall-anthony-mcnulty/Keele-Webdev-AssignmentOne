<?php
	require("dblogin.php");
	
	$query = mysqli_query($conn,"SELECT visits from count");
	echo "<footer><h6>Visitor Count: " . $query->fetch_array(MYSQLI_ASSOC)['visits']. "</h6></footer";
	
	mysqli_close($conn);	

?>