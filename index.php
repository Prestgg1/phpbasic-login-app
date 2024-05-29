<?php
session_start([
    'cookie-lifetime' =>86400
]);
if (!isset($_COOKIE['login']) || $_COOKIE['login'] == false) {
    header('Location: login.php');
};

$username=$_COOKIE['username'];
$file = fopen("./db/$username.txt","r");


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>HomePage</title>
    <style>
        body.bg-dark {
            background: #181818 !important;
        }

        button {
            position: absolute;
            bottom: 8px;
            right: 8px
        }

        form {
            position: relative;
        }
    </style>
</head>

<body class="<?= isset($_COOKIE['color'])?$_COOKIE['color']:'bg-dark' ?>">
    <div class="d-flex align-items-center justify-content-center p-4"><img height="" src="kodl.png" alt=""></div>
    <div class="container d-flex align-items-center justify-content-center">
        <div class="card <?= isset($_COOKIE['color'])?$_COOKIE['color']:'bg-dark' ?>" style="width: 18rem;">
            <div class="card-header bg-primary">
                My Profile
            </div>
            <div class="card-body">
                <h5 class="card-title text-warning"> <?= $_COOKIE['username'] ?> </h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= $_SESSION['users'][$username]['email'] ?></h6>
                <form action="filesave.php" method="post">
                    <textarea class="form-control bg-dark text-white" name="personabout" id="" cols="30"
                        rows="10"><?= fgets($file) ?></textarea>
                    <button class="btn btn-sm btn-primary" type="submit">Save</button>
                </form>
                <a href="./islem.php?logout" class="btn btn-success btn-sm mt-2 w-100">Logout</a><br>

            </div>
            <div class="card-footer bg-info d-flex align-items-center justify-content-between">
                <a href="change-color.php?color=bg-light" class="btn btn-sm btn-light">Light Mod</a>
                <a href="change-color.php?color=bg-dark" class="btn btn-sm btn-dark">Dark Mod</a>
            </div>
        </div>
    </div>
</body>

</html>
<?php
fclose($file);

?>