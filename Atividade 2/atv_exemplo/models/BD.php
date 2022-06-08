<?php

    include_once '../global.php';

    class BD {

        public function connection() {

            $str_conn = "mysql:host=localhost;dbname=php".config::DB_NOME;

    		return new PDO($str_conn, config::DB_USUARIO, config::DB_SENHA,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES ".config::DB_CHARSET));
    	}

        public static function select($tb_pessoas, $orderby="") {

            $conn = self::connection();
    		$stmt = $conn->prepare("SELECT * FROM $tb_pessoas $orderby" );
            $stmt->execute();

            return $stmt;
        }

        public static function selectFind($tb_pessoas, $condicao) {

            $sql = "SELECT * FROM $tb_pessoas WHERE $condicao";

            $conn = self::connection();
    		$stmt = $conn->prepare($sql);
    		$stmt->execute();

            return $stmt->fetchObject();
        }
        
        public static function insert($tb_pessoas, $dados) {

            $sql = "INSERT INTO $tb_pessoas(";

            $flag = 0;
            foreach($dados as $campo => $valor) {
                if($flag == 0) { $sql .= $campo; }
                else { $sql .= ", $campo"; }
                $flag = 1;
            }

            $sql .= ") VALUES(";

            $flag = 0;
            foreach($dados as $campo => $valor) {
                if($flag == 0) { $sql .= ":$campo"; }
                else { $sql .= ", :$campo"; }
                $flag = 1;
            }

            $sql .= ")";

            $conn = self::connection();
    		$stmt = $conn->prepare($sql);

            foreach($dados as $campo => &$valor) {
                $stmt->bindParam($campo, $valor);
            }

            $stmt->execute();

            return $stmt;
        }
    
        public static function edit($tb_pessoas, $dados, $condicao) {

            $sql = "UPDATE $tb_pessoas SET ";

            $flag = 0;
            foreach($dados as $campo => $valor) {
                if($flag == 0) { $sql .= "$campo=:$campo"; }
                else { $sql .= ", $campo=:$campo"; }
                $flag = 1;
            }

            $sql .= " WHERE $condicao";

            $conn = self::connection();
    		$stmt = $conn->prepare($sql);

            foreach($dados as $campo => &$valor) {
                $stmt->bindParam($campo, $valor);
            }

            $stmt->execute();

            return $stmt;
        }

        public static function delete($tb_pessoas, $condicao) {

            $conn = self::connection();
    		$stmt = $conn->prepare("DELETE FROM $tb_pessoas WHERE $condicao" );
            $stmt->execute();

            return $stmt;
        }
    }
