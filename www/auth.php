<?php
  $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

  $mysql = new mysqli ('localhost','root','','register-bd');
  
  $result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'");
  $user = $result->fetch_assoc();
  if(count($user) == 0) {
    echo "Пользователь не найден";
    exit();
  }
  setcookie('user', $user['name'], time() + 3600, "/");
  $mysql->close();
  header('Location: /');

?>