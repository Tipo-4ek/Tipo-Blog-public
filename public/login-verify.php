<?php
    require_once '../vendor/config.php'; 
    $login1 = $_POST['login'];
  
   	
    $array = mysqli_fetch_assoc(mysqli_query($link, "SELECT user_id FROM users WHERE user_login = '".$login1."'"));
    var_dump($array);
    if (count($array)>0) {
        echo 'Занят';
        }
    else echo "Свободен";

?>