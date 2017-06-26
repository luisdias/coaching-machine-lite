<?php
ini_set('display_errors', 0);
ini_set('display_startup_erros', 0);
// include file config
require 'config/database.php';
require 'setup-config-html.php';

$html = new SetupConfigHTML();

// sql file to execute
$sql_execute = 'Run.sql';

$db = new DATABASE_CONFIG();
$db_host = $db->default['host'];
$db_user = $db->default['login'];
$db_pass = $db->default['password'];
$db_name = $db->default['database'];

// create a new database connection
$mysqli      = new mysqli($db_host, $db_user, $db_pass, $db_name);
$mysqli->set_charset('utf8');

// Check if any error occurred
if (mysqli_connect_errno()){
    die('An error occurred while connecting to the database');
}

$query = file_get_contents($sql_execute);

/* execute multi query */
@mysqli_multi_query($mysqli, $query);

do {
    if ($result = mysqli_store_result($mysqli)) {
        mysqli_free_result($result);
            header('location: ../index.php');
        }
    } while (mysqli_next_result($mysqli));

if (mysqli_error($mysqli)) {
    header('location: setup-config.php');
} else {
    $html->EndSuccess();
}
