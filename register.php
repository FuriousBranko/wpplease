<?php
include 'includes/db_config.php';
?>
<!-- <html lang="en">
<head>
    <title>Register</title>
</head>
<body >
    <form method="post" action="includes/register.inc.php" id="registration-form">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username">

        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" name="email">

        <label for="password1">Password</label>
        <input type="password" class="form-control" id="password1" name="password1">

        <label for="password2">Confirm your password</label>
        <input type="password" class="form-control" id="password2" name="password2">

        <button type="submit">Register</button>
    </form> -->
        <?php
        $nav = 0;
        if(isset($_GET['nav']))
            $nav = $_GET['nav'];
        switch ($nav){
            case 0:
            default: echo "";
                break;
            case 1: echo "<span> Username already exists !</span>";
                break;
            case 2: echo "<span> The passwords don't match !</span>";
                break;
            case 3: echo "<span> Check username and password !</span>";
                break;
        }
        ?>

<!-- </body>
</html> -->
