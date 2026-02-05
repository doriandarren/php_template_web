<?php

namespace Core;

use PDO;
use Core\Response;


class Database
{
    public $connection;
    public $statement;


    public function __construct($config, $username = 'root', $password = '123456')
    {

        // connect to database
        //$dns = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};charset={$config['charset']}";
        $dns = 'mysql:' . http_build_query($config, '', ';');

        $this->connection = new PDO($dns, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = [])
    { // Inicio del ambito de la funciónn query

        $this->statement = $this->connection->prepare($query);

        $this->statement->execute($params);

        return $this;

    } // Fin del ambito de la funciónn query


    /**
     * Encuentra todos los registros de la DB
     */
    public function get()
    {
        return $this->statement->fetchAll();    
    }


    /**
     * Encuentra un solo registro en la DB
     */
    public function find()
    {
        return $this->statement->fetch();
    }
    
    /**
     * Encuentra un solo registro en la DB y manda un error si no lo encuentra
     */
    public function findOrFail()
    {
        $result = $this->find();
        
        if (!$result) {
            abort(Response::NOT_FOUND);
        }

        return $result;
    }

}
