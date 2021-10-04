
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
    <link rel="sttylesheet" href="css/table.css" media='all'>
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
                <?php 
                    require_once 'includes/login.php';
                    $conn = new mysqli($hn, $un, $pw, $db);
                    if ($conn->connect_error) die('Fatal Error');

                    $query = "SELECT * FROM staff"; //query
                    $result = $conn->query($query); //results from query
                    
                    if (!$result) die('Fatal Erorr');
                ?>

                <style>
                    table {

                        border-collapse: collapse;
                        margin: 25px 0;
                        font-size: 0.9em;
                        font-family: sans-serif;
                        min-width: 400px;
                        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);

                        }


                        /* Styling table headers */

                        table thead tr {
                        background-color: #009879;
                        color: #ffffff;
                        text-align: center;
                        }

                        /* Styling table cells */

                        table th,
                        table td {
                        padding: 12px 15px;
                        }

                        /* Styling table rows */

                        table tbody tr {
                        border-bottom: 1px solid #dddddd;
                        }

                        table tbody tr:nth-of-type(even) {
                        background-color: #f3f3f3;
                        }

                        table tbody tr:last-of-type {
                        border-bottom: 2px solid #009879;
                        }


                        /* Style active row */

                        styled-table tbody tr.active-row {
                        font-weight: bold;
                        color: #009879;
                        }

                /* table.css wouldn't work - overridden, so used inline instead */
                </style>
                <table>
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
                                    <td><a href ='edit.php'>Edit </td>
                                    <td>Delete </td>
                                </tr>
                        <?php } ?>
                    </tbody>
                </table> 
                <?php 
                    $result->close();
                    $conn->close(); //close database connection
                    ?>
            </div>

        </div>  
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>