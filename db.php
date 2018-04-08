<?php

$db = new SQLite3('my_database') or die('Unable to open database');

if(!$db) {
	echo $db->lastErrorMsg();
	return;
 } 
   $query =<<<EOF
	  CREATE TABLE IF NOT EXISTS users (
		username TEXT PRIMARY KEY,
		password TEXT NOT NULL,
   		salt TEXT NOt NULL)
EOF;

?>