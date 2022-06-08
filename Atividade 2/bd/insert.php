<?php

    $DB_NOME = "php";
    $DB_USUARIO = "localhost";
    $DB_SENHA = "duda2526";
    $DB_CHARSET = "utf8";

    $str_conn = "mysql:host=localhost;dbname=".$DB_NOME;

    $conn = new PDO($str_conn, $DB_USUARIO, $DB_SENHA,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES ".$DB_CHARSET));
        

    $sql = "INSERT INTO tb_pessoas(nome, endereco, telefone) 
        VALUES('João Silva', 'Salvador', '871635423')";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    echo "INSERIDO COM SUCESSO!";
?>
