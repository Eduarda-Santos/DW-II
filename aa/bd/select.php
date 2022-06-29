<?php

    $DB_NOME = "php";
    $DB_USUARIO = "localhost";
    $DB_SENHA = "duda2526";
    $DB_CHARSET = "utf8";

    $str_conn = "mysql:host=localhost;dbname=".$DB_NOME;

    $conn = new PDO($str_conn, $DB_USUARIO, $DB_SENHA,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES ".$DB_CHARSET));
        
    $stmt = $conn->prepare("SELECT * FROM tb_pessoas  LIMIT 3");
    $stmt->execute();

    while($row = $stmt->fetchObject()) {
        echo "<h4>".$row->cpf." - ".$row->nome."</h4>";
    }

?>
