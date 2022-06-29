<?php

    class BD {
        private $DB_NOME = "php";
        private $DB_USUARIO = "localhost";
        private $DB_SENHA = "duda2526";
        private $DB_CHARSET = "utf8";

        public function connection() {
            $str_conn = "mysql:host=localhost;dbname=".$this->DB_NOME;

    		return new PDO($str_conn, $this->DB_USUARIO, $this->DB_SENHA,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES ".$this->DB_CHARSET));
    	}

        public function select() {
            $conn = $this->connection();
    		$stmt = $conn->prepare("SELECT * FROM tb_pessoas LIMIT 3");
            $stmt->execute();

            return $stmt;
        }
    }

    $obj = new BD();
    $pessoas = $obj->select();

    while($row = $pessoas->fetchObject()) {
        echo "<h4>".$row->cpf." - ".$row->nome."</h4>";
    }

?>
