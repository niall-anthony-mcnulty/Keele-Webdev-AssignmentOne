<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Database Entry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Bellota&family=Bellota+Text&display=swap" rel="stylesheet", type='text/css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css" type='text/css'>
    <link rel="stylesheet" href="css/nav.css" type='text/css'>
    <link rel='stylesheet' href='css/table.css' type='text/css'>
    <link rel="icon" href="images/data.png">
</head>
<body>
    <header>
    <?php include_once 'includes/nav.php'?>  
    </header>
    <?php
            
            // connect
            include("includes/dblogin.php");

            // get id

            $id = $_GET['id'];


            //delete
            $sql = "SELECT Name, Email, Position FROM staff WHERE ID = $id";

            $results = $conn->query($sql);
            if ($results->num_rows > 0) {
                $row = $results->fetch_assoc();
                
    
                $name = $row['Name'];
                $email = $row['Email'];
                $position = $row['Position'];


                // don't allow ID to be edited 
                echo

                "<div class='center'>
                <div class='row'>
                <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12'>
                <form action='update.php' method='POST' id='add-form'>
                <label id='name-label' for='name'>Name</label>
                <input type='text' name='name' id='name' class='form-control' value='$name'/>
                <label id='email-label' for='email'>Email</label>
                <input type='email' name='email' id='email' class='form-control' value='$email' required/>
                <label id='position-label' for='position'>Position</label><br>
                <select name='position' id='position' class='form-control' required> 
                    <option value='$position' selected>$position</option>
                    <option value='Professor'>Professor</option>
                    <option value='Reader'>Reader</option>
                    <option value='Senior Lecturer'>Senior Lecturer</option>
                    <option value='Lecturer'>Lecturer</option>
                </select>
                </form> 
                <form class='submit-button'>
                <input type='submit' value='Submit' form='add-form'>
                </form>
                </div>
                </div>
                </div>
                </body>";
            }
            else {
                echo "Record not found!";
            }
            $conn->close();
            ?>
       
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>