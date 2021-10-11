<?php
		
$cookie_name = "visCounter";
if(!isset($_COOKIE[$cookie_name])) {	
    require("countdb.php");
    $sql_Query = "UPDATE count SET visits=visits+1";
    if ($conn->query($sql_Query) === FALSE) 
        echo "Error updating record: " . $conn->error;
    else{
        setcookie($cookie_name, "is counted", 
        time() + (60 * 60), "/"); // expires in 1 hour
        
    }
    mysqli_close($conn);
}	
?>