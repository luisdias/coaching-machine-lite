<?php

/* 
TODO: 
tudo ajax?
dbConnection abrir a conexao de facto - colocar a mensagem como global?
executeSQLscript - num try catch com transaction begin roolback commit
testar se o database esta vazio antes 
*/
ini_set('display_errors', 0);
$host = 'localhost';
$database = null;
$username = null;
$password = null;
$msg = null;

if ($_POST) {    
    $install = new Installation();
    if ( (isset($_POST["tcmhost"]) && !is_null($_POST["tcmhost"])) && (isset($_POST["tcmdatabase"]) && !is_null($_POST["tcmdatabase"])) && (isset($_POST["tcmusername"]) && !is_null($_POST["tcmusername"])) ) {
        $host = $_POST["tcmhost"];
        $database = $_POST["tcmdatabase"];
        $username = $_POST["tcmusername"];
        $password = $_POST["tcmpassword"];
        $install->dbConnection($host, $username, $password, $database);
        $msg = $install->message;
    } else {
        echo 'fail';
    }

    if ( (isset($_POST["install"]) && !is_null($_POST["install"])) ) {
        $install->executeSQLscript();
    }
    
    if ( (isset($_POST["verify"]) && !is_null($_POST["verify"])) ) {
        echo 'verify';
    }
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">   
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="-1">  
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    label { width: 100px;}
</style>
<body>
<div class="container">
    <?php 
    if (!is_null($msg)) {   
        echo '<div class="row">';
        echo '<div class="jumbotron">';
        echo '<h3>Message:</h3>';
        echo '<p>'.$msg.'</p>';
        echo '</div>';
        echo '</div>';
    }
    ?>    
    <div class="row">
        <form id="database-form" action="install.php" method="post" autocomplete="off">
            <div class="form-group">
                <label>Host</label>
                <input id="tcmhost" name="tcmhost" type="text" placeholder="host" value="<?php echo $host; ?>" required autocomplete="new-password" autocorrect="off" autocapitalize="off" spellcheck="false" />
            </div>
            <div class="form-group">        
                <label>Database</label>
                <input id="tcmdatabase" name="tcmdatabase" type="text" placeholder="database" value="<?php echo $database; ?>" required autocomplete="new-password" autocorrect="off" autocapitalize="off" spellcheck="false" />
            </div>            
            <div class="form-group">            
                <label>Username</label>
                <input id="tcmusername" name="tcmusername" type="text" placeholder="username" value="<?php echo $username; ?>" required autocomplete="new-password" autocorrect="off" autocapitalize="off" spellcheck="false" />
            </div>        
            <div class="form-group">
                <label>Password</label>
                <input id="tcmpassword" name="tcmpassword" type="password" placeholder="password" value="<?php echo $password; ?>" autocomplete="new-password" autocorrect="off" autocapitalize="off" spellcheck="false" />
            </div>
            <div class="form-group">
                <input id="verify" name="verify" type="submit" value="Verify" class="btn btn-success">
                <input id="install" name="install" type="submit" value="Install" class="btn btn-primary">                
            </div>
        </form>
    </div>
</div> 
</body>
</html>


<?php 

class Installation {
    public $message = null;
    public $connection = null;

    function executeSQLscript() {
            $fileName = "create_database_tcm.sql";
            $statements = file_get_contents($fileName);
            $statements = explode(';', $statements);

            foreach ($statements as $statement) {
                if (trim($statement) != '') {
                    $this->connection->query($statement);
                }
            }        
    }
    
    function dbConnection($host, $username, $password, $database) {
        mysqli_report(MYSQLI_REPORT_STRICT);
        try {
            $conn = new mysqli($host, $username, $password, $database);
        } catch (Exception $e) {
            $this->message = "<span class=\"alert-danger\">Connection failed : </span><br>" . mb_convert_encoding($e->getMessage(),'ISO-8859-1');
            return false;
        }
        $this->message = "<span class=\"alert-success\">Connected successfully</span>";
        $this->connection = $conn;
        return true;
    }
}

?>