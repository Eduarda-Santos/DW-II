<?php

    include_once '../global.php';

    class RouteController {

        public static function index() {
            echo "<script>window.location='views/main.php'</script>";
        }

        public static function rotas() {

            $dados = explode("/", $_POST['acao']);
    
            if(strcmp($dados[0], "pessoas") == 0) {
                PessoaController::index();
            }
        }
    }
?>