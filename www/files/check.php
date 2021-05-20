<?php
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
$status = 1;

if (mb_strlen($login) < 4 || mb_strlen($login) > 90) {
    echo "Недопустимая длина логина";
    exit();
} elseif (mb_strlen($name) < 2 || mb_strlen($name) > 50) {
    echo "Недопустимая длина имени";
    exit();
} elseif (mb_strlen($pass) < 2 || mb_strlen($pass) > 50) {
    echo "Недопустимая длина пароля (от 2 до 50 символов)";
    exit();
}

$pass = md5($pass.'qweeqwweqweqweewq1123');

$mysql = new mysqli('localhost', 'root', 'root', 'register-bd')
OR DIE("Ошибка подключения к базе данных");

$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login'") or die($mysql->error);
$user = $result->fetch_assoc();
if (count((array)$user) != 0) {
    echo "Такой пользователь уже существует";
    exit();
}

$mysql->query("INSERT INTO `users` (`login` , `pass` , `name`, `status`)
VALUES('$login','$pass','$name','$status') ");
$mysql->close();

header('Location:/');
?>
