<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="style.css">

  <title>Login php</title>
</head>

<body>
  <header>

    <nav>
      <div class="nav-wrapper">

        <a href="index.php" class="brand-logo brand-text">
          brand logo
        </a>
        <ul id="nav-mobile" class="right hide-on-small-and-down">

          <?php
          if (isset($_SESSION['userid'])) {

            echo   '  <li><a href="signout.php">Signout</a></li>';
          } else {
            echo  '<li><a href="signup.php">Signup</a></li>';
            echo    '<li><a href="login.php">Login</a></li';
          }
          ?>


        </ul>
      </div>

    </nav>


  </header>