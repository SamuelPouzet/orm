<?php

class Connexion
{
    /**
     * @var string $path
     * devra être passé en statique dans une autre classe
     */
    protected $path;

    /**
     * @var array $config
     */
    protected $config;

    /**
     * @var PDO $connexion
     */
    protected $connexion;

    /**
     * @var array $configuration
     */
    public function __construct($path)
    {
        $this->path = $path;
        $this->setConfig();
    }

    protected function setConfig()
    {
        $configPath = $this->path . sprintf('%1$s..%1$sConfig%1$sconfig.ini', DIRECTORY_SEPARATOR);
        $this->config=parse_ini_file( $configPath, true )['database'];
        $this->setConnexion();
    }

    protected function setConnexion()
    {

        $this->connexion = new PDO(
            sprintf('mysql:host=%1$s;dbname=%2$s;charset=%3$s',
                $this->config['host'],
                $this->config['dbname'],
                $this->config['charset']
            ),
            $this->config['user'],
            $this->config['password']
        );
    }

    public function getConnexion()
    {
        return $this->connexion;
    }
}