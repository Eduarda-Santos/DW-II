<?php
    class pessoa {

        private $nome;

        function __construct($nome="Vazio") {
            $this->nome = $nome;
        }

        public function getNome() {
            return $this->nome;
        }
    }

    $obj = new pessoa();
    echo "<h3>".$obj->getNome()."</h3>";
    $obj = new pessoa("Maria Eduarda Silva");
    echo "<h3>".$obj->getNome()."</h3>";
?>


