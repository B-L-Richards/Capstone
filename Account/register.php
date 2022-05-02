<?php
if (isset($_SESSION)) {
  session_destroy();
}
require_once('../db_connect.php');

$loginError = false;
$loggedInUserName = false;

$errors = [];
if (isset($_POST['submit'])) {
  if (empty($_POST['username'])) {
    $errors[] = 'Please enter a Username.';
  }
  if (empty($_POST['password'])) {
    $errors[] = 'Please enter a password.';
  }
  if ($_POST['password'] != $_POST['confirm-password']) {
    $errors[] = 'Passwords do not match.';
  }

  if (empty($errors)) {
    $username = mysqli_real_escape_string($connection, $_POST['username']);

    $salt = substr(bin2hex(random_bytes(10)), 0, 10);

    $hashedPassword = hash('sha256', ($_POST['password'] . $salt));

    $sql = "INSERT INTO users (username, password, salt) VALUES"
      . "('$username', '$hashedPassword', '$salt')";

    $result = mysqli_query($connection, $sql);

    header('Location: /Capstone/Account/login.php');
    die;
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
  <h1>Welcome. Please Register: </h1>

<?php if (count($errors)): ?>
    <ul>
        <?php foreach ($errors as $error): ?>
            <li><?= $error; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post">
    <label for="username"> Username:</label>
    <input type="text" id="username" name="username" value="">
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" value="" autocomplete="off">
    <br>
    <label for="confirm-password">Confirm Password:</label>
    <input type="password" id="confirm-password" name="confirm-password" value="" autocomplete="off">
    <br>
    <input type="submit" name="submit" value="Submit">
</form>
  </div>

  <div id="misc" class="misc"><a>Test</a></div>
</body>