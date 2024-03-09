<?php  
$myfile = fopen("goWorld.go", "w") or die("Unable to open file!");
fwrite($myfile, $_POST['phpscript']);
fclose($myfile);   ?>
 
<?php //file_put_contents("goWorld.go", $_POST['phpscript']); 
//system('/usr/local/go/bin/go run /Library/WebServer/Documents/php_test/editorModule/go/goWorld.go');  

system('source ~/.bash_profile');
system("/usr/local/go/bin/go run /Library/WebServer/Documents/php_test/editorModule/go/goWorld.go 2>&1",$output) ;

echo $output;
/*
echo "<pre>";

@unlink('goWorld.exe');  
system('go build goWorld.go');

if (file_exists('goWorld.exe'))
	system('goWorld.exe');
else 
	echo ("Compilation error");

	*/

?>

