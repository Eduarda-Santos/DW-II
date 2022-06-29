<?php
    class pessoa {

        public $nome;

        function __construct($nome="VAZIO") {
            $this->nome = $nome;
        }
    }

    $obj = new pessoa();
    echo "<h3>".$obj->nome."</h3>";

    $obj = new pessoa("MARIA");
    echo "<h3>".$obj->nome."</h3>";
?>


