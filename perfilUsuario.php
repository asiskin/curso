<?php

require_once("funciones.php");

$email = $_GET["email"];

$usuario = traerPorEmail($email);
require('templates/open.php');
?>
    <div class="row">
        Bienvenidos al perfil de <?=$usuario["username"]?>
    </div>
<?php require('templates/close.php'); ?>
