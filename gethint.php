<?php
session_start() ;
$q = $_REQUEST["q"];
$n = $_REQUEST["n"];
echo $hint = $q;
array_push($_SESSION['fav'], array($q => $n));
?>