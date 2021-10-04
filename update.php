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
    <link rel='stylesheet' href='css/nav.css'>
    <link rel='stylesheet' href='css/add.css'>
    <link rel="icon" href="images/data.png">
    <title>Add Staff Member</title>
</head>
<body>
    
    <header>
        <?php include('includes/nav.php')?>  
    </header>
    <main>
        <div class='center'>
        <?php
            
        
            // connect
            include("includes/login.php");

            //get variables
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $position = $_POST['position'];

            //update into database
            $sql = "UPDATE staff SET name='$name', email='$email', position='$position' WHERE id='$id' ";   
            if(mysqli_query($conn, $sql))  
            {
                echo '<p> Successfully updated to database </p>';
            }
        
            else 
            {
                echo '<p> Error updating data, please try again! </p>'.mysqli_error($conn);

            }
        ?>

        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>