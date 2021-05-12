<?php
require_once '../vendor/config.php';

//Если юзер агент в сессии не совпал с юзер агентом в браузере, то пшел вон
if (@$_SESSION['ua'] != $_SERVER['HTTP_USER_AGENT']) {
    //('Wrong browser');
    $_SESSION['ua'] = '';
}

//Если у чела в сессии есть логин (кейс - пришел со страницы регистрации), то без ввода log/pas авторизируем
if (isset($_SESSION['login']) and $_SESSION['login']!='' and $_SESSION['ua'] == $_SERVER['HTTP_USER_AGENT'] ) {
    $query1 = mysqli_query($link,"SELECT user_id, user_perk, user_login, user_hash FROM users WHERE user_login='".mysqli_real_escape_string($link,$_SESSION['login'])."' LIMIT 1") or die("ERROR: ".mysql_error());
    $data1 = mysqli_fetch_assoc($query1);
    $hash = md5(generateCode(10));
    $sql1 = mysqli_query($link, "UPDATE users SET user_hash='".$hash."' WHERE user_login='".mysqli_real_escape_string($link,$_SESSION['login'])."'") or die("ERROR: ".mysql_error());
    setcookie("id", $data1['user_id'], time()+60*60*24*30);
    setcookie("login", $data1['user_login'], time()+60*60*24*30);
    $_SESSION['hash']=$hash;
    $_SESSION['perk']=$data1['user_perk'];
    header("Location: index.php"); 
    exit();
}




// Страница авторизации


if(isset($_POST['submit']))
{
    // Вытаскиваем из БД запись, у которой логин равняется введенному
    $query = mysqli_query($link,"SELECT user_id, user_password, user_login, user_perk FROM users WHERE user_email='".mysqli_real_escape_string($link,$_POST['login'])."' LIMIT 1") or die("ERROR: ".mysql_error());
    $data = mysqli_fetch_assoc($query);

    // Сравниваем пароли
    if($data['user_password'] === md5(md5($_POST['password'])))
    {
        // Генерируем случайное число и шифруем его
        $hash = md5(generateCode(10));
        $sql = mysqli_query($link, "UPDATE users SET user_hash='".$hash."' WHERE user_email='".mysqli_real_escape_string($link,$_POST['login'])."'") or die("ERROR: ".mysql_error());

        // Ставим куки
        setcookie("id", $data['user_id'], time()+60*60*24*30);
        setcookie("hash", $hash, time()+60*60*24*30,null,null,null,true); // httponly !!!
        setcookie("login", $data['user_login'], time()+60*60*24*30);
        //Если чел неавторизирован, то запихиваем логин и user-agent в сессию
        
            $_SESSION['ua'] = $_SERVER['HTTP_USER_AGENT'];
            $_SESSION['login'] = $data['user_login'];
            $_SESSION['hash'] = $hash;
            $_SESSION['perk']=$data['user_perk'];
       


        // Переадресовываем браузер на страницу проверки нашего скрипта
        header("Location: check.php"); exit();
    }
    else
    {
        print "Вы ввели неправильный логин/пароль";
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
        <h1>Извините, но Вы кто?</h1>
        <form method="POST">
         <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon" style="max-width: 35px;"><i class="fa fa-envelope"></i></span>
              <input type="email" name='login' class="form-control" placeholder="Почта">
            </div>
          </div>
                <hr class="hr-xs">

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock"></i></span>
              <input type="password" name='password' class="form-control" placeholder="Суперсекретный пароль">
            </div>
          </div>

          <button class="btn btn-primary btn-block" type="submit" name = "submit">Авторизоваться</button>

        </form>
      </div>

      <div class="login-links">
        <p class="text-center">Еще нет аккаунта? <a class="txt-brand" href="<?= __DIR_PUBLIC__.'/register.php'?>"><font color=#29aafe>Регистрируйся</font></a></p>
      </div>

    </main>
  
  





    
<!--===============================================================================================-->  
    <script src="https://use.fontawesome.com/44fe5170f7.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

</body>
</html>
