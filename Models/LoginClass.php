<?php

require 'conexao.php';

class LoginClass{
    function logar($email, $senha){

        global $pdo;

        $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("email", $email);
        $sql->bindValue("senha", $senha);
        $sql->execute();

        if($sql->rowCount() > 0){
            $dado = $sql->fetch();
            $responsavel = $dado['id_usuario'];                        
            return true;
        }else{
            return false;
        }
    }
}
