<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html>
<head>
<script>
    setTimeout(function() {
      window.location.href = 'home.html';
    }, 3000); 
  </script>
  <link rel="stylesheet" href="general.css">
    <title>Redirecting...</title>
    <meta charset="UTF-8">
</head>
<body>
    
    <?php if (isset($user)): ?>
        <div id="bocks">
        <h2 class="titleText">Welcome <?= htmlspecialchars($user["name"]) ?>!</h2>
        <br>
        <h4 class="welcomeTXT">You may wait to be redirected or you may <p><a href="home.html">Click Here</a> if nothing happens</h2>
        <br>
        <h4 class="welcomeTXT">You may also <p><a href="logout.php">Log out</a></p></h2>
        <?php else: ?>
            
            <p><a href="login.php">Log in</a> or <a href="signup.html">sign up</a></p>
            
        <?php endif; ?>
        </div>

        
</body>
<style>
    html{
        margin:auto;
    }
    a{
    color: #ff8080;
    padding: 10px;
    text-decoration:underline;
    border-radius: 5px;
    text-shadow: 0px 4px 8px #1a131f
    }
    a:hover{
    color: #fdff9b;
    }
  </style>
</html>

    
    
