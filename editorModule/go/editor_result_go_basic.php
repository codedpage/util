<?php  
$myfile = fopen("goWorld.go", "w") or die("Unable to open file!");
fwrite($myfile, $_POST['phpscript']);
fclose($myfile);   ?>
 
<?php //file_put_contents("goWorld.go", $_POST['phpscript']); 
//system('go run goWorld.go'); return;

echo "<pre>";

@unlink('goWorld.exe');  
system('go build goWorld.go');

if (file_exists('goWorld.exe'))
	system('goWorld.exe');
else 
	echo ("Compilation error");

?>

