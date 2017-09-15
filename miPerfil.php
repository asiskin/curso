<?php
require_once("funciones.php");

$title = 'Mi Perfil';

if (!estaLogueado()) {
  header("Location:register.php");exit;
}

$usuario = getUsuarioLogueado();


require('templates/open.php');
?>
    <div class="row">
        Bienvenido <?=$usuario["username"]?>
    </div>
<?php require('templates/close.php'); ?>
