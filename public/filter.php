<?php  require_once '../vendor/config.php';?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Фильтрация</title>
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

        <div class="col-md-9" id = "color2" >

          <select id="filter-select" class='w-30 p-3 mt-2' name='scient_type'>
            <option selected disabled>Фильтр по:</option>
            <option class = 'author'>Автору</option>
            <option class = 'leader'>Куратору</option>
            <option class = 'tag'>Ключевому слову</option>
            
          </select>


          <form class="form-group" id='form-filter' method="GET" action='' required>
    <div class="form-row" >
     <div class="col-md-4 mb-3" id='author' style='display:none;'>
      <label for="validationTooltip01">E-mail автора:</label>
      <input type="text" class="form-control" name='author' placeholder="Lyubimov-ia2020@sgugit.ru" >
    </div>
    <div class="col-md-4 mb-3" id='leader' style='display:none;'>
      <label for="validationTooltip01">E-mail Куратора:</label>
      <input type="text" class="form-control" name='leader' placeholder="Lyubimov-ia2020@sgugit.ru" >
    </div>
    <div class="col-md-4 mb-3" id='tag' style='display:none;'>
      <label for="validationTooltip01">Ключевое слово:</label>
      <input type="text" class="form-control" name='tag' placeholder="Робототехника">
    </div>
  </div>
   <button class="btn btn-primary mt-2" type="submit">Покажи</button>
</form>
          
          <table class="table table-borderless table-hover table-dark" >
          	<?php
          		$entry_bool = false;
if ($entry_bool == false) {
	if (isset ($_GET['leader'])) {
	    $string = "SELECT * FROM notes WHERE leader_email='".$_GET['leader']."' ";
	    $query = mysqli_query($link,$string);
		$count = mysqli_num_rows($query);
		$i = 1;


		$result = '
		    <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Тема</th>
		      <th scope="col">Куратор</th>
		      <th scope="col">Автор</th>
		      <th scope="col">Дата</th>
		    </tr>
		  </thead>';


		WHILE ($note_data = mysqli_fetch_assoc($query))
		{
      if (($current_user_data['user_perk'] >= $note_data['note_perk']) AND $note_data['note_perk']>0  ){
		 if (mb_strlen($note_data['summary'])>45)
		 {
		  $sum = mb_substr($note_data['summary'], 0, 45, 'UTF-8').'...';
		 }
		 else {$sum = $note_data['summary'];}

		 $result .= '<tr> <td>'.$i.'</td>';
		 $result .= '<td> <a href='.__DIR_PUBLIC__.'/note.php?note_id='.$note_data['id'].' target="_blank"> '.$sum.'</a></td>';
		 $result .= '<td>'.$note_data['leader_email'].'</td>';
		 $result .= '<td>'.$note_data['user_email'].'</td>';
		 $result .= '<td>'.$note_data['timestamp'].'</td> </tr>';
		 $count = $count - 1;
		 $i++;
		}
  } 
  echo $result;
	}

}
          	?>
          </table>

          <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


          <div class = 'test'>
          </div>


        </div>       
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



<script type="text/javascript">

$(document).ready(function(){
    if ($('.table').val() != '') {           
         $('.table').attr('style', '');
        }
});
  
$(document).ready(function(){
    $('#filter-select').change(function(){
        if ($('#filter-select option:selected').hasClass("author")) {
            $('#author').attr('style', '');
            $('#leader').attr('style', 'display:none;');
            $('#tag').attr('style', 'display:none;');
            console.log('author');
        } else if ($("#filter-select option:selected").hasClass("leader")) {
             $('#leader').attr('style', '');
             $('#tag').attr('style', 'display:none;');
             $('#author').attr('style', 'display:none;');

             console.log('leader');
        } else if ($('#filter-select option:selected').hasClass("tag")) {
            $('#tag').attr('style', '');
            $('#author').attr('style', 'display:none;');
            $('#leader').attr('style', 'display:none;');
            console.log('tag');

            
        
        }
    });
});
</script>
<script>
$(document).ready(function() {
    var form_note = $('#form-filter');
    form_note.submit(function(event) {
        event.preventDefault(); // Добавили, чтобы страница не перезагружалась
        $.ajax({
            url: 'ajax/filter-handler.php',
            type: 'GET',                        
            data: form_note.serialize(), // Передаём данные
            success: function(result) {        
                console.log(result);
                $('#form-filter')[0].reset();
                $('.table').attr('style', '');
                $('.table').val('');
                $('.table').html(result);

                
            },
        });
    })
});
</script>

</body>
</html>