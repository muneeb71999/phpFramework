<?php

require_once("vendor/autoload.php");

use Illuminate\Database\Capsule\Manager as Capsule;

// Initializes the New Database model
$capsule = new Capsule;

$capsule->addConnection([
  'driver' => "mysql",
  'host' => "127.0.0.1",
  'password' => '',
  'username' => 'root',
  'database' => 'mgs'
]);

//use Illuminate\Events\Dispatcher;
//use Illuminate\Container\Container;
//$capsule->setEventDispatcher(new Dispatcher(new Container));

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

echo \Illuminate\Support\Facades\DB::getFacadeRoot();
