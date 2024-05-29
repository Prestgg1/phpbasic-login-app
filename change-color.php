
<?php
setcookie('color', $_GET['color'],time()+86400);
header('Location: ' . $_SERVER['HTTP_REFERER']);