<?php
require_once '../vendor/config.php';

// Страница регистрации нового пользователя

if(isset($_POST['submit']))
{
        $login = $_POST['login'];
        $email = $_POST['email'];
    $err = [];
    // проверям логин
    if(!preg_match("/^[a-zA-Z0-9_-]+$/",$_POST['login'])) // В пароле можно использовать любые латинские буквы и цифры + символ "_"
    {
        $err[] = "Логин может состоять только из букв английского алфавита и цифр";
    }

    if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30)
    {
        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
    }
    // проверяем, не сущестует ли пользователя с таким именем
    $query = mysqli_query($link, "SELECT user_id FROM users WHERE user_login='".mysqli_real_escape_string($link, $_POST['login'])."' OR user_email='".$_POST['email']."' ");
    if(mysqli_num_rows($query) > 0)
    {
        $err[] = "Пользователь с таким логином/почтой уже существует в базе данных";
    }

    // Если нет ошибок, то добавляем в БД нового пользователя
    if(count($err) == 0)
    {
        
        if ($login!='' AND $email!='' AND $_POST['password']!='')
         {
          // Убираем лишние пробелы и делаем двойное хеширование
          $password = md5(md5(trim($_POST['password'])));

          //Вставляем логин, пароль и почту
          mysqli_query($link,"INSERT INTO users SET user_login='".$login."', user_password='".$password."', user_email='".$email."'");
          //Вытаскиеваем id, для заполнения таблиц, использующих внешний ключ таблицы `users`
          $query2 = mysqli_query($link,"SELECT user_id FROM users WHERE user_login ='".$login."' ");
          $datausers = mysqli_fetch_assoc($query2);
          $id = $datausers['user_id'];
          $random_ava = rand(1,5);
          $first_ava = __DIR_PUBLIC__.'/user_data/avatars/default'.$random_ava.'.jpg';
         
          mysqli_query($link,"INSERT INTO persons SET person_id ='".$id."', person_ava='".$first_ava."'");
          //Авто авторизация на след странице без ввода log/pas
     
          $_SESSION['ua'] = $_SERVER['HTTP_USER_AGENT'];
          $_SESSION['login'] = $login;
          header("refresh: 1; url=login.php");
          echo "Аккаунт успешно создан! \n Вы будете перенаправлены на страницу авторизации через 3 секунды";
          exit();
      }
      else
      {
        echo "Аккаунт не создан! \n Пожалуйста, заполните все поля";
          exit();
      }
    }
    else
    {
        print "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach($err AS $error)
        {
            print $error."<br>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign In</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="<?= __DIR_PUBLIC__.'/media/img/icons/favicon.ico'?>"/>
    <link rel="stylesheet" type="text/css" href="<?= __DIR_PUBLIC__.'/media/bootstrap/css/bootstrap.min.css'?>">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="<?= __DIR_PUBLIC__.'/media/css/menu.css'?>">

   

   


  <body class="login-page">
    <main>
      <div class="login-block">
        <img src="<?= __DIR_PUBLIC__.'/media/img/menu.png'?>" width="100px" height="150px" alt="Scanfcode">
        <h1>Безвозмездное добавление пользователя</h1>
        <form method="POST">
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user "></i></span>
              <input type="text" name='login' class="form-control" placeholder="Головосшибательный логин">
            </div>
          </div>
          
          <hr class="hr-xs">

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon" style="max-width: 35px;"><i class="fa fa-envelope"></i></span>
              <input type="email" name='email' class="form-control" placeholder="Почта">
            </div>
          </div>
                <hr class="hr-xs">

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock"></i></span>
              <input type="password" name='password' class="form-control" placeholder="Суперсекретный пароль">
            </div>
          </div>

          <button class="btn btn-primary btn-block" type="submit" name = "submit">Зарегистрироваться</button>

        </form>
      </div>

      <div class="login-links">
        <p class="text-center">Уже есть аккаунт?<a class="txt-brand" href="<?= __DIR_PUBLIC__.'/login.php'?>"><font color=#29aafe> Авторизуйтесь</font></a></p>
      </div>

    </main>
  
  





    
<!--===============================================================================================-->  
    <script src="https://use.fontawesome.com/44fe5170f7.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

</body>
</html>