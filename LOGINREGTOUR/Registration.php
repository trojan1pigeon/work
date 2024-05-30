<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Form</title>
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <div class="login-box">
      <h2>Регистрация</h2>
      <form method ="post">
        <div class="user-box">
          <input type="text" name="name" required="" />
          <label>Введите имя</label>
        </div>
        <div class="user-box">
          <input type="text" name="surname" required="" />
          <label>Введите фамилию</label>
        </div>
        <div class="user-box">
          <input type="text" name="middlename"  required=""/>
          <label>Введите отчество</label>
        </div>
        <div class="user-box">
          <input type="email" name="email" required="" />
          <label>Введите почту</label>
        </div>
        <div class="user-box">
          <input type="password" name="password" required="" />
          <label>Введите пароль</label>
        </div>
        <a href="#">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Регистрация
        </a>
      </form>

      <div class="Reg">
          Есть аккаунт? - 
        <a href="ar.php" class = "Registration_on">Войти</a>
      </div>

    </div>
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $conn->real_escape_string($_POST["name"]);
  $surname = $conn->real_escape_string($_POST["surname"]);
  $middlename = $conn->real_escape_string($_POST["middlename"]);
  $email = $conn->real_escape_string($_POST["email"]);
  $password = $conn->real_escape_string($_POST["password"]);

  $check_email = "SELECT Email FROM User WHERE Email = '$email'";
  $result_email = $conn->query($check_email);

  if ($result_email->num_rows > 0) {
      echo "Данный Email уже используется";
  } else {
      $sql = "INSERT INTO User (Name, Surname, MiddleName, Email, Password) VALUES ('$name', '$surname', '$middlename', '$email', '$password')";

      
      if ($conn->query($sql)) {
          echo "Данные успешно добавлены";
      } else {
          echo "Ошибка: " . $conn->error;
      }
  }
}
// Закрываем соединение с базой данных
$conn->close();
?>