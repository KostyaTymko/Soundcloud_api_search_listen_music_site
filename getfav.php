<?php
session_start() ;
$p = $_REQUEST["p"];

echo $fav = $p;
		
	foreach($_SESSION['fav'] as $id=>$quantity)
	{
		foreach($quantity as $key => $value)
		{
			if($key==$p)
			{
            unset($_SESSION['fav'][$id]);
       		}
		}
	}
?>