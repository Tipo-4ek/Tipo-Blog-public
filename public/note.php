<?php  require_once '../vendor/config.php';

$note_id = $_GET['note_id'];
$string = "SELECT * FROM notes WHERE id='".$note_id."'   ";
$query = mysqli_query($link,$string);
$data = mysqli_fetch_assoc($query);
$count = mysqli_num_rows($query);







?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Научные достижения - Статья</title>
  <link rel="stylesheet" href="<?= __DIR_PUBLIC__.'/media/css/style-front.css'?>">
  <link rel="stylesheet" href="<?= __DIR_PUBLIC__.'/media/css/styles.css'?>">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  
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
        	<table class="table table-responsive table-hover">

<?php 

echo '<tr> <td> <strong> Название </strong> </td>';
echo '<td>'.$data['summary'].'</td> </tr>';
if (isset($data['url'])) {
  echo '<tr> <td> <strong> Ссылка на работу </strong> </td> ';
  echo '<td> <a href ="http://'.$data['url'].'">'.$data['url'].'</a> </td> </tr>';
}
if (isset($data['file_path'])) {
	echo '<tr> <td> <strong> Файл </strong> </td>';
	echo '<td>'.$data['file_path'].' </td> </tr>';
}
echo '<tr> <td> <strong> Научный руководитель </strong> </td>';
echo '<td>'.$data['leader_email'].' </td> </tr>';

if (isset($data['note'])) {
echo '<tr> <td> <strong> Работа </strong> </td> </tr>';

}
echo '</table>';
echo $data['note'];



?>
			

        	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></div>

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