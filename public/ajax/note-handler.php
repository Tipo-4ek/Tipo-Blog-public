<?php require_once '../../vendor/config.php';

if (isset($_POST['note'])){

	$note = "'".mysqli_real_escape_string ($link,$_POST['note'])."'"; 
	$note_link = 'NULL';
}
else if (isset($_POST['link'])){
	$note_link = "'".mysqli_real_escape_string ($link,trim($_POST['link'],' '))."'";
	$note = 'NULL';
}
else {
	$result ='Ошибка при добавлении статьи. Повторите ошибку позже';
 	echo $result;
 	exit();
}
$leader = mysqli_real_escape_string ($link,trim($_POST['leader'],' '));
$summary = mysqli_real_escape_string ($link,$_POST['summary']);
$user_email = $_POST['email'];
$tags_string = mysqli_real_escape_string ($link,trim($_POST['tags'],' '));




//echo 'note='.$note.' --- note_link='.$note_link;

//echo '----------end_note='.@$note.'---- end_link='.@$note_link;


//echo '--------------------------------------';
//echo $summary.' '.$tags_string.' '.$note.' '.$user_email.' '.$note_link;

$string = "INSERT INTO notes SET summary='".$summary."', tags='".$tags_string."',note=".$note.", user_email='".$user_email."', url=".$note_link.", 	leader_email='".$leader."' ";

$query = mysqli_query($link,$string);
if ($query) {
	echo 'Данные успешно заполнены!';
}
else {
	echo 'Ошибка при добавлении значений в БД. Повторите попытку, либо напишите @tipo_4ek';
}




?>