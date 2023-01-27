<?php
// define('HOST', 'localhost');
// define('USER', 'mayaraTeste');
// define('PASSWORD', 12345);
// define('DB', 'SCANDIWEB');

$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
define('HOST', $cleardb_url["host"]);
define('USER', $cleardb_url["user"]);
define('PASSWORD', $cleardb_url["pass"]);
define('DB', substr($cleardb_url["path"],1));