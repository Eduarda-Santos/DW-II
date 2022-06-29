<?php

    $DB_NOME = "php";
    $DB_USUARIO = "localhost";
    $DB_SENHA = "duda2526";
    $DB_CHARSET = "utf8";

    $str_conn = "mysql:host=localhost;dbname=".$DB_NOME;

    $conn = new PDO($str_conn, $DB_USUARIO, $DB_SENHA,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES ".$DB_CHARSET));
        
    $sql = "UPDATE tb_cursos SET nome='João Silva', 
        sigla='Salvador', tempo='881635423' WHERE id=6";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    echo "ALTERADO COM SUCESSO!";
?>
