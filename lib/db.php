<?php 

try {
	$db=new PDO("mysql:host=localhost; dbname=sub_category",'root','');
} catch (Exception $e) {
	$e->getmessage();
}

?>