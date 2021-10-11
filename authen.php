<?php
$username = $_POST['username'];
$password = $_POST['password'];
$passlist = array('james' => 'penguin', 'mike' => 'llama', 'niall' => 'niall');

if($passlist[$username] == $password){
      // SUCCESS
      session_start();
      $_SESSION['id'] = session_id();
      $_SESSION['username'] = $username;
      $_SESSION['loggedin'] = true;
      header('location: http://localhost/week%204/Assignment/Keele-Webdev-AssignmentOne/index.php');
} else { ?>

      <!DOCTYPE html>
      <html lang='en'>
            <head>
                  <meta charset="UTF-8">
                  <meta http-equiv="X-UA-Compatible" content="IE=edge">
                  <meta name="viewport" content="width=device-width, initial-scale=1.0">
                  <title>Staff Database</title>
                  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
                  <link href="https://fonts.googleapis.com/css2?family=Sora:wght@800&display=swap" rel="stylesheet">
                  <link href="https://fonts.googleapis.com/css2?family=Bellota&family=Bellota+Text&display=swap" rel="stylesheet", type='text/css'>
                  <link rel="preconnect" href="https://fonts.googleapis.com">
                  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                  <link rel="stylesheet" href="css/main.css" type="text/css">
                  <link rel="icon" href="images/data.png">
                  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            </head>
            <body>
            
            <div class="container">
                  <div class='center'>
                        <div class='row justify-content-center no-gutters'>
                              <?php 
                              echo "<h1>Login failed</h1><br>";
                              echo "Check username and password and try again!</h1>";
                              header("Refresh:5; url=http://localhost/week%204/Assignment/Keele-Webdev-AssignmentOne/loginpage.php", true, 303); 
                              ?>
                        </div> 
                  </div>
            </div>      
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
      </body>
      </html>
      <?php
            }?>
