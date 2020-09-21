<?php

class Manager
{
    // const DB_HOST = 'mysql:host=db5000858114.hostingdata.io;dbname=dbs755580;charset=utf8';
    // const DB_USER = 'dbu700569';
    // const DB_PASS = 'yoannvitryPHP1!';
    const DB_HOST = 'mysql:host=localhost;dbname=projet_4_blog;charset=utf8';
    const DB_USER = 'root';
    const DB_PASS = '';
    private $db;

    private function checkConnection()
    {
        //Vérifie si la connexion est nulle et fait appel à getConnection()
        if($this->db === null) {
           
            return $this->dbConnect();
        }
        //Si la connexion existe, elle est renvoyée, inutile de refaire une connexion
       
        return $this->db;
    }

    protected function dbConnect()
    {
        try{
        $db = new \PDO(self::DB_HOST, self::DB_USER, self::DB_PASS);
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $db;
        }
        catch(Exception $errorConnection)
        {
            die ('Erreur de connection :'.$errorConnection->getMessage());
        }
    }

    protected function createQuery($sql, $parameters = null)
    {
        if($parameters)
        {
        $result = $this->checkConnection()->prepare($sql);
            $result->setFetchMode(PDO::FETCH_CLASS, static::class);
            $result->execute($parameters);
            return $result;
        }
        $result = $this->checkConnection()->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS, static::class);
        return $result;
    }
}

