<?php
require_once("{$_SERVER['DOCUMENT_ROOT']}/PHP_CRUD/Class/ClassConexao.php");

class ClassCrud extends ClassConexao
{
    #Atributos
    private $Crud;
    private $Contador;

    #Metodos

    #Preparação das declarativas
    private function preparedStatements($Query, $Parametros)
    {
        $this->countParametros($Parametros);
        $this->Crud = $this->conectaDB()->prepare($Query);

        if ($this->Contador > 0) {
            for ($i = 1; $i <= $this->Contador; $i++) {
                $this->Crud->bindValue($i, $Parametros[$i - 1]);
            }
        }

        $this->Crud->execute();
    }

    #Contador de parâmetros
    private function countParametros($Parametros)
    {
        $this->Contador = count($Parametros);
    }

    #Inserção no Banco de Dados
    public function insertDB($Tabela, $Condicao, $Parametros)
    {
        $this->preparedStatements("insert into {$Tabela} values ({$Condicao})", $Parametros);
        return $this->Crud;
    }

    #Seleção no Banco de Dados
    public function selectDB($Campos, $Tabela, $Condicao, $Parametros)
    {
        $this->preparedStatements("select {$Campos} from {$Tabela} {$Condicao}", $Parametros);
        return $this->Crud;
    }

    #Deletar dados no Banco de Dados
    public function deleteDB($Tabela, $Condicao, $Parametros)
    {
        $this->preparedStatements("delete from {$Tabela} where {$Condicao}", $Parametros);
        return $this->Crud;
    }

    #Atualização no Banco de Dados
    public function updateDB($Tabela, $Set, $Condicao, $Parametros)
    {
        $this->preparedStatements("update {$Tabela} set {$Set} where {$Condicao}", $Parametros);
        return $this->Crud;
    }
}
