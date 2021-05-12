<?php
require_once '../vendor/config.php';
//Скрипт проверки валидноести введенных данных в аутентификации 

// Соединямся с БД

 
if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))
{
    $query = mysqli_query($link, "SELECT * FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
    $userdata = mysqli_fetch_assoc($query);

   if($userdata['user_hash'] !== $_COOKIE['hash'])
  {

    if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))
    {
        $query = mysqli_query($link, "SELECT *,INET_NTOA(user_ip) AS user_ip FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
        $userdata = mysqli_fetch_assoc($query);
        //echo $userdata['user_id'] . ' - id server2 <br>';
        //echo $userdata['user_hash'] . ' - hash server2 <br>';

        if($userdata['user_hash'] !== $_COOKIE['hash'])

        {
            setcookie("id", "", time() - 3600*24*30*12, "/");
            setcookie("hash", "", time() - 3600*24*30*12, "/");
            print "Хм, что-то не получилось <br><br>";
            echo $_COOKIE['id'] . ' - id cookie3 <BR>';
            echo $_COOKIE['hash'] . ' - hash cookie3 <BR> <br><br>';
            //echo $userdata['user_id'] . ' - id server3<br>';
            //echo $userdata['user_hash'] . ' - hash server3<br>';
        }
    }
    }
        else
        {
            header("Location: index.php");
            print "Привет, ".$userdata['user_login'].". Всё работает!";
            exit();
        }
    

}
else 
{
    print "У тебя нет куков? Включи куки:)";
}

?>