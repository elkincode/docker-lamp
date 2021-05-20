<html>
<head>
<title>Добавление отзыва</title>
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
<h1>Оставить отзыв</h1> <br>


<div class="mx-auto" style="width: 1250px;">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="addman" method="GET">
			<font size="4">Имя:</font> <input type="text" name="name" class="b2" size="25"> <br>
			 <font size="4">Отзыв:<br></font><textarea type="text" class="b2" name="review" cols="60" rows="5"></textarea><br><br>
			<font size="4">Oценка:</font> <select type="text" name="mark" class="b2"  size="1"> <br>
      <option>5</option>
      <option>4</option>
      <option>3</option>
      <option>2</option>
      <option>1</option>
			</select>
			<br>
			<br>
		<input type="submit" class="btn btn-info" value="Добавить отзыв" onclick="submit" name="Добавить отзыв">
		</form>
</div>
<?php
    if (isset($_GET['name']))
{
      $itemstable="otz";
			#$id="id";
			$name="name";
			$review="review";
      $mark="mark";
			#$cl_id = $_GET['id'];
			$cl_name = $_GET['name'];
			$cl_review = $_GET['review'];
			$cl_mark=$_GET['mark'];

      if(!isset($_GET['name']))
      die('Ошибка получения имени');
      if(!isset($_GET['review']))
      die('Ошибка получения отзыва');
      if(!isset($_GET['mark']))
      die('Ошибка получения оценки');


			if (IS_NUMERIC($cl_mark))
			{
        $mysql = new mysqli('database', 'root', 'tiger', 'data')
        OR DIE("Ошибка подключения к базе данных");
        mysqli_set_charset( $mysql,'utf8');
				$query = "INSERT INTO $itemstable ($name,$review,$mark) VALUES ('$cl_name','$cl_review','$cl_mark')";
				mysqli_query($mysql,$query) or die(mysqli_error($mysql));
				$query = "SELECT id FROM $itemstable WHERE $name='$cl_name'";
				$result = mysqli_query($mysql,$query) or die(mysqli_error($mysql));
				while ($row = mysqli_fetch_object($result)) {
					echo "<i>Отзыв от пользователя <b>$cl_name</b> добавлен под номером ".$row->id.".</i>";
				}

				mysqli_close($mysql);
			}
			else
				echo 'Необходимо поставить оценку.';
		}
?>
</body>
</html>
