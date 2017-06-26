<?php
ini_set('display_errors', 0);
ini_set('display_startup_erros', 0);
// include file config
require 'config/database.php';

session_start();
if (!empty($_SESSION["lang"]) && !is_null($_SESSION["lang"])) {
    $lang=$_SESSION["lang"];
} else {
    $_SESSION['lang'] = 'pt-br';
    $lang = 'pt-br';
}
switch ($lang)
{
    case 'pt-br': // Português Brasileiro
        include('/Language/pt-br.php');
        break;
        case 'en': // English
        include('/Language/en.php');
        break;    
        case 'es': // Español - Beta
        include('/Language/es.php');
        break; 
    case 'it': // Italiano - Beta
        include('/Language/it.php');
        break;
    case 'ru': // Русский - Beta
        include('/Language/ru.php');
        break;
    default:                
        include('/Language/pt-br.php');            
        break;
}

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
    //die('Installation sucessfully');
    $html = new DOMDocument();
    $html->loadHTMLFile("Pages/SuccessEnd.xml");
    print $html->saveHTML();
}
