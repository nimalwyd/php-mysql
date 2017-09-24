<?php

require_once('db_credentials.php');
function db_connect(){
$connection=mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
return $CONNECTION;
}

function db_disconnect($connection){

mysqli_close($connection);

}



?>
