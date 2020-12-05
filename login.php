<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="assets/style/form.css">

</head>
<body>
<?php
if(!isset($_SESSION))
{
    session_start();
}
?>
<div class="form-container">
    <form action="controllers/login.php" method="post">
        <div class="form-title">
            <h2>Login</h2>
        </div>
        <center class="err-submit">
            <?php if(isset($_SESSION['err'])):?>
                <?=$_SESSION['err'];?>
                <?php unset($_SESSION['err']); endif;?>
            <?php if(isset($_SESSION['done'])):?>
                <?=$_SESSION['done'];?>
                <?php unset($_SESSION['done']); endif;?>
        </center>
        <div class="field-container">
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <button type="submit">Login</button>

        </div>

    </form>
</div>
</body>
</html>
