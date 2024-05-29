<?php
print_r($_POST['personabout']);
$user=$_COOKIE['username'];
$file=fopen("./db/$user.txt",'w+');
fwrite($file,$_POST['personabout']);
fclose($file);
header('Location: index.php');