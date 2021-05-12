<?php  require_once '../vendor/config.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Лента</title>
  <link rel="stylesheet" href="<?= __DIR_PUBLIC__.'/media/css/style-front.css'?>">
  <link rel="stylesheet" href="<?= __DIR_PUBLIC__.'/media/css/styles.css'?>">
  <link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  
</head>
<body>

      <?php
  
        if (isset($_COOKIE['id'])) {
         include "include/header_pad.php";
       }
       else{
         include "include/header_main.php";
       }
      ?>

        <div class="col-md-9" id = "color2" >Главная страница (Лента) <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></div>

        <div class="banner col-md-3 d-none d-md-block" id = "color3">
          <?php require_once("ad.php"); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6" id = "color4" ></div>
    </div>
    <div class="row">
        <div class="col-md-9" id = "color5" ></div>
    </div>

     <?php include "include/footer.php";?>
</body>
</html>