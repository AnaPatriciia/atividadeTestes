<?php


class Pessoa{

    public int $id;
    public string $nome;
    public string $email;
    public string $senha;
    public string $cpf;
    public string $telefone;
    public string $data_de_nascimento;
    public function cadastrar(){
        $db = new Database('Usuario');
        $result =  $db->insert(
                            [
                            'nome' => $this->nome,
                            'email' => $this->email,
                            'senha' =>$this->senha,
                            'cpf' =>$this->cpf,
                            'telefone'=>$this->telefone,
                            'data_de_nascimento'=>$this->data_de_nascimento
                            ]
                        );
        
        if($result) {
            return true;
        }
        else{
            return false;
        }
    }

    public function atualizar(){
            return (new Database('Usuario'))->update('id ='.$this->id,[
                'nome' => $this->nome,
                'email' => $this->email,
                'senha' =>$this->senha,
                'cpf' =>$this->cpf,
                'telefone'=>$this->telefone,
                'data_de_nascimento'=>$this->data_de_nascimento
            ]);
    }

    public static function buscar(){
        //FETCHALL
        return (new Database('Usuario'))->select()->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function buscar_by_id($id){
        //FETCHALL
        return (new Database('Usuario'))->select('id = '. $id)->fetchObject(self::class);
    }

    public function excluir($id){
        return (new Database('Usuario'))->delete('id = '.$id);
    }

}



// $data = new Database('Usuario');

// echo __DIR__ . '/teste';
// echo '<br>';

// print_r($data);
