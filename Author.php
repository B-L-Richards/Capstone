<?php

session_start();

require_once('db_connect.php');

$loggedInUserName = false;

if (isset($_SESSION['user_id'])) {
    $userId = mysqli_real_escape_string($connection, $_SESSION['user_id']);
    $sql = "SELECT * FROM users WHERE id = $userId";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        $matchedUser = mysqli_fetch_assoc($result);
        $loggedInUserName = $matchedUser['username'];
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
<?php include ('basics.php') ?>
    <div id="main" class="main"><a>Test</a></div>

    <div id="misc" class="misc"><a>Test</a></div>

    <div id="footer" class="footer">
        <p>Credited Images Owned by Credited Sites and People. B.L.Richards Only Owns Their Own Creative Useage. </p>
    </div>
</body>