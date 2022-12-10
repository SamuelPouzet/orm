<?php

class ORM
{
    protected static $path;
    protected $connexion;
    protected $repositories = [];

    public function __construct()
    {
        self::$path =  __DIR__;
        require_once self::$path . DIRECTORY_SEPARATOR . 'Connexion.php';
        $this->connexion = (new Connexion(self::$path))->getConnexion();
    }

    public function getRepository($entity)
    {
        if(isset($this->repositories[$entity])){
            return $this->repositories[$entity];
        }

        require_once self::$path . DIRECTORY_SEPARATOR . 'Repository.php';
        $this->repositories[$entity] = new Repository($entity, $this->connexion);

        return $this->repositories[$entity];
    }


}