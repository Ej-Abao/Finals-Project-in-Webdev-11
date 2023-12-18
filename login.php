<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            
            header("Location: index.php");
            exit;
        }
    }
    
    $is_invalid = true;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    
    <div id="loginForm">
    <div class="formcontener">
    <img class="img" src="https://pentagram-production.imgix.net/cc7fa9e7-bf44-4438-a132-6df2b9664660/EMO_LOL_02.jpg?rect=0%2C0%2C1440%2C1512&w=640&crop=1&fm=jpg&q=70&auto=format&fit=crop&h=672"width="50%" height="50%" >
    <h1 class="titleText">Login</h1>
    
    <?php if ($is_invalid): ?>
        <em>Invalid login</em>
    <?php endif; ?>
    
    <form method="post">
    <div class="form-group">
        <label class="labowl" for="email">email</label>
        <input class="eenput" type="email" name="email" id="email"
               value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
    </div>

    <div class="form-group">
        <label class="labowl" for="password">Password</label>
        <input class="eenput" type="password" name="password" id="password">
    </div>
        
        <button class="batown" >Log in</button>
        <p>Dont have an account? <a href="signup.html">Sign Up Here!</a><p>
    </form>
    </div>
    </div>
    
</body>
<style>
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