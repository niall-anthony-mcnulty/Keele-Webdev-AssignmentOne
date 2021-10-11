<?php require_once('includes/visitor-counter.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Database</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css" type="text/css">
    <link rel="stylesheet" href="css/nav.css" type="text/css"> 
    <link rel="stylesheet" href="css/table.css" type="text/css">
    <link rel="icon" href="images/data.png">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bellota&family=Bellota+Text&display=swap" rel="stylesheet", type='text/css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
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
                <?php 
                    require 'includes/dblogin.php';
                    $conn = new mysqli($hn, $un, $pw, $db);
                    if ($conn->connect_error) die('Fatal Error');

                        if (isset($_GET['pageno'])) {
                            $pageno = $_GET['pageno'];
                        } else {
                            $pageno = 1;
                        }

                    $no_of_records_per_page = 10;
                    $offset = ($pageno-1) * $no_of_records_per_page; 


                    $total_pages_sql = "SELECT COUNT(*) FROM staff";
                    $result = mysqli_query($conn,$total_pages_sql);
                    $total_rows = mysqli_fetch_array($result)[0];
                    $total_pages = ceil($total_rows / $no_of_records_per_page); ?>
`
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
                            $sql = "SELECT * FROM staff LIMIT $offset, $no_of_records_per_page";
                            $res_data = mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_array($res_data)){ ?>

                                    
                                <tr>
                                    <td><?php echo $row['ID'] ?></td>
                                    <td><?php echo $row['Name'] ?></td>
                                    <td><?php echo $row['Email'] ?></td>
                                    <td><?php echo $row['Position']?></td>
                                    <td><a href ="edit.php?id=<?php echo $row['ID'];?>">Edit</td>
                                    <td><a href ="delete.php?id=<?php echo $row['ID'];?>">Delete</td>
                                </tr>
                            <?php } ?>
                    </tbody>
                </table> 
            </div>
            <div class='row justify-content-center no-gutters'>   
                <ul class="pagination">
                    <li><a href="?pageno=1" class='first'>First</a></li>
                    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class='second'>Prev</a>
                    </li>
                    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                        <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>" class='third'>Next</a>
                    </li>
                    <li><a href="?pageno=<?php echo $total_pages; ?>" class='forth'>Last</a></li>
                </ul>
                <?php 
                    $result->close();
                    $conn->close(); //close database connection
                    ?>
            </div>

        </div>  
    </div>
    <?php 
          require('includes/counter.php');
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>