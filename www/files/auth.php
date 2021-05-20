<?php
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

$pass = md5($pass.'qweeqwweqweqweewq1123');

$mysql = new mysqli('database', 'root', 'tiger', 'register-bd')
OR DIE("Ошибка подключения к базе данных");

$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'") or die($mysql->error);
$user = $result->fetch_assoc();
if (count((array)$user) == 0) {
    echo "Такой пользователь не найден";
    exit();
}

setcookie('user', $user['name'], time() + 3600, "/");

$mysql->close();

session_start();
$_SESSION['mysession']  = true;
$_SESSION['id'] = $user['id'];
$_SESSION['login'] = $user['login'];

//Пишем в сессию статус пользователя (приоритет):
$_SESSION['status'] = $user['status'];

if ($_SESSION['mysession']){
  header("Location: menu.php");
}


?>
