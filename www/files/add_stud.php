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
<title>Добавление учеников</title>
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
      </li><br>
    </div>
  </nav> <br>
<h1>Добавление учеников</h1> <br>


<div class="mx-auto" style="width: 500px;">
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="addpatient" method="GET">
			<font size="4">Фамилия</font> <input type="text" name="NameF" class="b2" size="50"> <br>
			<font size="4">Имя:</font> <input type="text" name="NameI" class="b2" class="b2" size="50"> <br>
			<font size="4">Отчество</font> <input type="text" name="NameO" class="b2" size="50"> <br>
			<font size="4">Дата рождения</font> <input type="date" name="birth_day_pat" class="b2" size="50"> <br>
      <font size="4">Телефон (только российские номера)</font> <input type="varchar" name="mobile_number" class="b2" size="50"> <br>
      <font size="4">Класс</font> <input type="int" name="room" class="b2" size="50"> <br>
			<br>
			<br>
      <div class="mx-auto" style="width: 250px;">
			 <input type="submit" class="btn btn-info" value="Добавить ученика" onclick="submit" name="Добавить ученика">
     </div>
		</form>
</div>
<?php
		header( 'Content-Type: text/html; charset=utf-8' );
		if (isset($_GET['NameF']))
		{
			$itemstable="info";
			#$id_medical="id_medical";
      $card="card";
      $NameF="NameF";
  		$NameI="NameI";
  		$NameO="NameO";
      $birth_day_pat="birth_day_pat";
  		$insurance_company="insurance_company";
      $passport_series="passport_series";
      $passport_number="passport_number";
      $mobile_number="mobile_number";
      $room="room";
			#$cl_id_medical = $_GET['id_medical'];
      $cl_card = filter_var(trim($_GET['card']), FILTER_SANITIZE_NUMBER_INT);
			$cl_NameF = $_GET['NameF'];
			$cl_NameI = $_GET['NameI'];
			$cl_NameO = $_GET['NameO'];
			$cl_birth_day_pat = $_GET['birth_day_pat'];
			$cl_insurance_company = $_GET['insurance_company'];
      $cl_passport_series = filter_var(trim($_GET['passport_series']), FILTER_SANITIZE_NUMBER_INT);
      $cl_passport_number = filter_var(trim($_GET['passport_number']), FILTER_SANITIZE_NUMBER_INT);
      $cl_mobile_number = filter_var(trim($_GET['mobile_number']), FILTER_SANITIZE_NUMBER_INT);
      $cl_room = filter_var(trim($_GET['room']), FILTER_SANITIZE_NUMBER_INT);

      function phone_format($phone)
      {
      	$phone = trim($phone);

      	$res = preg_replace(
      		array(
      			'/[\+]?([7|8])[-|\s]?\([-|\s]?(\d{3})[-|\s]?\)[-|\s]?(\d{3})[-|\s]?(\d{2})[-|\s]?(\d{2})/',
      			'/[\+]?([7|8])[-|\s]?(\d{3})[-|\s]?(\d{3})[-|\s]?(\d{2})[-|\s]?(\d{2})/',
      			'/[\+]?([7|8])[-|\s]?\([-|\s]?(\d{4})[-|\s]?\)[-|\s]?(\d{2})[-|\s]?(\d{2})[-|\s]?(\d{2})/',
      			'/[\+]?([7|8])[-|\s]?(\d{4})[-|\s]?(\d{2})[-|\s]?(\d{2})[-|\s]?(\d{2})/',
      			'/[\+]?([7|8])[-|\s]?\([-|\s]?(\d{4})[-|\s]?\)[-|\s]?(\d{3})[-|\s]?(\d{3})/',
      			'/[\+]?([7|8])[-|\s]?(\d{4})[-|\s]?(\d{3})[-|\s]?(\d{3})/',
      		),
      		array(
      			'+7 ($2) $3-$4-$5',
      			'+7 ($2) $3-$4-$5',
      			'+7 ($2) $3-$4-$5',
      			'+7 ($2) $3-$4-$5',
      			'+7 ($2) $3-$4',
      			'+7 ($2) $3-$4',
      		),
      		$phone
      	);
      	return $res;
      }


if(!isset($_GET['NameF']))
die('Ошибка получения фамилии');
if(!isset($_GET['NameI']))
die('Ошибка получения имени');
if(!isset($_GET['NameO']))
die('Ошибка получения отчества');
if(!isset($_GET['birth_day_pat']))
die('Ошибка получения дня рождения');
if(!isset($_GET['passport_series']))
die('Ошибка получения серии паспорта');
if(!isset($_GET['passport_series']))
die('Ошибка получения номера паспорта');
if(!isset($_GET['mobile_number']))
die('Ошибка получения номера телефона');
if(!isset($_GET['room']))
die('Ошибка получения номера палаты');

			if ((IS_NUMERIC($cl_mobile_number)) and (IS_NUMERIC($cl_card)) and (IS_NUMERIC($cl_passport_series)) and (IS_NUMERIC($cl_passport_number)) and (IS_NUMERIC($cl_room)))
			{
          $mysql = new mysqli('database', 'root', 'tiger', 'data')
          OR DIE("Ошибка подключения к базе данных");
				mysqli_set_charset( $mysql,'utf8');
        $cl_mobile_number= phone_format($cl_mobile_number);
				$query = "INSERT INTO $itemstable ($card,$NameF,$NameI,$NameO,$birth_day_pat,
          $insurance_company,$passport_series,$passport_number, $mobile_number, $room) VALUES ('$cl_card',
            '$cl_NameF','$cl_NameI','$cl_NameO','$cl_birth_day_pat','$cl_insurance_company',
            '$cl_passport_series','$cl_passport_number','$cl_mobile_number','$cl_room')";
				mysqli_query($mysql, $query) or die(mysqli_error());
				$query = "SELECT id_medical FROM $itemstable WHERE $NameF='$cl_NameF'";
				$result = mysqli_query($mysql,$query) or die(mysqli_error());
				while ($row = mysqli_fetch_object($result)) {
					echo "<i>Пациент с Фамилией <b>$cl_NameF</b> был добавлен в БД под номером ".$row->id_medical .".</i>";
				}

				mysqli_close($mysql);
			}
      else if (!IS_NUMERIC(($cl_mobile_number))) {
      echo 'Введите корректный номер телефона (например, 88001234567)<br>'; }
      if (!IS_NUMERIC(($cl_card))) {
        echo 'Введите корректный номер больничной карты<br>';}
        if (!IS_NUMERIC(($cl_passport_series))) {
          echo 'Введите корректную серию паспорта<br>'; }
          if (!IS_NUMERIC(($cl_passport_number))) {
            echo 'Введите корректный номер паспорта<br>';}
            if (!IS_NUMERIC(($cl_room))) {
              echo 'Введите корректный номер палаты<br>';}
}

		?>
		<p>
		<br>
</p>
	</body>
</html>
