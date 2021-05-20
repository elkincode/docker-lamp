<?php
session_start();
if (!isset($_SESSION['mysession'])) {
    header("Location: index.html");
}
if ($_SESSION['status'] == 1) {
  header("Location: index.html");
}
?>
<html>
<head>
<title>Все ученики</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
</head>

<link  rel="stylesheet" href="./style.css">
<body class="b1">
<body>
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
  body {
font-family: 'Roboto', sans-serif;
}
  input {
    display: block;
  }
  </style>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="menu.php">Полёт мысли</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
          <a class="nav-link" href="all_stud.php">Список учеников <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
          <a class="nav-link" href="add_stud.php">Добавить ученика</a>
      </li>
      <li class="nav-item active">
          <a class="nav-link" href="delete_stud.php">Удалить ученика</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="about.php">О школе</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="contacts.php">Контакты школы</a>
      </li>
      <li class="nav-item active">
          <a class="nav-link" href="feedback.php">Отзывы</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="exit.php">Выйти из системы</a>
      </li>
    </div>
  </nav>
<br>
<h1>Наши ученики</h1> <br>
<?php

  $mysql = new mysqli('database', 'root', 'tiger', 'data')
  OR DIE("Ошибка подключения к базе данных");

		$itemstable="info";
		$NameF="NameF";
		$NameI="NameI";
		$NameO="NameO";
		$birth_day_pat="birth_day_pat";
    $mobile_number="mobile_number";
    $room="room";

		mysqli_set_charset($mysql,'utf8');

		$query = "SELECT * FROM $itemstable";
		$result = mysqli_query($mysql,$query) or die(mysqli_error());

		echo '<center>';
		echo '<table class="table table-bordered"><caption></caption><tr><th><b>№</b></th><th><b>Фамилия</b></th><th><b>Имя</b></th><th><b>Отчество</b></th><th><b>Дата Рождения</b></th>
    <th><b>Номер телефона</b></th><th><b>Класс</b></th></tr></tr>';
		echo '</center>';
		$query = "SELECT * FROM $itemstable";
		$result = mysqli_query($mysql,$query) or die(mysqli_error());

		 while ($row = mysqli_fetch_array($result))
		{
			echo '<tr align="center">
			<td><b>'.$row[0].'</b></td>
			<td>'.$row[1].'</td>
			<td>'.$row[2].'</td>
			<td>'.$row[3].'</td>
			<td>'.$row[4].'</td>
			<td>'.$row[5].'</td>
      <td>'.$row[6].'</td>';
		}

		?>

</form>
	</body>
</html>
