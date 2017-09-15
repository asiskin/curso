<?php
require_once("funciones.php");

$title = 'HOME';

$usuarios = traerTodos();

require('templates/open.php');
?>
    <div class="row">
        <ul>
          <?php foreach ($usuarios as $usuario) : ?>
            <li>
              <a href="perfilUsuario.php?email=<?=$usuario["email"]?>">
                <?=$usuario["username"]?>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
    </div>
<?php require('templates/close.php'); ?>
