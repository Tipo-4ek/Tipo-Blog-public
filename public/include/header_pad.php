<div class="container">
    <div class="row">
  
        <img width="100%" class = "ADimg" src="<?= __DIR_PUBLIC__.'/media/img/head.jpg'?>" onclick="window.location.href = 'http://vk.com/Tipo_4ek'" title="Менеджер по рекламе"> 

        <div class="col-md-12 sticky-top p-0 pb-1"> <!--HEADER-->
          <nav class="navbar navbar-expand-lg bg-dark navbar-dark ">
  <a class="navbar-brand " href="<?= __DIR_PUBLIC__.'/index.php'?>">
    <img src="<?= __DIR_PUBLIC__.'/media/img/logo.png'?>" width="30" height="30" class="d-inline-block align-top text-white" alt="">
    Tipo-Blog
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

   <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto font-weight-lighter">
      <li class="nav-item">
        <a class="nav-link " href="<?= __DIR_PUBLIC__.'/about.php'?>">Главная </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= __DIR_PUBLIC__.'/index.php'?>">Лента</a>
      </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Успеваемость  
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?= __DIR_PUBLIC__.'/pass.php'?>">Зачеты</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle"  id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Портфолио
      </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?= __DIR_PUBLIC__.'/edu.php'?>">Учебная деятельность</a>
          <a class="dropdown-item" href="<?= __DIR_PUBLIC__.'/scient.php'?>">Научная деятельность</a>
         
        </div>
      </li>
         <form class="form-inline my-2 my-lg-0 pl-3">
      <input class="form-control mr-sm-2" type="search" placeholder="Поиск" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
    </form>
    </ul>
 
   
 
  <div class="dropdown open">
  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-haspopup="true" aria-expanded="false">
    <?php if (isset($_COOKIE['login']) and isset($_COOKIE['id'])) {echo 'Привет, '.@$_COOKIE['login'];} else {header("Refresh: 0");} ?> 
  </button>
  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

    <a class="dropdown-item" href="<?= __DIR_PUBLIC__.'/user-profile.php?id='.$_COOKIE['id']?>">Моя страница</a>
    <a class="dropdown-item" href="<?= __DIR_PUBLIC__.'/settings.php?id='.$_COOKIE['id']?>">Настройки</a>
</div>
</div>
  <button type="button" class="btn btn-danger ml-1" style = "border-radius: 7%"  onclick="deleteAllCookies(); location.reload();" <?php $_SESSION['login']=''; $_SESSION['id']=''?>>Выход</button>
  





  
</nav>
        </div>