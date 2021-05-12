<?php  require_once '../vendor/config.php';
  if (!(isset($_COOKIE['id']) OR (!(isset($current_user_data['user_hash']))) OR ($_COOKIE['hash'] == $current_user_data['user_hash'])))
{
  header("Location:index.php");
}
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Научные достижения студента</title>
  <link rel="stylesheet" href="<?= __DIR_PUBLIC__.'/media/css/style-front.css'?>">
  <link rel="stylesheet" href="<?= __DIR_PUBLIC__.'/media/css/styles.css'?>">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://cdn.tiny.cloud/1/gv9n90jbsx5bdbgtg6fumve635bkpjp5q06s2iipv5ikx9zi/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


  <script>
    tinymce.init({
   selector: 'textarea#tiny',
   language: 'ru',
   menubar: 'edit insert format',
   statusbar:  false,
   min_height: 500,
   placeholder: 'Тема научно-исследовательской работы заключается в...',
   menu: {
    format: { title: 'Format', items: 'strikethrough superscript subscript  | formats fontformats fontsizes align | forecolor backcolor | removeformat' },
   },
   toolbar: 'undo redo alignleft aligncenter alignright  alignjustify bold italic underline image code link restoredraft checklist ',
   plugins: 'lists advlist image code link imagetools advcode media checklist powerpaste codesample autosave ',
   default_link_target: '_blank',

});
  </script>



</head>
<body>

      <?php
  
        if (isset($_COOKIE['id']) and ($_COOKIE['id']!='')) {
         include "include/header_pad.php";
       }
       else{
         include "include/header_main.php";
       }
      ?>

        <div class="col-md-9" id = "color2" >


<!-- -->
<p class='text-justify'> Как хотите прикрепить статью?</p>
<!-- -->
<select id="scient-type" class='w-30 p-3' name='scient_type'>
  <option class = '-' value="-">Выберите что-нибудь...</option>
  <option class = 'link' value="link">Ссылкой</option>
  <option class = 'file' value="file">Файлом</option>
  <option class = 'create' value="create">Создам сам</option>

</select>


<!-- create note -->
<div id="create" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
      <h3 id="myModalLabel">Создать научную статью</h3>
    </div>
    <div class="modal-body">

      
        <form class="form-group" id='form_note' method="post" action='' required>
            <input type="text" name='summary' class="form-control" placeholder="Название работы..." required>
             <input type="email" name='leader' class="form-control" placeholder="Почта научного руководителя..." required>
           <div class="input-group mt-2"> 
          <input type='hidden' name='email' value="<?=$_SESSION['email']; ?>" class='mt-11'>
        </div>
          <textarea name='note' id="tiny" required>
          </textarea>
          <div class="input-group mt-2">
            <input type="text" name='tags' class="form-control" placeholder="Ключевые слова через запятую" required>
          </div>

        
    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-success ">Сохранить</button>
      </form>
      <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Close</button>

    </div>
  </div>
  </div>
</div>



<!-- /create note -->
<!-- link -->
<div class="modal fade" id='link' tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Прикрепить научную работу ссылкой</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-group" id='form_link' method="post" action='' required>
          <div class="input-group mt-2">
            <input type="text" name='summary' class="form-control" placeholder="Название работы..." required>
             <input type="email" name='leader' class="form-control" placeholder="Почта научного руководителя..." required>
          </div>
          <div class="input-group mt-2">
          <div class="input-group-prepend">
            <div class="input-group-text">https://</div>
          </div>
          <input type="text" name='link' class="form-control" id="inlineFormInputGroup" placeholder="example.com/" required>
        </div>
        <input type='hidden' name='email' value="<?=$_SESSION['email']; ?>" class='mt-11'>
          <div class="input-group mt-2">
            <input type="text" name='tags' class="form-control" placeholder="Ключевые слова через запятую" required>
          </div>
        

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Сохранить</button>
       
       </form>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Закрыть</button>
      </div>
    </div>
  </div>
</div>
<!-- /link -->
<!-- file -->
<div class="modal fade" id='file' tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Загрузить научную работу файлом</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form class="form-group" id='form_file' method="post" action='' required> 
          <div class="input-group mt-2">
            <input type="text" name='summary' class="form-control" placeholder="Название работы..." required>
            <input type="email" name='leader' class="form-control" placeholder="Почта научного руководителя..." required>
          </div>
          <div class="form-group mt-2">
            <label for="exampleFormControlFile1">Прикрепите файл</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" required>
            <small text-muted> Можно прикрепить только файлы с расширением <span class='text-danger'>*.doc *.docx *.xls *xlsx </span> </small>
          </div>
          <input type='hidden' name='email' value="<?=$_SESSION['email']; ?>" class='mt-11'>
          <div class="input-group mt-2">
            <input type="text" name='tags' class="form-control" placeholder="Ключевые слова через запятую" required>
          </div>
        

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Сохранить</button>
        </form>

         <button type="button" class="btn btn-danger" data-dismiss="modal">Закрыть</button>
      </div>
    </div>
  </div>

</div>
<!-- /file -->
<br><br>
<table class="table table-borderless table-hover table-dark">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Тема</th>
      <th scope="col">Куратор</th>
      <th scope="col">Дата</th>
    </tr>
  </thead>

<?php 

$string = "SELECT * FROM notes WHERE user_email='".$current_user_data['user_email']."' ";

$query = mysqli_query($link,$string);

//var_dump($data);
$count = mysqli_num_rows($query);
//echo 'count='.$count;
$i = 1;

WHILE ($data = mysqli_fetch_assoc($query))
{
 if (!isset($data['leader_email'])) {$leader_email='';}

 if (mb_strlen($data['summary'])>45)
 {
  $sum = mb_substr($data['summary'], 0, 45, 'UTF-8').'...';
 }
 else $sum = $data['summary'];
 echo '<tr> <td>'.$i.'</td>';
 echo '<td> <a href='.__DIR_PUBLIC__.'/note.php?note_id='.$data['id'].'> '.$sum.'</a></td>';
 echo '<td> <a href='.__DIR_PUBLIC__.'/filter.php?leader='.$data['leader_email'].'> '.$data['leader_email'].'</td>';
 echo '<td>'.$data['timestamp'].'</td> </tr>';
 $count = $count - 1;
 $i++;

}









?>
</table>

<br><br><br><br><br><br><br><br><br><br><br>
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






<script>
  // Prevent Bootstrap dialog from blocking focusin
$(document).on('focusin', function(e) {
  if ($(e.target).closest(".tox-tinymce, .tox-tinymce-aux, .moxman-window, .tam-assetmanager-root").length) {
    e.stopImmediatePropagation();
  }
});
</script>


<script type="text/javascript">
  
$(document).ready(function(){
    $('#scient-type').change(function(){
        if ($('#scient-type option:selected').hasClass("link")) {
             $('#link').modal('show');
        } else if ($("#scient-type option:selected").hasClass("file")) {
             $('#file').modal('show');
             console.log('file');
        } else if ($('#scient-type option:selected').hasClass("create")) {
           $('#create').modal({backdrop: false});
            $('#create').modal('show');

            
        
        }
    });
});
</script>
<script>
$(document).ready(function() {
    var form_note = $('#form_note');
    form_note.submit(function(event) {
        event.preventDefault(); // Добавили, чтобы страница не перезагружалась
        $.ajax({
            url: 'ajax/note-handler.php',
            type: 'POST',                        
            data: form_note.serialize(), // Передаём данные
            success: function(result) {        
                console.log(result);
                alert(result);
                location.reload();
            },
        });
    })
});
</script>
<script>
$(document).ready(function() {
    var form_file = $('#form_file');
    form_file.submit(function(event) {
        event.preventDefault(); // Добавили, чтобы страница не перезагружалась
        $.ajax({
            url: 'ajax/note-handler.php',
            type: 'POST',                        
            data: form_file.serialize(), // Передаём данные
            success: function(result) {        
                console.log(result);
                alert(result);
                location.reload();
            },
        });
    })
});
</script>
<script> 
$(document).ready(function() {
    var form_link = $('#form_link');
    form_link.submit(function(event) {
        event.preventDefault(); // Добавили, чтобы страница не перезагружалась
        $.ajax({
            url: 'ajax/note-handler.php',
            type: 'POST',                        
            data: form_link.serialize(), // Передаём данные
            success: function(result) {        
                console.log(result);
                alert(result);
                location.reload();
            },
        });
    })
});

</script>


</body>
</html>