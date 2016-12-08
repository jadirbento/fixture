<?php
/**
 * Created by PhpStorm.
 * User: Jadir Bento
 * Date: 08/12/2016
 * Time: 17:16
 */

function conexaoDB(){

    try{
        $config = include 'config.php';

        if(!isset($config['db'])){
            throw new \InvalidArgumentException("Configura��o de banco de dados n�o existe.");
        }

        $host = (isset($config['db']['host'])) ? $config['db']['host'] : null;
        $dbname = (isset($config['db']['dbname'])) ? $config['db']['dbname'] : null;
        $user = (isset($config['db']['user'])) ? $config['db']['user'] : null;
        $password = (isset($config['db']['password'])) ? $config['db']['password'] : null;

        return new \PDO("mysql:host={$host};dbname={$dbname}", $user, $password);
    }
    catch (\PDOException $e){

        echo $e->getMessage().'\n';
        echo $e->getTraceAsString(). '\n';

    }
}