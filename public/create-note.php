<?php  require_once '../vendor/config.php';
  if (!(isset($_COOKIE['id']) OR ($_COOKIE['hash'] == $current_user_data['user_hash'])))
{
  header("Location:index.php");
}
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>blog</title>
  <link rel="stylesheet" href="<?= __DIR_PUBLIC__.'/media/css/style-front.css'?>">
  <link rel="stylesheet" href="<?= __DIR_PUBLIC__.'/media/css/styles.css'?>">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= __DIR_PUBLIC__.'/media/reformator/reformator.css'?>">
  <link rel="stylesheet" href="<?= __DIR_PUBLIC__.'/media/reformator/toolbar.css'?>">
<style>
  .HTML {height: 100% ! important; width:100%;}
  @media screen and (max-width: 770px;)
  {
    form
    {
      max-width: 30%;
    }
  }
</style>

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

        <div class="col-md-9" id = "color2" >

         <form class ='d-md-block'>
          <table height="500px" cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td id="reformator_toolbar">
                <a href="<?=__DIR_PUBLIC__.'/media/reformator/help.html'?>" target="help" id="reformator_help" title="Справка по Реформатору">?</a>
                <ins class="toolbar">
                  <ins><a href="#clear" class="button with_icon"><ins class="clear_icon icon"><ins></ins></ins>Очистить HTML</a></ins>
                  <ins><a href="#typograph" class="button with_icon"><ins class="typograph_icon icon"><ins></ins></ins>Типографить</a></ins>
                </ins>
                <ins class="toolbar">
                  <ins><a class="button" href="#format p">Обычный параграф</a></ins>
                  <ins><a class="button" href="#format div">Слой</a></ins>
                  <ins><a class="button" href="#format h1">Заголовок 1</a></ins>
                  <ins><a class="button" href="#format h2">Заголовок 2</a></ins>
                  <ins><a class="button" href="#format h3">Заголовок 3</a></ins>
                  <ins><a class="button" href="#format blockquote">Цитата</a></ins>
                  <ins><a class="button" href="#format address">Адрес</a></ins>
                </ins>
                <ins class="toolbar">
                  <ins><a class="button with_icon" href="#format ul"><ins class="unordered_list_icon icon"><ins></ins></ins>Ненум. список</a></ins>
                  <ins><a class="button with_icon" href="#format ol"><ins class="ordered_list_icon icon"><ins></ins></ins>Нум. список</a></ins>
                </ins>
                <ins class="toolbar">
                  <ins><a class="button" href="#format span">Спан</a></ins>
                  <ins><a class="button" href="#format a[href]" class="hyperlink" title="Адрес">Ссылка</a></ins>
                  <ins><a class="button" href="#format strong"><strong>Полужирный</strong></a></ins>
                  <ins><a class="button" href="#format em"><em>Наклонный</em></a></ins>
                  <ins><a class="button" href="#format sup">X<sup>x</sup></a></ins>
                  <ins><a class="button" href="#format sub">X<sub>x</sub></a></ins>
                 
                 
                </ins>
               
              </td>
            </tr>
            <tr>
              <td height="70%">
                <input name='note-title' style='padding-top: 20px;'>  
                <textarea name="note-body" class="HTML"></textarea>
              </td>
            </tr>
          </table>
        </form>

<br><br>  
        </div>

        <div class="banner col-md-3 d-none d-md-block" id = "color3">
          <?php require_once("ad.php"); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6" id = "color4" >Юзер</div>
    </div>
    <div class="row">
        <div class="col-md-9" id = "color5" >Комментарии</div>
    </div>

     <?php include "include/footer.php";?>
<script src="<?= __DIR_PUBLIC__.'/media/reformator/reformator.js'?>"></script>
    <script type="text/javascript">
      reformator.auto({focus: true});
      reformator.control.auto({element: document.getElementById('reformator_toolbar')});
    </script>

</body>
</html>