<?php

session_start();

session_destroy();

header("Location: login.php");
exit;

?>
<!DOCTYPE html>
<html>
<head>
<script>
    setTimeout(function() {
      window.location.href = 'login.php';
    }, 3000); 
  </script>
  <link rel="stylesheet" href="general.css">
    <title>Redirecting...</title>
    <meta charset="UTF-8">
</head>
<body>
    
        <div id="bocks">
        <h2 class="titleText">You are now logged out</h2>
        <br>
        <h4 class="welcomeTXT">You may wait to be redirected or you may <p><a href="login.html">Click Here</a> if nothing happens</h2>
        </div>

        
</body>
<style>
    html{
        margin:0;
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