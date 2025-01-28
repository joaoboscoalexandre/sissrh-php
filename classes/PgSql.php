<?php

    Class PgSql{
        
        private static $pdo;

        public static function conectar(){
            if(self::$pdo == null){
                try {
                    self::$pdo = new PDO("pgsql:host=172.31.131.10; dbname=BDSSRH;", "rh", "rhdonarita");
                    //self::$pdo->setAtttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                } catch (Exception $e) {
                    echo '<h2>Erro ao conectar com o banco de dados</h2>';
                }
            }
            return self::$pdo;
        }
    }


?>