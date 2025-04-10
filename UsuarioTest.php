<?php
require_once "./Usuario.php";
require_once "./Test.php";
require_once "./DB/Database.php";
require_once "./Entity/Usuario2.php";

class UsuarioTest extends Test {
    public function cadastroTest() {
        $usuario = new Usuario();
        $this->isTrue(
            $usuario->cadastrar("Ana","Ana@gmail.com","123456","045559137145","67998512134","02081993"),
            "Algum item está vazio"
        );
    }

    public function atualizarSenhaTest() {
        $usuario = new Usuario();
        $usuario->cadastrar("Ana","Ana@gmail.com","123456","045559137145","67998512134","02081993");

        $this->isTrue(
            $usuario->atualizarSenha("Ana456"),
            "Falha ao atualizar a senha"
        );
    }

    public function excluirTest() {
        $usuario = new Usuario();
        $id = $usuario->cadastrar("Teste Excluir", "teste@excluir.com", "senha123", "12345678900", "67999999999", "01011990");

        // Pegando o id via GET para testar a exclusão

        if (!$id) {
            echo "ID não fornecido para teste de exclusão.";
            return;
        }

        $resultado = $usuario->excluir($id); // Supondo que o método correto se chame excluir()

        $this->isTrue(
            $resultado,
            "Falha ao excluir o usuário com ID $id"
        );
    }
}

// Executando os testes
$UsuarioTest = new UsuarioTest();
$UsuarioTest->cadastroTest();
$UsuarioTest->atualizarSenhaTest();
$UsuarioTest->excluirTest();
