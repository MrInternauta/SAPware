<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
<div class="container">

<form class="form-signin" method="post" action="index.php?controller=Rol&action=crear">
<br>
  <h1 class="h3 mb-3 font-weight-normal">Crear Rol</h1>
  <input type="text" id="inputName" class="form-control" placeholder="Nombre" name="name" required autofocus>
  <br>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Crear</button>
  <p class="mt-5 mb-3 text-muted">&copy; 2019</p>

  <?php  if( $error == 'Creado'): ?>
  <div class="alert alert-success" role="alert">
    Realizado
  </div>
    <?php  elseif($error != ''): ?>
  <div class="alert alert-danger" role="alert">
    <?php  echo $error; ?>
  </div>
    <?php  endif; ?>

</form>
</div>