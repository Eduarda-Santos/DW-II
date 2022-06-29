<?php
    class bd {

        public static function select($tabela) {
            return array("1" => "Maria",
                    "2" => "Carlos",
                    "3" => "João");
        }
    }

    class modeloPessoa extends bd {

        public static function loadPessoas() {
            return parent::select("tb_pessoa");
        }
    }

    $dados = modeloPessoa::loadPessoas();
    foreach($dados as $cpf => $nome) {
        echo "<h3>".$cpf." - ".$nome."</h3>";
    }
?>


