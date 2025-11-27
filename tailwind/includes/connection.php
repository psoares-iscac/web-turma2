<?php 
$user = 'web2';
$pass = 'web2';
try {
    $dbh = new PDO('mysql:host=localhost;dbname=web2', $user, $pass);
} catch (PDOException $e) {
    // attempt to retry the connection after some timeout for example
    #echo 'erro';
}
?>