<?php
class Usuario{
    private $nome;
    private $email;
    private $senha;

    public function cadastrar($nome, $email, $senha){
        if($nome != "" && $email != "" && $senha != ""){
            $this->$nome = $nome;
            $this->$email =$email;
            $this->$senha =$senha;
            
            return true;
        }else{
            return false;
        }
    }


    public function atualizarSenha($novaSenha){
        if($novaSenha != ""){
            $this->senha = $novaSenha;

            return true;
        }else{
            return false;
        }
    }
}


