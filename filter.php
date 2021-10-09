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
    <link rel='stylesheet' href='css/nav.css'>
    <link rel='stylesheet' href='css/main.css'>
    <link rel='stylesheet' href='css/table.css'>
    <link rel="icon" href="images/data.png">
    <title>Filter Staff Member</title>
</head>
<body>
    <div class="container">
        <div class='center'>
            <div class='row justify-content-center no-gutters'>
                <header>
                    <?php include 'includes/nav.php'?>  
                </header>
                <div>
                    <form id= 'filter-form' action='<?php echo ($_SERVER['PHP_SELF']); ?>' method='post'>
                        <!-- Creating Form -->
                        <label id="position-label" for="position">Position</label><br>
                        <select name="position" id="position" class="form-control" required> 
                            <option value="" disabled selected >Choose a position</option>
                            <option value="All">All Positions</option>
                            <option value="Professor">Professor</option>
                            <option value="Reader">Reader</option>
                            <option value="Senior Lecturer">Senior Lecturer</option>
                            <option value="Lecturer">Lecturer</option>
                        </select>  
                    </form>
                    <form class='submit-button'>
                        <input type='submit'  form='filter-form'>
                    </form>
                </div>
       
            <div class="row justify-content-center no-gutters">
        
                        
                <?php 
                    require_once 'includes/login.php';
                    $conn = new mysqli($hn, $un, $pw, $db);
                    if ($conn->connect_error) die('Fatal Error');

                    if(isset($_POST['position'])) 
                    {
        
                    
                    
                        if($_POST['position'] == 'All') {
                            $query = "SELECT * FROM staff";
                        }
                        elseif($_POST['position'] == 'Professor') {
                            $query = "SELECT * FROM staff WHERE Position='Professor'";
                            }
                        elseif($_POST['position'] == 'Reader') {
                            $query = "SELECT * FROM staff WHERE Position='Reader'";
                        }
                        elseif($_POST['position'] == 'Senior Lecturer') {
                            $query = "SELECT * FROM staff WHERE Position='Senior Lecturer'"; 
                        }
                        elseif($_POST['position'] == 'Lecturer') {
                            $query = "SELECT * FROM staff WHERE Position='Lecturer'";
                        }
                        
                    
                        else {
                            echo "Error";
                        }

                        $result = $conn->query($query); //results from query
                        
                        if (!$result) die('Fatal Erorr');
                        ?>
                        <table class='main-table tablemobile'>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Position</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $rows = $result->num_rows;
                                for ($j = 0; $j < $rows ; ++$j){

                                    $row = $result-> fetch_array(MYSQLI_ASSOC);?>
                                    <tr>
                                        <td><?php echo $row['ID'] ?></td>
                                        <td><?php echo $row['Name'] ?></td>
                                        <td><?php echo $row['Email'] ?></td>
                                        <td><?php echo $row['Position']?></td>
                                        <td><a href ="edit.php?id=<?php echo $row['ID'];?>">Edit</td>
                                        <td><a href ="delete.php?id=<?php echo $row['ID'];?>">Delete</td>
                                    </tr>
                            <?php }} ?>
                        </tbody>
                    </table> 
                    <?php 
                        $conn->close(); //close database connection
                        ?>
                  
            </div>
        </div>
    </div>                
                            
                        
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>