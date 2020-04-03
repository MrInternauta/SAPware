<div class="container bootstrap snippet">
    <div class="row">
  		<div class="col"><h1>Editar perfil</h1></div>
    </div>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->
              

      <div class="text-center">
        <img src="./images/<?= $_SESSION['usuario']['id'] ?>.png" class="avatar img-circle img-thumbnail" alt="avatar">
        <h6>Subir una imagen de usuario diferente...</h6>

        <form action="index.php?controller=Usuario&action=profilePicture" method="POST" enctype="multipart/form-data">
        Añadir imagen: <input name="archivo" id="archivo" type="file"/>
        <hr>
        <button class="btn btn-lg btn-success" type="submit" name="subir" value="Subir imagen"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>

        </form>


        <!-- <form class="form" action="./controllers/subir.php" method="post" id="registrationForm">
            <input enctype="multipart/form-data" type="file" name="subir"class="text-center center-block file-upload">
            <hr>
            <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
        </form> -->
      </div></hr><br>

          
        </div><!--/col-3-->
    	<div class="col-sm-9">
        <?php if($error != ''): ?>
            <div class="alert alert-danger" role="alert">
            <?php echo $error ?>
            </div>
        <?php endif; ?>

        <?php if($correcto != ''): ?>
            <div class="alert alert-success" role="alert">
            <?php echo $correcto ?>
            </div>
        <?php endif; ?>       

          <div class="tab-content">
            <div class="tab-pane active" id="home">
                <hr>
                  <form class="form" action="index.php?controller=Usuario&action=profile" method="post" id="registrationForm">
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>Nombre</h4></label>
                              <input type="text" class="form-control" name="first_name" value="<?= $_SESSION['usuario']['nombre'] ?>" id="first_name" placeholder="first name" title="enter your first name if any.">
                          </div>
                      </div>
            
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="email" id="email" value="<?= ($_SESSION['usuario']['correo'] )?>" placeholder="you@email.com" title="enter your email.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Password</h4></label>
                              <input type="password" class="form-control" name="password" id="password" value="<?= isset($_SESSION['usuario']['pass']) ? $_SESSION['usuario']['pass'] : '' ?>" placeholder="password" title="enter your password.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>Verificar</h4></label>
                              <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                               	<!-- <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button> -->
                            </div>
                      </div>
              	</form>
              
              <hr>
              
             </div><!--/tab-pane-->

          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
