<div class="container">
    <div class="row">
  
        <img width="100%" class = "ADimg" src="<?= __DIR_PUBLIC__.'/media/img/head.jpg'?>" onclick="window.location.href = 'http://vk.com/Tipo_4ek'" title="Менеджер по рекламе"> 

        <div class="col-md-12 sticky-top p-0 pb-1"> <!--HEADER-->
          <nav class="navbar navbar-expand-lg bg-dark navbar-dark ">
  <a class="navbar-brand " href="#">
    <img src="<?= __DIR_PUBLIC__.'/media/img/logo.png'?>" width="30" height="30" class="d-inline-block align-top text-white" alt="">
    Tipo-Blog
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto font-weight-lighter">
      <li class="nav-item ">
        <a class="nav-link " href="<?= __DIR_PUBLIC__.'/about.php'?>">Главная </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= __DIR_PUBLIC__.'/index.php'?>">Лента</a>
      </li>
      <li class="nav-item">
      <a class="nav-link disabled" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Успеваемость  
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Портфолио
      </a>
      </li>
         <form class="form-inline my-2 my-lg-0 pl-3">
      <input class="form-control mr-sm-2" type="search" placeholder="Поиск" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
    </form>
    </ul>
 
    <a href = "<?= __DIR_PUBLIC__.'/register.php'?>"> <button class="btn btn-primary mr-1" type="submit">Регистрация</button> </a>
    <a href = "<?= __DIR_PUBLIC__.'/login.php'?>"> <button class="btn btn-primary" type="submit">Авторизация</button> </a>
  </div>
</nav>
        </div>