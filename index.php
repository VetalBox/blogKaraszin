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
	
    <title>Регистрация</title> 

</head>

<body>

<div id="block-content">

	<h2 class="h2-title">Блог</h2>

	<form id="ajax_form" method="post" >

				  <div>
					<label for="name" class="form-label">Заголовок:</label>
					<input type="text" class="form-control" name="name"></input>
				  </div>
				  <div>
					<label for="description" class="form-label">Пост:</label>
					<textarea type="text" class="form-control" name="description"></textarea>
				  </div>
				
		  <div>
		  
			<input type="button" id="btn" class="btn btn-primary" value="Опублікувати" />
		  </div>
	</form>

	<div id="result_form"></div> 


	<h3>Таблиця постів</h3>
		<div class="tableUser">
			<table>							
<?php

				//---Calculation quantity page---------
				$num=3;
	
				$count=mysqli_query($link, "SELECT COUNT(*) FROM `posts`");
				$temp=mysqli_fetch_array($count);

				if ($temp[0]>0){
					$tempcount=$temp[0];
					//Находим общее число страниц
					$total=(($tempcount-1)/$num)+1;
					$total=intval($total);
					
					if(isset($_GET['page']))
						$page=(int)$_GET['page'];
					//$page=intval($page);
					
					if(empty($page) or $page<0) $page=1;
					if($page>$total) $page=$total;
					
					$start=$page*$num-$num;
					
					$qury_start_num="LIMIT $start, $num";
					
				}
				//----End calculation quantity page-------------- 
		
				echo $qury_start_num;
				$result=mysqli_query($link, "SELECT * FROM `posts` $qury_start_num");
					if (mysqli_num_rows($result) > 0){
						$row=mysqli_fetch_array($result);

						do{                
							echo '
							
								<tr class="colUser">
									<td><a>'.$row["id"].'</a></td>
									<td><a>'.json_decode($row["title"]).'</a></td>	
									<td><a>'.json_decode($row["description"]).'</a></td>	
								
									<td><a>'.$row["datetime"].'</a></td>

									<td><button class="btn btn-primary btn-buy" id="'.$row["id"].'">Видалення</button></td>

									<td><a class="btn btn-primary" href="edit_users.php?id='.$row["id"].'">Редагування</a></td>

								</tr>
								
							';
						}
						while($row=mysqli_fetch_array($result));
					}
					

	//нижняя навигация по страницам
    if($page!=1){$pstr_prev='<li><a class="pstr-prev" href="index.php?page='.($page-1).'">&lt;</a></li>';}
    if($page!=$total) $pstr_next='<li><a class="pstr-next" href="index.php?page='.($page+1).'">&gt;</a></li>';
    
    if($page-5>0) $page5left='<li><a href="index.php?page='.($page-5).'">'.($page-5).'</a></li>';
    if($page-4>0) $page4left='<li><a href="index.php?page='.($page-4).'">'.($page-4).'</a></li>';
    if($page-3>0) $page3left='<li><a href="index.php?page='.($page-3).'">'.($page-3).'</a></li>';
    if($page-2>0) $page2left='<li><a href="index.php?page='.($page-2).'">'.($page-2).'</a></li>';
    if($page-1>0) $page1left='<li><a href="index.php?page='.($page-1).'">'.($page-1).'</a></li>';
    
    if($page+5<=$total) $page5right='<li><a href="index.php?page='.($page+5).'">'.($page+5).'</a></li>';
    if($page+4<=$total) $page4right='<li><a href="index.php?page='.($page+4).'">'.($page+4).'</a></li>';
    if($page+3<=$total) $page3right='<li><a href="index.php?page='.($page+3).'">'.($page+3).'</a></li>';
    if($page+2<=$total) $page2right='<li><a href="index.php?page='.($page+2).'">'.($page+2).'</a></li>';
    if($page+1<=$total) $page1right='<li><a href="index.php?page='.($page+1).'">'.($page+1).'</a></li>';
    
    
    if($page+5<$total){
        $strtotal='<li><p class="nav-point">...</p></li><li><a href="index.php?page='.$total.'">'.$total.'</a></li>';
    }
    else{
        $strtotal="";
    }
    
    if($total>=1){
        echo '
        <div class="pstrnav">
        <ul>
        ';
		if(!isset($pstr_prev))
			$pstr_prev = '';
		if(!isset($page5left))
			$page5left = '';
		if(!isset($page4left))
			$page4left = '';
		if(!isset($page3left))
			$page3left = '';
		if(!isset($page2left))
			$page2left = '';
		if(!isset($page1left))
			$page1left = '';
		if(!isset($page1right))
			$page1right = '';
		if(!isset($page2right))
			$page2right = '';
		if(!isset($page3right))
			$page3right = '';
		if(!isset($page4right))
			$page4right = '';
		if(!isset($page5right))
			$page5right = '';
		if(!isset($pstr_next))
			$pstr_next = '';
		
        
        echo $pstr_prev.$page5left.$page4left.$page3left.$page2left.$page1left."<li><a class='pstr-active' href='index.php?page=".$page."'>".$page."</a></li>".$page1right.$page2right.$page3right.$page4right.$page5right.$strtotal.$pstr_next;
       echo '
        </ul>
        </div>
		</br>
        ';
    }
    //--------------------------------------------
?>						
			
		</table>

		<br>	

		</div>

		<div id="block-parameter">

			<p class="header-title">Вигрузка по даті</p>

				<form method="GET" action="gruz.php">

					<div>
						<ul>
							<li><input type="text" id="start-price" name="start_price" value="2023-01-01"/></li>
							
							<li><input type="text" id="end-price" name="end_price" value="2023-12-31"/></li>
						</ul>
					</div>

					<input type="submit" name="submit" class="btn btn-primary" value="Пошук"/>

				</form>

		</div>

</div>
</body>


</html>