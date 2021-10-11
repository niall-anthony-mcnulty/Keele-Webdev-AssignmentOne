

<!DOCTYPE html>
<html>
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
<link rel="stylesheet" href="css/nav.css" type="text/css"> 
<link rel="icon" href="images/data.png">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>  
    <div class="container">
        <div class='center'>
            <div class='row justify-content-center no-gutters'> 
                <header> 
                    <?php include('includes/lognav.php') ?>
                </header>   
            </div>
            <div class='row justify-content-center no-gutters'>
                <form action="authen.php" method="POST" class='login-form' id='login-form'>
                    <div class='username'>
                        <label id="username-label" for="user-name">Username:</label>
                        <input type="text" name="username" class='log-control' required />
                    </div>  
                    <div class='password'>
                        <label id="user-password" for="user-password">Password:</label>
                        <input type="password" name="password" class='log-control' required />
                    </div>
                </form>
                </form> 
                <form class='submit-button'>
                    <input id='submit-login' type="submit" value="Login" form='login-form' />
                </form>
            </div>
        </div>  
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>

