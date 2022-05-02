<?php
session_start();
session_destroy();
require_once('../db_connect.php');
$loginError = false;
$loggedInUserName = false;

if(isset($_POST['submit'])) {
    $loginError = true;
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $sql = "SELECT id, password, salt FROM users WHERE username = '$username'";
    $result = mysqli_query($connection, $sql);
    $matchedUser = mysqli_fetch_assoc($result);

    $hashedPassword = hash('sha256', ($_POST['password'] . $matchedUser['salt']));
    if ($hashedPassword == $matchedUser['password']) {
        session_start();
        $_SESSION['user_id'] = $matchedUser['id'];

        header('Location: /Capstone/Landing.php');
        die;
    } else {
        $loginError = true;
    }
}

echo '<script type="text/JavaScript"> 
function openNav() {
  document.getElementById("mySidenav").style.width = "20.4vw";
  document.getElementById("main").style.marginLeft = "19.65vw";
  document.getElementById("main").style.width ="50.35vw";
  document.getElementById("misc").style.marginLeft = "19.65vw";
  document.getElementById("misc").style.width ="50.35vw";
  document.getElementById("sideNavBtn").style.width = "0%";
  document.getElementById("footer").style.width = "79.6vw";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft = "10vw";
  document.getElementById("main").style.width ="80vw";
  document.getElementById("misc").style.width ="60vw";
  document.getElementById("sideNavBtn").style.width= "10vw";
  document.getElementById("footer").style.width = "100vw";
}
     </script>';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <link rel="stylesheet" href="/Capstone/Style.css" type="text/css">
</head>

<body>
<?php include ('../basics.php') ?>
  <div id="main" class="main">
  <h1>Welcome. Please Log In.</h1>
        <?php if ($loginError): ?>
        <h2 style="color:red;">Invalid username or password.</h2>
        <?php endif; ?>

        <form method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="">
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="" autocomplete="off">
            <br>
            <input type="submit" name="submit" value="Submit">
        </form>

  </div>

  <div id="misc" class="misc"><a>Test</a></div>
</body>