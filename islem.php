<?php
session_start([
    'cookie-lifetime' =>86400
]);

if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [
        'admin' => [
            "email" => "admin@mail.com",
            "password" => "123"
        ]
    ];
    $users = $_SESSION['users'];
} else {
    $users = $_SESSION['users'];
}
;
if (isset($_POST['username']) && isset($_POST['password']) && !isset($_POST['email'])) {
    if (array_key_exists($_POST['username'], $users)) {
        print ('runned');
        if ($_SESSION['users'][trim($_POST['username'])]['password'] === trim($_POST['password'])) {
            print('runned');
            $_SESSION['message'] = "Giriş Başarılı";
            setcookie('username', trim($_POST['username']), time() + 86400);
            setcookie('login', true, time() + 86400);
            header("Location: index.php");
        } else {
            $_SESSION['message'] = "Hatalı Giriş";
            $_SESSION['login'] = false;
            header("Location: login.php");
        };
    } else {
        $_SESSION['message'] = "Kullanıcı Bulunamadı";
        $_SESSION['login'] = false;
        header("Location: login.php");
    }

} elseif (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
    if (!isset($_SESSION['users'][$_POST['username']])) {
        $_SESSION['users'][$_POST['username']]=[
            "email" => trim($_POST['email']),
            "password" => trim($_POST['password'])
        ];
        $user=$_POST['username'];
        touch("./db/$user".'.txt',time());
        header('Location: login.php');
    } else {
        $_SESSION['message'] = 'You are already logged in';
    }
}
;
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: login.php');
}
