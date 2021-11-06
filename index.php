<?php
require_once "config.php";
include_once 'Controllers/LoginController.php';

if(isset($_POST['email']) & isset($_POST['senha'])){
	if ((new LoginController)->logar()){
    header("location: Views/templates/modelo.php?pagina=principal");
  } else{
    $_POST['isLogin'] = false;
    header("location: Views/templates/modelo.php?pagina=login");
  }

} else{
  header("location: Views/templates/modelo.php?pagina=login");
}
?>