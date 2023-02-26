<?php

var_dump($_POST);

include("functions/db_connect.php");
include("functions/functions.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $error=array();
           
        $name=clear_string($_POST['name']);
		$description=clear_string($_POST['description']);
     


      if(strlen($name)<3 or strlen($name)>600) $error[]="Вкажіть назву!";
	if(strlen($description)<3 or strlen($description)>6000) $error[]="Вкажіть пост";
 
        if (count($error)){
            echo implode('<br />',$error);
			}
			else{
            
            $ip=$_SERVER['REMOTE_ADDR'];
           
            mysqli_query($link, "INSERT INTO `posts`(`title`, `description`, `datetime`, `ip`)
                            VALUES(
                            '".json_encode($name, JSON_UNESCAPED_UNICODE)."',
							'".json_encode($description, JSON_UNESCAPED_UNICODE)."',
							
          
                            NOW(),
                            '".$ip."'
                                                 
                            )");            
}
}  
	
















?>