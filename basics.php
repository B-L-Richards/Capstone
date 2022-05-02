<div class="header">
  <div class="Silhos"><img src="https://cdn.discordapp.com/attachments/943948378172166224/963206203473805332/laurel-leaf-crown-silhouette.png" width="100%" height="100%"></div>
  <div class="Silhos-2"><img src="https://cdn.discordapp.com/attachments/943948378172166224/963206203473805332/laurel-leaf-crown-silhouette.png" width="100%" height="100%"></div>
  <div class="Navbar">
    <div class="World"><a href="/Capstone/World/WorldMain.php">World</a></div>
    <div class="Pack"><a href="/Capstone/Pack/PackMain.php">Pack</a></div>
    <div class="Herd"><a href="/Capstone/Herd/HerdMain.php">Herd</a></div>
    <div class="Home"><a href="/Capstone/Landing.php">Home</a></div>
    <div class="Colony"><a href="/Capstone/Colony/ColonyMain.php">Colony</a></div>
    <div class="Pride"><a href="/Capstone/Pride/PrideMain.php">Pride</a></div>
    <div class="Contact"><a href="/Capstone/Author.php">Author</a></div>
  </div>
  <div class="Banner">
    <h1>Changing Winds</h1>
  </div>
</div>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <?php if ($loggedInUserName) : ?>
    <h2>Welcome, <?= $loggedInUserName ?>!</h2>
    
    <p>
      <a href="/Capstone/Account/login.php">Log Out</a>
    </p>
  <?php else : ?>
    <a href="/Capstone/Account/login.php">Login</a>
    <a href="/Capstone/Account/register.php"> Register</a>
  <?php endif; ?>
</div>
<button id="sideNavBtn" class="openbtn" onclick="openNav()">Open Sidebar</button>
<div id="footer" class="footer">
  <p>Credited Images Owned by Credited Sites and People. B.L.Richards Only Owns Their Own Creative Useage. </p>
</div>