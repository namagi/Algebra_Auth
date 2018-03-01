<?php

return [
    'fetch' => PDO::FETCH_OBJ,
    'driver' =>  'mysql',
    'mysql' => [
        'host' => 'localhost',
        'user' => 'root',
        'pass' => '',
        'db_name' => 'algebra_auth',
        'charset' => 'utf8',
    ],
    'sqlite' => [],
    'pgsql' => []
];
