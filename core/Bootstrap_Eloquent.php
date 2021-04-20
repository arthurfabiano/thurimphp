<?php

    use Illuminate\Database\Capsule\Manager as Capsule;

    $config = require_once __DIR__ . "/../app/Config/Database.php"; 
    $capsule = new Capsule;

    if ($config['driver'] == 'mysql') {
        $capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => $config['mysql']['host'],
            'database'  => $config['mysql']['database'],
            'username'  => $config['mysql']['user'],
            'password'  => $config['mysql']['pass'],
            'charset'   => $config['mysql']['charset'],
            'collation' => $config['mysql']['collation'],
            'prefix'    => '',
        ]);
    } else if ($config['driver'] == 'sqlite') {
        $capsule->addConnection([
            'driver'    => 'sqlite',
            'database'  => __DIR__ . "/../storage/database/" . $config['sqlite']['database']
        ]);
    }
    $capsule->setAsGlobal();
    $capsule->bootEloquent();
