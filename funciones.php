<?php


function validarInformacion() {
  $arrayDeErrores = [];

  $nombreDelArchivo = $_FILES["avatar"]["name"];
  $extension = pathinfo($nombreDelArchivo,PATHINFO_EXTENSION);

  if($_FILES["avatar"]["error"] != UPLOAD_ERR_OK) {
    $arrayDeErrores["avatar"] = "Hubo un error al subir el archivo";
  }
  else if ($extension != "jpg" && $extension != "jpeg" && $extension != "gif" && $extension !=  "png") {
    $arrayDeErrores["avatar"] = "Necesitamos que el avatar sea una foto";
  }


  if($_POST["nombre"] == "") {
    $arrayDeErrores["nombre"] = "Che, te equivocaste en el nombre";
  }

  if($_POST["email"] == "") {
    $arrayDeErrores["email"] = "Che, te equivocaste en el email";
  }
  else if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false) {
    $arrayDeErrores["email"] = "Che, el formato del mail es cualquiera";
  }

  if (strlen($_POST["contrasena"]) < 8) {
    $arrayDeErrores["contrasena"] = "Necesito que tu contraseña tenga al menos 8 caracteres";
  }
  else if (preg_match('/[A-Z]/', $_POST["contrasena"]) == false) {
    $arrayDeErrores["contrasena"] = "Necesito que tu contraseña tenga al menos 1 mayuscula";
  }
  else if ($_POST["contrasena"] != $_POST["contrasena_confirm"])
  {
    $arrayDeErrores["contrasena"] = "Las dos contraseñas no verifican";
  }


  return $arrayDeErrores;
}


?>
