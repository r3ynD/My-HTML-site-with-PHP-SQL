<?php
  $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

  if(mb_strlen($login)< 3 || mb_strlen($login)> 90 ){
    echo "Недопустимая длина логина (минимум 4 символа)";
    exit();
  } else if (mb_strlen($name)< 3 || mb_strlen($name)> 90 ){
    echo "Недопустимая длина имени (минимум 3 символа)";
    exit();
  } else if (mb_strlen($pass)< 6 || mb_strlen($pass)> 90 ){
    echo "Недопустимая длина имени (минимум  6 символов)";
    exit();
  }

  $mysql = new mysqli ('localhost','root','','register-bd');
  $mysql->query("INSERT INTO `users`(`login`, `pass`, `name`) VALUES('$login', '$pass', '$name')");
  $mysql->close();
  header('Location: /');
?>
