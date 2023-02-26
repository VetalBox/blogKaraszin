<?php
include("functions/db_connect.php");
include("functions/functions.php");

session_start();

?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
 	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
				integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->
	<script type="text/javascript" src="/js/js.js"></script>
	<!--<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>-->
	
    <title>Вигрузка постів</title> 

</head>

<body>

<div id="block-content">
     
<?php
   
    $start_price=$_GET["start_price"];
    $end_price=$_GET["end_price"];
    
    if (!empty($end_price)){}
  
      file_put_contents('test.txt', $ip,FILE_APPEND );
 
      $query=mysqli_query($link, "SELECT * FROM `posts`  WHERE `datetime`>=  '$start_price' AND `datetime`< '$end_price'");
     
        $result = "";
        while ($q=mysqli_fetch_array($query)) {
         
        $result .= $q['id']." ".$q['title']." ".$q['description']." ".$q['ip'].PHP_EOL;
        }

        file_put_contents('test.txt', $result); 
        echo file_get_contents('test.txt');
   
?>

</div>

</body>
</html>