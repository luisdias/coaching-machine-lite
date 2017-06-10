<?php
    if ( (isset($_POST['host']) && !empty($_POST['host'])) && (isset($_POST['database']) && !empty($_POST['database'])) ) {
        header("HTTP/1.1 200 OK");
    } else {
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
    }
?>