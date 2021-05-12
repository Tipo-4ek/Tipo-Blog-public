<?php

function upload_file($file, $upload_dir= 'images', $allowed_types= array('image/png','image/x-png','image/jpeg')){

  $blacklist = array(".php", ".phtml", ".php3", ".php4, .exe");
  $ext = substr($filename, strrpos($filename,'.'), strlen($filename)-1); // В переменную $ext заносим расширение загруженного файла.
  if(in_array($ext,$blacklist )){
    return array('error' => 'Запрещено загружать исполняемые файлы');}

  $upload_dir = __DIR_PUBLIC__.'/user_data/avatars/'; // Место, куда будут загружаться файлы.
  $max_filesize = 8388608; // Максимальный размер загружаемого файла в байтах (в данном случае он равен 8 Мб).
  $prefix = date('Ymd-is_');
  $filename = $file['name']; // В переменную $filename заносим точное имя файла.

  if(!is_writable($upload_dir))  // Проверяем, доступна ли на запись папка, определенная нами под загрузку файлов.
    return array('error' => 'Невозможно загрузить файл в папку "'.$upload_dir.'". Установите права доступа - 777.');

  if(!in_array($file['type'], $allowed_types))
    return array('error' => 'Данный тип файла не поддерживается.');

  if(filesize($file['tmp_name']) > $max_filesize)
    return array('error' => 'файл слишком большой. максимальный размер '.intval($max_filesize/(1024*1024)).'мб');

  if(!move_uploaded_file($file['tmp_name'],$upload_dir.$prefix.$filename)) // Загружаем файл в указанную папку.
    return array('error' => 'При загрузке возникли ошибки. Попробуйте ещё раз.');

    return Array('filename' => $prefix.$filename);
}

// Функция для генерации случайной строки (hash)
function generateCode($length=6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];
    }
    return $code;
}

?>
