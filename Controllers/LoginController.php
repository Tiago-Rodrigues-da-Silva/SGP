<?php

include 'Models/LoginClass.php';

class LoginController{

public function logar(){
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $isConected = (new LoginClass())->logar($email, $senha);
    return $isConected;
}
}