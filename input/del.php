<?php
error_reporting(0);
$file = "";
foreach ($_GET as $k=>$v)
{
	$file = str_replace("_",".",$k);
	if (file_exists($file))
	{	  

	}
	else 
	{
		$file = $_GET['q'];
	}
}

if (!unlink($file))
{
	echo ("Can not be removed: $file");
} else {
	echo ("Removed: $file");
}	  

echo "<a href='index.php'>Back</a>";