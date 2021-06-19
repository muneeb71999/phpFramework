<?php

/**
 * This is the file that every request is routed through
 */

// Require the autoloader
require("../bootstrap.php");

require("../src/connector.php");

$coreclass = new Core;
print_r($coreclass);
