<?php

class DB
{
    private static $instance = null;
    private $config;
    private $connection;
    private $query, $error = false;
    private $results;
    private $count = 0;

    private function __construct()
    {
        $this->config = Config::get('database');
        $driver = $this->config['driver'];
        $host = $this->config[$driver]['host'];
        $user = $this->config[$driver]['user'];
        $pass = $this->config[$driver]['pass'];
        $db_name = $this->config[$driver]['db_name'];
        $dsn = $driver . ':host=' . $host . ';db_name=' . $db_name;

        try {
            $this->connection = new PDO($dsn, $user, $pass);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // instance
    public static function getInstance()
    {
        if (!self::$instance)
        {
            self::$instance = new DB(); // new self()

        }

        return self::$instance;
    }

    // create db query
    public function query($sql, $params = array())
    {
    }

    // getters
    public function getConnection()
    {
        return $this->connection;
    }

    public function getError()
    {
        return $this->error;
    }

    public function getResults()
    {
        return $this->results;
    }

    public function getCount()
    {
        return $this->count;
    }
}
