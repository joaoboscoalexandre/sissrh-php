<?php

    $superAdmin = PgSql::conectar()->prepare(" SELECT * FROM sissrh.tbadmin_sistema_pessoa WHERE cod_sistema = 0 AND cod_perfil = 1 AND cpf_usuario = ? ");
    $superAdmin->execute(array($_SESSION['cpf']));
    if($superAdmin->rowCount() == 1){
        $superAdmin = true;
    } else {
        $superAdmin = false;
    }

    $system01 = PgSql::conectar()->prepare(" SELECT * FROM sissrh.tbadmin_sistema_pessoa WHERE cod_sistema = 1 AND cod_perfil = 2 AND cpf_usuario = ? ");
    $system01->execute(array($_SESSION['cpf']));
    if($system01->rowCount() == 1){
        $sistema01 = true;
    } else {
        $sistema01 = false;
    }

    $system02 = PgSql::conectar()->prepare(" SELECT * FROM sissrh.tbadmin_sistema_pessoa WHERE cod_sistema = 2 AND cod_perfil = 2 AND cpf_usuario = ? ");
    $system02->execute(array($_SESSION['cpf']));
    if($system02->rowCount() == 1){
        $sistema02 = true;
    }
    else {
        $sistema02 = false;
    }

    $system03 = PgSql::conectar()->prepare(" SELECT * FROM sissrh.tbadmin_sistema_pessoa WHERE cod_sistema = 3 AND cod_perfil = 2 AND cpf_usuario = ? ");
    $system03->execute(array($_SESSION['cpf']));
    if($system03->rowCount() == 1){
        $sistema03 = true;
    }
    else {
        $sistema03 = false;
    }

    $system04 = PgSql::conectar()->prepare(" SELECT * FROM sissrh.tbadmin_sistema_pessoa WHERE cod_sistema = 4 AND cod_perfil = 2 AND cpf_usuario = ? ");
    $system04->execute(array($_SESSION['cpf']));
    if($system04->rowCount() == 1){
        $sistema04 = true;
    }
    else {
        $sistema04 = false;
    }

    $system05 = PgSql::conectar()->prepare(" SELECT * FROM sissrh.tbadmin_sistema_pessoa WHERE cod_sistema = 5 AND cod_perfil = 2 AND cpf_usuario = ? ");
    $system05->execute(array($_SESSION['cpf']));
    if($system05->rowCount() == 1){
        $sistema05 = true;
    }
    else {
        $sistema05 = false;
    }





?>