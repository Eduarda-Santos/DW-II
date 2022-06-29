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

        public function update($dados, $cpf) {
        
            $sql = "UPDATE tb_pessoas SET ";

            $flag = 0;
            foreach($dados as $campo => $valor) {
                if($flag == 0) { $sql .= "$campo=:$campo"; }
                else { $sql .= ", $campo=:$campo"; }
                $flag = 1;
            }

            $sql .= " WHERE cpf=$cpf";

            $conn = $this->connection();
    		$stmt = $conn->prepare($sql);

            foreach($dados as $campo => &$valor) {
                $stmt->bindParam($campo, $valor);
            }

            $stmt->execute();
            return $stmt;
        }
    }

    $dados = array("nome" => "João Silva",
            "endereco" => "Salvador",
            "tempo" => 871635423);

    $obj = new BD();
    $ret = $obj->update($dados, 7);

    echo "ALTERADO COM SUCESSO!";

?>
