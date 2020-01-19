<!DOCTYPE html>
<?php
  require "includes/db_config.php";
  //require "verify.php";
  session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./node_modules/@yaireo/tagify/dist/tagify.css">
    <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/css/mdb.min.css" rel="stylesheet">
    <title>WallPapersPlease</title>
</head>
<body>
<div class="container">
<?php
if(!isset($_SESSION['id_user'])){ echo "
<button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#exampleModalLong\">
  Login
</button>";
}
else{ echo"
  <a class=\"btn btn-primary\" href=\"logout.php\">Logout</a>";
}
?>
<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Login">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action = "includes/login.inc.php" method = "POST">
        <label for="username">Username </label><input type = "text" name = "username" class = "form-control"/>
        <label for="password">Password </label><input type = "password" name = "password" class = "form-control" />
        <!-- <button  type = "submit" name="submit" class = "btn btn-info btn-block mt-3"><i class="fa fa-sign-in"></i> Login</button> -->

        <?php
            if(isset($_GET['error'])) {
                if($_GET['error'] == 'true')
                    echo '<p class="text-danger text-center">Your password or username is incorrect</p>';
                if($_GET['error'] == 'fatal')
                                    echo '<p class="text-danger text-center">Oops something went wrong...</p>';
            } ?>
    <!-- </form> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type = "submit" name="submit" class="btn btn-primary">Login</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php
  if(!isset($_SESSION['id_user'])){ echo "
<button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#exampleModal1\">
  Register
</button>";
  }
  ?>
<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="Register" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Register">Register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="includes/register.inc.php" id="registration-form">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username">

        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" name="email">

        <label for="password1">Password</label>
        <input type="password" class="form-control" id="password1" name="password1">

        <label for="password2">Confirm your password</label>
        <input type="password" class="form-control" id="password2" name="password2">

        <!-- <button type="submit">Register</button> -->
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Register</button>
      </div>
    </form>
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
      
    </div>
  </div>
</div>
</div>
    <form action="index.php" method="get">
    <div class="container">
        <div class="row">
            <!-- <div class="col-10">
            <input type="text" placeholder="?php// echo $_GET['search'];?>" name="search">

            </div>
            <div class="col-2">
            <input type="submit" value="send">
            </div> -->
            <div class="input-group md-form form-sm form-2 pl-0 col-12">
  <input class="form-control my-0 py-1 red-border" name="search" type="text" placeholder="<?php if(!isset($_GET['search'])) echo "Search";else echo $_GET['search'];?>" aria-label="Search">
  <div class="input-group-append">
  <button type="submit" ><span class="input-group-text red lighten-3" id="basic-text1"><i class="fas fa-search text-grey"
        aria-hidden="true"></i></span></button>
    
  </div>
</div>
        </div>
    </div>
    <!-- <div class="input-group md-form form-sm form-2 pl-0 col-12">
  <input class="form-control my-0 py-1 red-border" name="search" type="text" placeholder="<?php if(!isset($_GET['search'])) echo "Search";else echo $_GET['search'];?>" aria-label="Search">
  <div class="input-group-append">
    <span class="input-group-text red lighten-3" id="basic-text1"><i class="fas fa-search text-grey"
        aria-hidden="true"></i></span>
  </div>
</div> -->
    
    </form>
    <?php
      if(isset($_GET['search'])){
        include "images.php";
      }
    else{
            include "about.php";
    }
        ?>
        <!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/js/mdb.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>