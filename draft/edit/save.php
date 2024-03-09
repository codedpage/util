<?php header('Content-Type: text/html; charset=utf-8');
if (isset($_POST['q']))
{
	extract($_POST);
	$file = "draft$q.txt";
	$handle = fopen($file, "w") or die("Unable to open file!");
	chmod($file, 0755);
	file_put_contents($file , stripslashes($_POST['phpscript']));
	echo "saved";
} else {
	file_put_contents("draft.txt", stripslashes($_POST['phpscript']));	
	echo "saved";
}