<?php

/*
 * Contains all the configuration information for the system to function.
 */

// ** MySQL settings ** //
/** The name of the database for KDUMOOC */
if (!defined('DB_NAME')) {
    define('DB_NAME', 'kdumooc');
}

/** MySQL database username */
if (!defined('DB_USER')) {
    define('DB_USER', 'root');
}

/** MySQL database password */
if (!defined('DB_PASSWORD')) {
    define('DB_PASSWORD', '');
}

/** MySQL hostname */
if (!defined('DB_HOST')) {
    define('DB_HOST', 'localhost');
}

/* The path where KDUMOOC is hosted */
if (!defined('DOMAIN_URL')) {
    define('DOMAIN_URL', "http://localhost:1234/kdumooc/");
}
?>
