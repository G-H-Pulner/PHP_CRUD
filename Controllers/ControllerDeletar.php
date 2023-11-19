<?php
require_once("../Class/ClassCrud.php");

$Crud = new ClassCrud();
$IdUser = filter_input(INPUT_GET, 'Id', FILTER_SANITIZE_SPECIAL_CHARS);

$Crud->deleteDB("cadastro", "Id=?", array($IdUser));

echo "Dado deletado com sucesso!";
