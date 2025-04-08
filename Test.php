<?php

abstract class Test{

    #método usado para verificar se um retorno é verdadeiro
    public function isTrue($valor, $mensagem = ""){
        #se o valor a ser testado for difernte de True
        if($valor != true){
            #cria uma excessao para indicar um erro
            throw new Exception("Falhou no teste. O valor esperado era true; {$mensagem}");
        }else{
            #se for True ele passa
            echo "Passou no teste: é True";
        }
    }
    #metodo para verificar se um método é uma string
    public function isString($valor){
        #se o valor a ser testado for diferente de uma string
        if(!is_string($valor)){
            #cria uma excessao para indicar um erro
            throw new Exception("Falhou no teste. O valor esperado era String");
        }else{
            #se não ele passa
            echo "Passou no teste: é uma string";
        }
    }
}

// class TesteTrue extends Test{

// }
// $objetoTeste = new TesteTrue();

// $objetoTeste->isTrue(true);
