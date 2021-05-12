<?php require_once '../vendor/config.php'; 
if (!isset($_GET['id']))
{
  header("Location:index.php");
}
     //Получение данных для аватарки, кармы, подписоты и пр.

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
  <title><?= @$view_person_data['user_login'].' Страница пользователя - Tipo-Blog' ?></title>
  <link rel="stylesheet" href="<?= __DIR_PUBLIC__.'/media/css/style-front.css'?>">
  <link rel="stylesheet" href="<?= __DIR_PUBLIC__.'/media/css/styles.css'?>">
  <link rel="stylesheet" href="<?= __DIR_PUBLIC__.'/media/wmd/wmd.css'?>">
  <link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body background="img/back.png">
 
      <?php
      
       if (isset($_COOKIE['id'])) {
         include "include/header_pad.php";     
       }
       else{
         include "include/header_main.php";
       }
      ?>

        <div class="col-md-9" id = "color2">
          <div class="row">
              <div class="col-md-4 text-center"><img class="img-fluid rounded-circle" style = "max-width: 100%; height: auto;" src="<?= $view_person_data['person_ava'] ?>" /></div>
             <div class="col-md-5">
              <h1 class="pt-4" style = "padding-left: 48px;"> <?= $view_person_data['user_login'] ?></h1>
              <h6 class='pl-5'> <?php if (isset($view_person_data['person_status'])) {echo $view_person_data['person_status'];}?></h6>
              <p class='h6' style = "padding-left: 48px;">
                    <?php 
                      if (isset($view_person_data['person_tags']))
                      {
                        $tags = explode(",",$view_person_data['person_tags']);
                        for ($i = 0; $i<count($tags); $i++)
                        {
                          echo "<span class='pl-1 pr-1 ml-1' id='profile-section__user-badge'>".$tags[$i].'</span> ';
                        }
                      }

                    ?>

              </p>
               <ul class="menu mt-5">
                  <!-- Карма, подписота -->
                  <li> Карма <br><a title = "Статистика кармы" href="#"><img src="<?= __DIR_PUBLIC__.'/media/img/1.png'?>"></a><br><?= $view_person_data['person_karma']; ?></li>
                  <li> Подписчики <br><a title = "Количество подписчиков" href="#"><img src="<?= __DIR_PUBLIC__.'/media/img/2.png'?>"></a><br><?= $view_person_data['person_subscribers']; ?></li>
                  <li> Подписки <br><a title = "Количество подписок" href="#"><img src="<?= __DIR_PUBLIC__.'/media/img/3.png'?>"></a> <br><?= $view_person_data['person_subscriptions']; ?></li>
                  <li> Статьи <br><a title = "Количество статей" href="#"><img class = "mt-2"width ='60px' height ='60px' src="<?= __DIR_PUBLIC__.'/media/img/4.png'?>"></a> <br><?= $view_person_data['person_countnotes']; ?></li>
               </ul>
            </div>

          </div> 
          <!-- Табы  -->
                    <nav class="nav nav-pills flex-column flex-sm-row justify-content-center">
           
               <a class="flex-sm-fill text-sm-center nav-link" title = "Профиль пользователя" href="<?= __DIR_PUBLIC__.'/user-profile.php?id='.$_GET['id']?>">Профиль</a>
               <a class="flex-sm-fill text-sm-center nav-link" title = "Публикации пользователя" href="<?= __DIR_PUBLIC__.'/user-notes.php?id='.$_GET['id']?>">Статьи</a>
               <a class="flex-sm-fill text-sm-center nav-link active" title = "Статьи, которые пользователь добавил в закладки" href="<?= __DIR_PUBLIC__.'/user-bookmarks.php?id='.$_GET['id']?>">Закладки</a>         
          </nav>
          <br>


        </div>
    
       <div class="banner col-sm-3 d-none d-md-block" id = "color3">
          <?php require_once("ad.php"); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-9" id = "color5" >Комментарии</div>
    </div>


     <?php include "include/footer.php";?>
</body>
</html>