<?php 

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'kokeru';

// Connect to database
$db = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($db->connect_errno) {
  die('Could not connect to the database: <br>' . $db->connect_error);
}