<html lang="en">

<head>
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body style="text-alling: center">
<?php
echo "
            <div class=\"features-section\">
            <div class=\"container\">
              <div class=\"row\">";
              echo"      <div class=\"col-md-12\">
            <div class=\"section-heading\">";
              ?>
    <form action = "./login.inc.php" method = "POST">
        <label for="username">Username</label><br><input type = "text" name = "username" class = "form-control"/><br>
        <label for="password">Password</label><br><input type = "password" name = "password" class = "form-control" /><br>
        <button  type = "submit" name="submit" class = "main-button"><i class="fa fa-sign-in"></i> Login</button>
<?php
    echo "</div>
    </div></div>
    </div>";
?>
        <?php
            if(isset($_GET['error'])) {
                if($_GET['error'] == '2')
                    echo '<p class="text-danger text-center">Your password or username is incorrect</p>';
                    if($_GET['error'] == '1')
                    echo '<p class="text-danger text-center">Not verified</p>';
                    if($_GET['error'] == '3')
                    echo '<p class="text-danger text-center">Not verified</p>';
            } ?>
    </form>

</body>
</html>