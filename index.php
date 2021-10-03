
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Bellota&family=Bellota+Text&display=swap" rel="stylesheet", type='text/css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="icon" href="images/data.png">
    <title>Staff Database</title>
</head>
<body>
    <div class="container">
        <div class='center'>
            <div class='row justify-content-center no-gutters'>
                <header>
                    <?php include_once 'includes/nav.php'?>
                </header>   
            </div>
            <div class='row justify-content-center no-gutters'>
                <header>
                    <?php 
                        require_once 'includes/login.php';
                        $conn = new mysqli($hn, $un, $pw, $db);
                        if ($conn->connect_error) die('Fatal Error');

                        $query = "SELECT * FROM staff"; //query
                        $result = $conn->query($query); //results from query
                        
                        if (!$result) die('Fatal Erorr');

                        echo "<table>"; //start a table tag 
                        $row = $result-> fetch_array(MYSQLI_ASSOC); // fetch rows
                            echo "<tr><td>".$row['ID'] . "</td><td>". $row['Name']. "</td><td>" . $row['Email']. "</td><td>". $row['Position']. "</td><td> Edit </td><td> Delete </td></tr> " ; 
                        echo "</table>"; //close table
                        
                        $result->close();
                        $conn->close(); //close database connection
                    ?>
                </header>   
            </div>

        </div>  
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>

