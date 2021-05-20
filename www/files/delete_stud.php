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
<title>Удаление учеников</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
</head>

<link rel="stylesheet" href="./style.css">
<body class="b1">
<body>
  <style>
  #delete-btn {
      margin-top: 10px;
  }
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
  </nav> <br>
<h1>Удаление учеников</h1><br>



</form>
<div class="mx-auto" style="width: 500px;">
    <h3>Выберите ученика для удаления:</h3><br>
    <div class="mx-auto" style="width: 150px;">
		<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
		<select name="student"  class="b2" size=1><br>
    </div>
</div>
<?php
		header( 'Content-Type: text/html; charset=utf-8' );

    $mysql = new mysqli('database', 'root', 'tiger', 'data')
    OR DIE("Ошибка подключения к базе данных");
    mysqli_set_charset($mysql,'utf8');

    $itemstable="info";
    $id_medical="id_medical";
    $NameF="NameF";
    $NameI="NameI";
    $NameO="NameO";
    $birth_day_pat="birth_day_pat";
    $mobile_number="mobile_number";
    $room="room";


		mysqli_set_charset($mysql,'utf8' );

		$query = "SELECT $id_medical,$NameF FROM $itemstable";
		$result = mysqli_query($mysql,$query) or die(mysqli_error());

		while ($row = mysqli_fetch_object($result)) {
			echo '<option value="'.  $row->id_medical . '">'. $row->NameF . '</option>';
		}



		echo '<div class="action"></select><br><input class="btn btn-info" id="delete-btn" type="submit" value="Удалить" onclick="submit" name="Добавить пациента"/></form><br></div>';
		if (isset($_POST['student']))
		{
			$student = $_POST['student'];

			$query ="DELETE FROM $itemstable WHERE $id_medical=$student";
			mysqli_query($mysql,$query) or die(mysqli_error());
			echo '<i> Ученик под номером <b>',$student,'</b> был удален.</i> <br />';
			mysqli_close($mysql);
		}
		?>
	</body>
</html>
