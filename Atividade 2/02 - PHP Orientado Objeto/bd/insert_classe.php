<?php

    class BD {

        $DB_NOME = "dwii";
        $DB_USUARIO = "localhost";
        $DB_SENHA = "duda2526";
        $DB_CHARSET = "utf8";

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

        public function insert($dados) {

            $sql = "INSERT INTO tb_pessoas(nome, endereco, telefone) VALUES(";

            $flag = 0;
            foreach($dados as $campo => $valor) {
                if($flag == 0) {
                    $sql .= "'$valor'";
                    $flag = 1;
                }
                else { $sql .= ", '$valor'"; }
            }
            $sql .= ")";

            $conn = $this->connection();
    		$stmt = $conn->prepare($sql);
            $stmt->execute();

            return $conn->lastInsertCPF();
        }
    }

    $pessoa = array("nome" => "João Silva",
            "endereco" => "Salvador",
            "tempo" => 871635423);

    $obj = new BD();
    $CPF = $obj->insert($pessoa);

    if($CPF != 0) {
        echo "INSERIDO COM SUCESSO (". $CPF .")!";
    }

?>
