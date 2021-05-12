<?php require_once '../vendor/config.php'; 

if (!(isset($_COOKIE['id']) OR !($_SESSION['hash'] == $current_user_data['user_hash'])))
{
  header("Location:index.php");
}
     

if (!isset($view_person_data))
{
  header("location:404.html");
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= @$_COOKIE['login'].' Страница пользователя - Tipo-Blog' ?></title>
  <link rel="stylesheet" href="<?= __DIR_PUBLIC__.'/media/css/style-front.css'?>">
  <link rel="stylesheet" href="<?= __DIR_PUBLIC__.'/media/css/styles.css'?>">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body background="img/back.png">

    
      <?php
     
       if (isset($_COOKIE['id']) AND ($_SESSION['hash'] == $current_user_data['user_hash'])) {
         include "include/header_pad.php";     
      }
       else{
        include "include/header_main.php"; 
      }

      if ((isset($_POST['submit'])) AND ($_SESSION['hash'] == $current_user_data['user_hash']))
      {
        $id = $current_user_data['user_id'];
        @$new_user_login = trim($_POST['new_user_login']);
        @$new_password = $_POST['password'];
        @$new_status = $_POST['status'];
        @$new_about = $_POST['about_me'];
        @$new_email = $_POST['email'];
        
        //Проверяем логин на валидность - Латинские буквы англ. алфавита и цифры, содержать не менее 3-х символов и не больше 30 (Проврека на совпадения пройдена с помощью AJAX в поле ввода формы)
        $return = 0;
        if (isset($new_user_login))
        {  
          if ((preg_match("/^[a-zA-Z0-9_]+$/",$new_user_login)) AND ((strlen($new_user_login) >= 3 AND strlen($new_user_login) < 30)))
          {
            $new_user_login = mysqli_real_escape_string($link, $new_user_login);
            $SQL = mysqli_query($link, "UPDATE users SET user_login ='".$new_user_login."' WHERE user_login='".$current_user_data['user_login']."' ");
            setcookie("login", $new_user_login, time()+60*60*24*30);
            $return = 1;
           
          }
          // выводит всегда else echo 'Логин должен содержать только латинские буквы, цифры и знак подчеркивания, логин должен быть в пределах от 3 до 30 символов.';
        }

       

       if (isset($new_status) AND ((strlen($new_status))>2) AND ((strlen($new_status))<90))
       {
         $new_status = mysqli_real_escape_string($link, $new_status);
         $sql = mysqli_query($link, "UPDATE persons SET person_status='".$new_status."' WHERE person_id='".$id."' ");
       }

       if (isset($new_about) AND ((strlen($new_about))>2) AND ((strlen($new_about))<90))
       {
         $new_about = mysqli_real_escape_string($link, $new_about);
         $sql = mysqli_query($link, "UPDATE persons SET person_status_about='".$new_about."' WHERE person_id='".$id."' ");
       }

       if (isset($new_email) AND ((strlen($new_email))>5) AND (preg_match("/[0-9a-z]+@[a-z]/", $new_email)) )
       {
        $new_email = mysqli_real_escape_string($link, $new_email);
        $sql = mysqli_query($link, "UPDATE users SET user_email ='".$new_email."' WHERE user_login='".$current_user_data['user_login']."' ");

       }

        if (isset($new_password) AND ((strlen($new_password) > 2 AND strlen($new_password) < 30)))
        {
          $new_password = md5(md5(trim($_POST['password'])));
          $string = "UPDATE users SET user_password = '".$new_password."' WHERE user_login = '".$current_user_data['user_login']."'";
          $query = mysqli_query($link, $string);
          
          SetCookie("login","");
          SetCookie("id","");
          SetCookie("hash","");
          $_SESSION['login']='';
          $_SESSION['hash']='';
          $_SESSION['perk']='';

         
        }


       echo '<script> window.location.replace("https://tipoblog.tw1.ru/public/index.php"); location.reload; </script>';
      }


      ?>

        <div class="col-md-9" id = "color2">
 
 
        <form  method="POST"> 
            <div class="form-group"> 
                <label for="fname">Никнейм</label> 
                <input type="text" class="form-control" id="login"
                    placeholder="Новый логин" name="new_user_login"> 
                <div  class="valid-feedback" autocomplete='off'> Букв хватает </div>
                <div class="invalid-feedback"> 
                  СРОЧНО! НЕХВАТКА БУКВ! АААААААААААААААААААААААААА      
                </div> 
                <div id='log' class='valid'> 
                  <!-- Jquery Выводит после проверки php на совпадение логина-->
                </div> 
            </div> 

          <label for="inputPassword5">Password</label>
          <input type="password" name="password" id="inputPassword5" placeholder="Мега сложный пароль" class="form-control" aria-describedby="passwordHelpBlock" autocomplete="off">
          <p id="passwordHelpBlock" class="form-text text-muted">
            Пароль должен содержать...
          </p>
                       
            <div class="form-group"> 
                <label for="status">Статус</label> 
                <input type="text" class="form-control" id="status"
                    placeholder="Люблю гладить собачек" name="status" > 
                <div class="valid-feedback">Valid</div> 
                <div class="invalid-feedback"> 
                    Please fill this field 
                </div> 
            </div> 
             
            <div class="form-group"> 
                <label for="about_me">О себе</label>  
                <input type="name" class="form-control" id="about_me"
                    placeholder="Имею опыт работы с код ревью, работал тим лидом в компании ххх, умею печь пироги" name="about_me">
                <div class="valid-feedback">Valid</div> 
                <div class="invalid-feedback"> 
                    Please fill this field 
                </div> 
            </div> 
             
            <div class="form-group"> 
                <label for="contact">Почта</label> 
                <input type="text" class="form-control" id="email" placeholder="123@xyz.com" name="email"> 
                <div class="valid-feedback">Valid</div> 
                <div class="invalid-feedback"> 
                    Please fill this field 
                </div> 
            </div> 
             
             
            <button type="submit" name="submit" class="btn bg-success">Отправить</button> 

        </form> 
    <br>
    </div>

        <div class="banner col-sm-3 d-none d-md-block" id = "color3">
          <?php require_once("ad.php"); ?>
        </div>
    </div>
  

     <?php include "include/footer.php";?>
     <script async type="text/javascript" src="<?= __DIR_PUBLIC__.'/media/js/login-verify.js'?>"></script>




</body>
</html>