<?php header('Content-Type: text/html; charset=utf-8');
include("./edit/config.php");

if (!isset($_GET['q']))
{
	header("Location: dir.php"); 
	exit();
}	

extract($_GET);
$data = file_get_contents($ROOT."draft$q.txt");
echo "<pre>";
echo $data;

 
 