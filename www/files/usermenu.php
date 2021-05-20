<?php
session_start();
if (!isset($_SESSION['mysession'])) {
    header("Location: index.html"); // Редирект, если сессия не существует
}

?>
<html>
<head>
<title>Полёт мысли</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link  rel="stylesheet" href="./style.css">
</head>
<body>
  <style>
  body {
      font-family: 'Roboto', sans-serif;
      margin: 0; /* Убираем отступы */
      height: 100%; /* Высота страницы */
      background: url(pic/logo.png); /* Цвет фона и путь к файлу */
      background-position: top 50px;
      background-size: cover; /* Фон занимает всю доступную площадь */
  }
  </style>



    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Полёт мысли</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="about.php">О школе</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="contacts.php">Контакты школы</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="request.php">Записаться в школу</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="feedback.php">Отзывы</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="index.html">Панель администратора <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="exit.php">Выйти из системы</a>
                </li>
            </ul>
        </div>
    </nav>
    <p class="title-main">Школа «‎Полёт мысли»‎</p>

</body>
</html>
