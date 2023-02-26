
<?php

include("functions/db_connect.php");

$id = $_POST['id_tov'];//получаем id товара
	
      mysqli_query($link, "DELETE FROM `posts` WHERE `id`='$id' AND `ip` ='{$_SERVER['REMOTE_ADDR']}'");

?>

