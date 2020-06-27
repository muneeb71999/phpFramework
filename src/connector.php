<?php

// Require the config file
require_once('config/config.php');

// Helper function
// require_once("helper/functions.php");

// AutoLoad all the core libraries
// Loads all the files from the libraries folder
spl_autoload_register(function ($className) {
    require_once("libs/$className.php");
});
