<?php
require_once("../Includes/Variaveis.php");
require_once("../Class/ClassCrud.php");

$Crud = new ClassCrud();

if ($Acao == 'Cadastrar') {
    $Crud->insertDB("cadastro", "?,?,?,?", array($Id, $Nome, $Sexo, $Cidade));
    echo "Cadastro Realizado com Sucesso!";
} else {
    $Crud->updateDB("cadastro", "Nome=?,Sexo=?,Cidade=?", "Id=?", array($Nome, $Sexo, $Cidade, $Id));
    echo "Atualização Realizada com Sucesso!";
}
