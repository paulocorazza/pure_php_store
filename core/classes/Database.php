<?php

namespace core\classes;

use Exception;
use PDO;
use PDOException;

class Database
{

    private $conexao;

    private function conectar()
    {
        $this->conexao = new PDO('mysql:host='. MYSQL_SERVER .';' .'dbname='. MYSQL_DATABASE, MYSQL_USER, MYSQL_PASSWORD); array(PDO::ATTR_PERSISTENT => true);
        $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    private function desconectar()
    {
        $this->conexao = null;
    }

    public function insert($sql, $parametros = null)
    {
        if(!preg_match("/^INSERT/i", $sql)){
            throw new Exception('Base de dados não é uma instrução INSERT');
        }

        $this->conectar();

        try {
         
            if(!empty($parametros)){
                $executar = $this->conexao->prepare($sql);
                $executar->execute($parametros);
            } else {
                $executar = $this->conexao->prepare($sql);
                $executar->execute();
            }
        } catch (PDOException $e) {
            return false;
        }

        $this->desconectar();


    }

    public function select($sql, $parametros = null)
    {
        if(!preg_match("/^SELECT/i", $sql)){
            throw new Exception('Base de dados não é uma instrução SELECT');
        }


        $this->conectar();

        $resultados = null;

        try {
         
            if(!empty($parametros)){
                $executar = $this->conexao->prepare($sql);
                $executar->execute($parametros);
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
            } else {
                $executar = $this->conexao->prepare($sql);
                $executar->execute();
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
            }
        } catch (PDOException $e) {
            return false;
        }


        $this->desconectar();

        return $resultados;
    }

    public function update($sql, $parametros = null)
    {
        if(!preg_match("/^SELECT/i", $sql)){
            throw new Exception('Base de dados não é uma instrução UPDATE');
        }

        $this->conectar();

        try {
         
            if(!empty($parametros)){
                $executar = $this->conexao->prepare($sql);
                $executar->execute($parametros);
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
            } else {
                $executar = $this->conexao->prepare($sql);
                $executar->execute();
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
            }
        } catch (PDOException $e) {
            return false;
        }

        $this->desconectar();

    }

    public function delete($sql, $parametros = null)
    {
        if(!preg_match("/^DELETE/i", $sql)){
            throw new Exception('Base de dados não é uma instrução DELETE');
        }
        $this->conectar();

        try {
         
            if(!empty($parametros)){
                $executar = $this->conexao->prepare($sql);
                $executar->execute($parametros);
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
            } else {
                $executar = $this->conexao->prepare($sql);
                $executar->execute();
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
            }
        } catch (PDOException $e) {
            return false;
        }

        $this->desconectar();


    }

    public function statement($sql, $parametros = null)
    {
        if(preg_match("/^(INSERT|DELETE|UPDATE|SELECT)/i", $sql)){
            throw new Exception('Base de dados  - Instrução inválida');
        }
        $this->conectar();

        try {
         
            if(!empty($parametros)){
                $executar = $this->conexao->prepare($sql);
                $executar->execute($parametros);
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
            } else {
                $executar = $this->conexao->prepare($sql);
                $executar->execute();
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
            }
        } catch (PDOException $e) {
            return false;
        }

        $this->desconectar();


    }

}