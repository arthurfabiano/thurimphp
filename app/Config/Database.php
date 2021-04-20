<?php
    return [
        /**
         * Options (mysql, sqlite)
         */
        'driver' => 'sqlite',

        'sqlite' => [
            'database' => 'thurim.db'
        ],

        'mysql' => [
            'host' => '127.0.0.1',
            'database' => 'thurim',
            'user' => 'root',
            'pass' => 'root',
            'charset' => 'utf8',
            'collation' => 'utf8_general_ci'
        ]
    ];