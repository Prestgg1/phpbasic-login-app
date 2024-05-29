<?php 
session_start([
    'cookie-lifetime' =>86400
]);
if(isset($_SESSION['regiter'])&& $_SESSION['register']==true){
    header('Location: login.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Register</title>
    <style>
        body.bg-dark{
            background-color: white;
            /* background: #181818!important; */
        }
    </style>
</head>
<body class="<?= isset($_COOKIE['color'])?$_COOKIE['color']:'bg-dark' ?>">
<div class="d-flex align-items-center justify-content-center p-4"><img height="" src="kodl.png" alt=""></div>
<div  class="container d-flex align-items-center justify-content-center">
    <div class="card <?= isset($_COOKIE['color'])?$_COOKIE['color']:'bg-dark' ?>" style="width: 18rem;">
        <div class="card-header bg-primary">
            Register
        </div>
        <div class="card-body">
            <?php if(isset($_SESSION['message'])): ?>
            <div class="alert alert-danger"><?= $_SESSION['message'] ?></div>
            <?php endif;?>
            <form action="islem.php" method="post">
                <label for="username" class="text-success">Your Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="username">
                <label for="email" class="text-success">Your Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="admin@mail.com">
                <label for="password" class="text-success">Your Password</label>
                <input type="password" id="password" placeholder="123456" name="password" class="form-control mb-4">
                <button class="btn btn-success mb-4 w-100">Register</button>
            </form>
        </div>
        <div class="card-footer bg-info d-flex align-items-center justify-content-between">
            <a href="change-color.php?color=bg-light" class="btn btn-sm btn-light">Light Mod</a>
            <a href="change-color.php?color=bg-dark" class="btn btn-sm btn-dark">Dark Mod</a>
        </div>
    </div>
</div>
</body>
</html>