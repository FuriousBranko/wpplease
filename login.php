<html lang="en">

<head>
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <h2>Login</h2>
    <form action = "includes/login.inc.php" method = "POST">
        <label for="username">Username </label><input type = "text" name = "username" class = "form-control"/>
        <label for="password">Password </label><input type = "password" name = "password" class = "form-control" />
        <button  type = "submit" name="submit" class = "btn btn-info btn-block mt-3"><i class="fa fa-sign-in"></i> Login</button>

        <?php
            if(isset($_GET['error'])) {
                if($_GET['error'] == 'true')
                    echo '<p class="text-danger text-center">Your password or username is incorrect</p>';
                if($_GET['error'] == 'fatal')
                                    echo '<p class="text-danger text-center">Oops something went wrong...</p>';
            } ?>
    </form>
</body>
</html>