<?php
include "db_conn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login Page for the store">
    <title>Onyx Systems</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <form action="login.php" method="post" id="form">
        <div class="title">
            <h2>Onyx Systems</h2>
        </div>
        <label>
            <div class="input-username-div">
                <input type="text" name="uname" placeholder="Username" id="username" autocomplete="off"><br>
            </div>
            <div class="input-password-div">
                <input type="password" name="password" placeholder="Password" id="password"><br>
            </div>
        </label>
        <div class="error-div">
            <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
            <p class="error" id="error">Please enter a valid Username and Password</p>
        </div>
        <div class="button-tag">
            <button type="submit" id="login-submit" onclick="checkempty()" >LOG IN</button>
        </div>
    </form>
    <script src="javascript/index.js"></script>
</body>
</html>