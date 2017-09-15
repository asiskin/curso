<?php
require_once("funciones.php");

if (estaLogueado()) {
  header("Location:miPerfil.php");exit;
}

$title = 'LOGIN';

$arrayDeErrores = [];

if ($_POST) {
  $arrayDeErrores = validarLogin();

  if (count($arrayDeErrores) == 0) {
    loguear($_POST["email"]);
    if (isset($_POST["recordame"])) {
      recordar($_POST["email"]);
    }

    header("Location:miPerfil.php");exit;
  }

}

require('templates/open.php');
?>
    <div class="row">
        <?php if (count($arrayDeErrores) > 0) : ?>
          <ul style="color:red;">
              <?php foreach($arrayDeErrores as $error) : ?>
                <li>
                  <?=$error?>
                </li>
              <?php endforeach; ?>
          </ul>
        <?php endif;?>
        <form role="form" action="login.php" method="post">
          <div class="row">
              <div class="form-group col-sm-6">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Ingrese Nombre">
              </div>
              <div class="form-group col-sm-6">
                  <label for="contrasena">Contraseña</label>
                  <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Ingrese Contraseña">
              </div>
          </div>
          <input type="checkbox" name="recordame" value="1">Recordame
          <input type="submit" name="btn_submit" class="btn btn-info" value="Login"/>
        </form>
    </div>
<?php require('templates/close.php'); ?>
