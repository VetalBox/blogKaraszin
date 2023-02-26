<?php
session_start();

include("functions/db_connect.php");
include("functions/functions.php");

$id=clear_string($_GET["id"]);

if ($_POST["submit_save"]){
 
    $error=array();
  

    if(count($error)){
        $_SESSION['message']="<p id='form-error'>".implode('<br />', $error)."</p>";
    }
    else{
        
        //$querynew="name='{$_POST["name"]}', description='{$_POST["description"]}'";
        $nameEdit=json_encode($_POST["name"], JSON_UNESCAPED_UNICODE);
        $descriptionEdit= json_encode($_POST["description"], JSON_UNESCAPED_UNICODE);

        $update="UPDATE `posts` SET `title`='$nameEdit', `description`='$descriptionEdit' WHERE `id`='$id'";
       
      if (mysqli_query($link, $update)) {
					echo "Record updated successfully";
					} else {
						echo "Error updating record: " . mysqli_error($link);

						}

	  $_SESSION['message']="<p id='form-success'>Дані змінено!</p>";   
  
    }
    header("Location: index.php");
}

?>

<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
 	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
				integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet" type="text/css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script type="text/javascript" src="/js/js.js"></script>

    
	<title>Редагування</title>
</head>

<body>

<div id="block-content">

<?php
	
    if(isset($_SESSION['message'])){
	   echo $_SESSION['message'];
       unset($_SESSION['message']);
	}

	$result=mysqli_query($link, "SELECT * FROM `posts` WHERE `id`='$id'");

        if(mysqli_num_rows($result)>0){
            $row=mysqli_fetch_array($result);
                do{
                    echo '

                    <h2 class="h2-title">Редагування</h2>

                    <form id="formUpdate" enctype="multipart/form-data" method="post">
                    

                        <div>
                        <label class="form-label">Назва</label>
                        <input class="form-control" type="text" name="name" value="'.json_decode($row["title"]).'" />
                        </div>

                        <div>
                        <label class="form-label">Пост</label>
                        <textarea class="form-control" type="text" name="description" >'.json_decode($row["description"]).'</textarea>
                        </div>
                     

                         <input type="submit" id="submit_form" name="submit_save" value="Редагувати" />
                        
                   
                         </form>

                    ';

                    }        
                    while ($row=mysqli_fetch_array($result));    
                }

?>

</div>
</body>
</html>