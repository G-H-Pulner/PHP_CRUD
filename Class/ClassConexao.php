<?php

abstract class ClassConexao
{
    #Realizará a conexão com o banco de dados
    protected function conectaDB()
    {
        try {
            $Con = new PDO("mysql:host=localhost;dbname=crud_php", "root", "root");
            return $Con;
        } catch (PDOException $Erro) {
            return $Erro->getMessage();
        }
    }
}
