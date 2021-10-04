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
    <link rel="stylesheet" href="css/main.css" type='text/css'>
    <link rel="stylesheet" href="css/nav.css" type='text/css'>
    <link rel="icon" href="images/data.png">
    <title>Edit Database Entry</title>
</head>
<body>
    <header>
    <?php include_once 'includes/nav.php'?>  
    </header>
    <style> 
        body {text-align:center}

        form {
            background-color:#FFDAC7;
            border-radius:0.5rem;
            padding: 1rem;
            margin-top: 0px;
            margin-bottom: 20px;
            width: 60%;
            display: inline-block;
            
                        }
        input {
            width:fit-content;
            font-style:italic;
            text-align: left;
            margin-bottom:1rem;
        }

        label {
            text-align: left;
            align-content: left; 
            float:left; 
        }

        select {

            width:5rem;
            height:2rem;
            padding:.375rem;
            line-height: 1.5;
            font-style:italic;
            text-align: left;
            margin-bottom:1rem;
            border-radius:0.25rem;
            border-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            height:38px;
            margin-top:0;
        }

        #age {
            align-content:left'
        }

        input[type=range] {

                width: 100%;
                height:0px;     
        }

        input[type=range] {
            -webkit-appearance: none;
            margin: 5px 0;
            width: 100%;
        }


        input[type=range]:focus {
            outline: none;
        }

        input[type=range]::-webkit-slider-thumb
        {
            height: 25px;
            width: 25px;
            border-radius: 3px;
            background-color:transparent;
            background-size: cover;
            cursor: pointer;
            -webkit-appearance: none;
            margin-top: -12px;
        }
        
        form p  {
            font-size:1.1rem;
            text-align: center;
            padding-bottom:1rem;
            padding-top:0rem;
            margin-top:1rem;
            margin-bottom:0rem;
        
        }

        input[type=range]::-webkit-slider-runnable-track {
            width: 100%;
            height: 0;
            cursor: pointer;
            box-shadow: 1px 1px 1px azure, 1px 1px 1px azure;
            background:transparent;
            border: 0.2px solid azure;
        }

        #rating-great {
            float:right;

        }

        .checkbox-social {
            display:block;
                }

        .submit-button {
            background-color:#FFAAA5;


        }

        select:required:invalid {
            color: gray;
        }
        option[value=""][disabled] {
            display: none;
        }
        option {
            color: black;
        }          
    </style>
    <?php
            
            // connect
            include("includes/login.php");

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

                echo

                "<div class='center'>
                <div class='row'>
                <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12'>
                <form action='update.php' method='POST' id='add-form'>
                <label id='id-label' for='name'>ID</label>
                <input type='text' name='id' id='id' class='form-control' value='$id'/>
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