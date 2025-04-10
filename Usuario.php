<?php

require_once './DB/Database.php';

class Usuario {
    private $nome;
    private $email;
    private $senha;
    private $cpf;
    private $telefone;
    private $data_de_nacimento;

    public function cadastrar($nome, $email, $senha, $cpf, $telefone, $data_de_nacimento) {
        if ($nome != "" && $email != "" && $senha != "" && $cpf != "" && $telefone != "" && $data_de_nacimento != "") {
            // Armazena os dados no objeto (opcional)
            $this->nome = $nome;
            $this->email = $email;
            $this->senha = $senha;
            $this->cpf = $cpf;
            $this->telefone = $telefone;
            $this->data_de_nacimento = $data_de_nacimento;

            // Inserir no banco de dados
            $db = new Database('Usuario'); // nome da sua tabela
            $inserido = $db->insert([
                'nome' => $nome,
                'email' => $email,
                'senha' => $senha,
                'cpf' => $cpf,
                'telefone' => $telefone,
                'data_de_nascimento' => $data_de_nacimento
            ]);

            // Se o insert for bem-sucedido, pegar o último ID inserido
            if ($inserido) {
                return $db->conn->lastInsertId();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function atualizarSenha($novaSenha) {
        if ($novaSenha != "") {
            $this->senha = $novaSenha;
            return true;
        } else {
            return false;
        }
    }

    public function excluir($id) {
        if (!$id) {
            return false;
        }

        $db = new Database('Usuario');
        return $db->delete("id = {$id}");
    }
}
