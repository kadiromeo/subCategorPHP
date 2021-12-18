<?php 
require_once 'db.php';
if (isset($_POST['cat_ekle'])) {
	$add=$db->prepare("INSERT INTO category SET 
		title =:title,
		parent_id=:parent_id

		"); 
	$insert = $add->execute(array(
		"title" => $_POST['title'],
		"parent_id" => $_POST['parent_id']

	));

	if ($insert) {
		header("Location:../Index.php");
	} 
	else
	{
		echo "Hata!";
	}
}

?>