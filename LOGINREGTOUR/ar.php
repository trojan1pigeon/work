<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="login-box">
<h2>Авторизация пользователя</h2>
<form method="post">

<div class="user-box">
    <p>Почта:
    <input type="email" name="email" required=""/></p>
</div>

<div class="user-box">
	<p>Пароль:
    <input type="password" name="password" required=""/></p>
</div>


<a href="#">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <input class = "entering" type="submit" value="Войти" onclick="handleinputclick()">

        </a>
</form>
<div class="Reg">
    Нет аккаунта? - 
    <a href="Registration.php" class = "Registration_on">Зарегистрироваться</a>
</div>
</div>
<script>
function handleinputclick() {
    console.log ('Hello');
    window.location.href = 'profile.php';
}

</script>
</body>
</html>


<?php
$conn = new mysqli(
	'127.0.0.1',
	'root',
	'',
	'CyberSport');
	if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
    $email = $conn->real_escape_string($_POST["email"]);
    $password = $conn->real_escape_string($_POST["password"]);
    $sql = "SELECT * FROM User WHERE Email = '$email'";
    $check = "SELECT * FROM User WHERE Email = '$email' AND Password = '$password'";
    $result_sql = $conn->query($sql);
    $result_check = $conn->query($check);
    if($result_sql -> num_rows > 0){
        
        if($result_check -> num_rows > 0){
            $name = $result_check->fetch_assoc();
            echo "Вы успешно авторизировались";

        }
        else {
            echo "Неправильный пароль";
        }
    }
    else {
            echo "Несуществующий пользователь";
    }


?>