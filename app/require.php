<?php

/* Require once all files from the libraries folder */
require_once 'libraries/Core.php';
require_once 'libraries/Controller.php';
require_once 'libraries/Database.php';

/* Require once all files from the configurations folder */
require_once 'configurations/config.php';

/** Require google autoload */
require_once 'vendor/autoload.php';

/* Instantiate the core class to object */
$init = new Core();
