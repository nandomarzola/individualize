<?php 
	# Conexão
	try {
        $db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")); 
        } catch(Exception $e) {
        echo "There was a connection error with the database.<br>";
        echo "<strong>Erro:</strong> ".$e->getMessage();
        #echo "<pre>"; print_r($e); echo "</pre>";
    }
?>