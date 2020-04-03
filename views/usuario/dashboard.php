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
<h1>Mis proyectos</h1>
  <div class="col-3">
  <button type="button" class="btn btn-primary btn-lg " onclick="window.location.href='index.php?controller=Proyecto&action=buscar'" ><i class="fa fa-search"></i></button>
  <button type="button" class="btn btn-secondary btn-lg" onclick="window.location.href='index.php?controller=Proyecto&action=crear'"><i class="fa fa-plus"></i></button>
  </div>

<?php if (isset($proyectos)):?>
<div class="row m-4">
  <?php foreach($proyectos as $datos ):?>
    <div class="card" style="width: 18rem;">
      <img src=" <?php if($datos->img != '' && $datos->img != 'Ruta')  echo $datos->img; else echo 'views/assets/img/sapware.png'; ?>"  class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?= $datos->nombre; ?></h5>
        <!-- <p class="card-text-left">Estado: <span class="badge badge-success">Terminado</span> <br>
                              Rol: <span class="badge badge-info">Rol</span>
        </p> -->
        <a href="#" class="btn btn-primary"><i class="fa fa-eye"></i> </a>
        <a href="#" class="btn btn-warning"><i class="fa fa-pencil"></i> </a>
        <a href="#" class="btn btn-danger"><i class="fa fa-trash-o"></i> </a>

      </div>
    </div>
  <?php endforeach; ?>
<?php endif; ?>

</div>


</div>