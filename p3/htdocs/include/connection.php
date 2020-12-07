<?php

function connect($host = 'localhost', $user = 'test', $password = 'test', $dbname = 'moskvine_test')
{
    static $connection;

    if ($connection === null) {
        $connection = mysqli_connect($host, $user, $password, $dbname) or die('connection Error');
    }
    
    return $connection;
}
