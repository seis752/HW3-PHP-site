<?php

// REF: http://kjventura.com/2011/11/kickass-php-database-class-for-simple-web-apps/
// REF: http://php.net/manual/en/mysqlinfo.api.choosing.php

class Database
{
    // TODO: Move to a configuration file.
    protected $host = 'localhost';
    protected $database = 'seismcdo8429';
    protected $user = 'root';
    protected $password = '';

    protected $mysqli;
    protected $result;
//    public $record;
//    public $records;
//    protected $row;

    public function connect()
    {
        // TODO: Replace with a better error handling strategy.

        if (null == $this->mysqli)
        {
            $this->mysqli = new mysqli($this->host, $this->user, $this->password, $this->database);
        }

        // REF: http://php.net/manual/en/mysqli.quickstart.connections.php
        if ($this->mysqli->connect_errno) {
            throw new Exception(sprintf("Failed to connect to MySQL: (%d %s)",
                $this->mysqli->connect_errno, $this->mysqli->connect_error));
        }
    }

    function query($query)
    {
        $this->connect();
        $this->result = $this->mysqli->query($query);
        return $this->result;
    }
}
