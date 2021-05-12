<?php  require_once '../../vendor/config.php';
//На этой странице мы принимаем значение из сайдбара в filter.php и делаем выборку нот в таблицу пользователю через ajaxы

//Если пришел запрос на фильтр по автору
if (isset($_GET['author']) and $_GET['author']!='') {
   $result = '
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Тема</th>
      <th scope="col">Автор</th>
      <th scope="col">Куратор</th>
      <th scope="col">Дата</th>
    </tr>
  </thead>';
  $res = 'author';

	$author = $_GET['author'];
	$string = "SELECT * FROM notes WHERE user_email='".$author."' ";
	echo 'author='.$string; 
}
//Если пришел запрос на фильтр по куратору
else if (isset($_GET['leader']) and $_GET['leader']!='') {
   $result = '
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Тема</th>
      <th scope="col">Автор</th>
      <th scope="col">Куратор</th>
      <th scope="col">Дата</th>
    </tr>
  </thead>';
  $res = 'leader';
	$leader = trim($_GET['leader']);
	$string = "SELECT * FROM notes WHERE leader_email='".$leader."' ";
	echo 'leader='.$string;	
}
//Если пришел запрос на фильтр по тегам
else if (isset($_GET['tag']) and $_GET['tag']!='') {
  $result = '
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Тема</th>
      <th scope="col">Автор</th>
      <th scope="col">Теги</th>
      <th scope="col">Дата</th>
    </tr>
  </thead>';
  $res = 'tags';

	$tag = $_GET['tag'];
	$string = "SELECT * FROM notes WHERE tags LIKE '%".$tag."%' ";
	echo 'tag='.$string;
}
else {
	echo 'Ошибка. Значение для фильтра не получено. Повторите попытку позже или напишите @tipo_4ek';
	exit();
}

//Делаем нужный запрос по фильтру
$query = mysqli_query($link,$string);
$count = mysqli_num_rows($query);
$i = 1;



//В $note_data хранится вся инфа об одной записи.
WHILE ($note_data = mysqli_fetch_assoc($query))
{
 //Если у пользователя есть доступ к ноте, то выводим
 if (($current_user_data['user_perk'] >= $note_data['note_perk']) AND $note_data['note_perk']>0  ){
   //Ограничиваем длину отображаемой строки названия в 45 символов	
   if (mb_strlen($note_data['summary'])>45)
  {
   $sum = mb_substr($note_data['summary'], 0, 45, 'UTF-8').'...';
  }
  else {$sum = $note_data['summary'];}

//Если пришел запрос на фильтр по тегам
if ($res == 'tags') {
 $result .= '<tr> <td>'.$i.'</td>';
 $result .= '<td> <a href='.__DIR_PUBLIC__.'/note.php?note_id='.$note_data['id'].' target="_blank"> '.$sum.'</a></td>';
 $result .= '<td>'.$note_data['user_email'].'</td>';
 $result .= '<td>'.$note_data['tags'].'</td>';
 $result .= '<td>'.$note_data['timestamp'].'</td> </tr>';
 $count = $count - 1;
 $i++;
}
//Если пришел запрос на фильтр по автору/куратору
else {
 $result .= '<tr> <td>'.$i.'</td>';
 $result .= '<td> <a href='.__DIR_PUBLIC__.'/note.php?note_id='.$note_data['id'].' target="_blank"> '.$sum.'</a></td>';
 $result .= '<td>'.$note_data['user_email'].'</td>';
 $result .= '<td>'.$note_data['leader_email'].'</td>';
 $result .= '<td>'.$note_data['timestamp'].'</td> </tr>';
 $count = $count - 1;
 $i++;
}
}
//else если доступа к статье нет, то эту строчку пропускаем
}

echo $result;

?>