<html>
<head>
<title>Отзывы о школе</title>
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
  <a class="navbar-brand" href="menu.php">Вернуться на главную</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="feedback.php">Все отзывы <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="add_review.php">Оставить отзыв <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="about.php">О школе</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="contacts.php">Контакты школы</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="exit.php">Выйти из системы</a>
      </li><br>
    </div>
  </nav> <br>
<h1>Отзывы</h1> <br>

<?php


  $mysql = new mysqli('database', 'root', 'tiger', 'data')
  OR DIE("Ошибка подключения к базе данных");
		$itemstable="otz";
		$id="id";
		$name="name";
    $review="review";
		$mark="mark";

		mysqli_set_charset($mysql,'utf8');

		$query = "SELECT * FROM $itemstable";
		$result = mysqli_query($mysql,$query) or die(mysqli_error());

		echo '<center>';
		echo '<table class="table table-bordered"><caption></caption><tr><th><b>№</b></th><th><b>Имя</b></th><th><b>Отзыв</b></th><th><b>Оценка (5/5)</b></th></tr>';
		echo '</center>';
		$query = "SELECT * FROM $itemstable";
		$result = mysqli_query($mysql,$query) or die(mysqli_error());

		 while ($row = mysqli_fetch_array($result))
		{
			echo '<tr align="center">
			<td><b>'.$row[0].'</b></td>
			<td>'.$row[1].'</td>
			<td>'.$row[2].'</td>
			<td>'.$row[3].'</td>';
		}
		?>
</body>
</html>
