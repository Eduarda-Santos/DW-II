<?php

    class pessoa {

        private $nome;

        function __construct($n) {
            $this->nome = $n;
        }
        public function setNome($n) { $this->nome = $n; }
        public function getNome() { return $this->nome; }
        
    }
?>


