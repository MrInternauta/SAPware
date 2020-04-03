<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>SAPware</title>
</head>
<body class="text-center">

<nav class="navbar navbar-expand-md navbar-dark bg-dark">

    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
    </div>

    <div class="mx-auto order-0">
        <a class="navbar-brand mx-auto" href="index.php?controller=Usuario&action=dashboard"> <img src="views/assets/img/sapware.png" width="30%" height="30" class="d-inline-block align-top" alt="">
</a>
  
    </div>

    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
    
          <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user">Administracion</i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="index.php?controller=Usuario&action=profile">Mi perfil</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="index.php?controller=Usuario&action=login">Cerrar sesión</a>
                </div>
            </li> 
        </ul>
    </div>
</nav>

