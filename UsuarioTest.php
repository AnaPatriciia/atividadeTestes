<?php
require_once "./Usuario.php";
require_once "./Test.php";
require_once './DB/Database.php';
require_once "./entity/Usuario2.php";

class UsuarioTest extends Test{
    public function cadastroTest(){
        $usuario = new Usuario();
        $this->isTrue($usuario->cadastrar("Ana", "ana@gmail.com","1234","31265478914","6798456321","07061996"),"Algum item está vazio");
    }

    public function atualizarSenhaTest(){
        $usuario = new Usuario();
        $usuario->cadastrar("","Ana", "ana@gmail.com","1234","31265478914","6798456321","07061996");

        $this->isTrue($usuario->atualizarSenha("ana456"));
    }
    public function excluirTeste() {
        $usuario = new Usuario();
    
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
    
            $resultado = $usuario->excluirTeste($id);
    
            if ($resultado) {
                echo "Usuário excluído com sucesso!";
            } else {
                echo "Erro ao excluir o usuário.";
            }
        } else {
            echo "ID não informado.";
        }
    }
    
}

$UsuarioTest = new UsuarioTest();
$UsuarioTest->cadastroTest();
$UsuarioTest->atualizarSenhaTest();
$UsuarioTest->excluirTeste();