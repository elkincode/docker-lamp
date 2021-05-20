<html>
<head>
<title>Записаться в школу</title>
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
  <a class="navbar-brand" href="menu.php">Пациенты</a>
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
    </div>
  </nav> <br>
<h1>Записаться в школу</h1> <br>


<div class="mx-auto" style="width: 500px;">
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="addreq" method="GET">
			<font size="4">Ваше имя:</font> <input type="text" name="name" class="b2" class="b2" size="50"> <br>
      <font size="4">Ваш телефон (только российские номера)</font> <input type="varchar" name="mobile_number" class="b2" size="50"> <br>
      <font size="4">Ваша электронная почта</font> <input type="text" name="mail" class="b2" size="50"> <br>
			<br>
			<br>
      <div class="mx-auto" style="width: 250px;">
			 <input type="submit" class="btn btn-info" value="Отправить заявку" onclick="submit" name="Отправить заявку">
     </div>
		</form>
</div>
<?php
		if (isset($_GET['name']))
		{
			$itemstable="req";
      $name="name";
      $mobile_number="mobile_number";
      $mail="mail";


			$cl_name = $_GET['name'];
      $cl_mobile_number = filter_var(trim($_GET['mobile_number']), FILTER_SANITIZE_NUMBER_INT);
      $cl_mail = $_GET['mail'];

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


if(!isset($_GET['name']))
die('Ошибка получения имени');
if(!isset($_GET['mobile_number']))
die('Ошибка получения номера телефона');
if(!isset($_GET['mail']))
die('Ошибка получения адреса электронной почты');

			if ((IS_NUMERIC($cl_mobile_number)))
			{
          $mysql = new mysqli('database', 'root', 'tiger', 'data')
          OR DIE("Ошибка подключения к базе данных");
				mysqli_set_charset( $mysql,'utf8');
        $cl_mobile_number= phone_format($cl_mobile_number);
				$query = "INSERT INTO $itemstable ($name,$mobile_number,$mail) VALUES ('$cl_name',
            '$cl_mobile_number','$cl_mail')";
				mysqli_query($mysql, $query) or die(mysqli_error());
				$query = "SELECT id FROM $itemstable WHERE $name='$cl_name'";
				$result = mysqli_query($mysql,$query) or die(mysqli_error());
				while ($row = mysqli_fetch_object($result)) {
					echo "<i>Запрос от <b>$cl_name</b> был получен с номером ".$row->id .".</i>";
				}

				mysqli_close($mysql);
			}
      else if (!IS_NUMERIC(($cl_mobile_number))) {
      echo 'Введите корректный номер телефона (например, 88001234567)<br>'; }

}

		?>
		<p>
		<br>
</p>
	</body>
</html>
