<?php

require_once("vendor/autoload.php");

use Illuminate\Database\Capsule\Manager as Capsule;

// Load the environment variables
(new josegonzalez\Dotenv\Loader(__DIR__ . '/.env'))->parse()->toEnv();

// Initializes the New Database model
$capsule = new Capsule;

$capsule->addConnection([
  'driver' => env('DRIVER'),
  'host' => env('HOST'),
  'password' => env('PASSWORD'),
  'username' => env('USERNAME'),
  'database' => env('DATABASE')
]);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();
