<?php  
$myfile = fopen("goWorld.go", "w") or die("Unable to open file!");
fwrite($myfile, $_POST['phpscript']);
fclose($myfile);   ?>
 
<?php //file_put_contents("goWorld.go", $_POST['phpscript']); 
#system('go run goWorld.go &> error.txt && echo 1'); 
//set_time_limit(30);

ob_start();
//shell_exec('go build hello.go');

//$output = system("go run goWorld.go 2>&1");//

echo $output = system("/usr/local/go/bin/go run /Library/WebServer/Documents/php_test/editorModule/go/goWorld.go  2>&1");//
//$result = ob_get_contents();
ob_end_clean();

print_r($output);

 
/*
if (isset($output))
{
	echo "<pre>";
	foreach ($output as $k => $v)
	{
		echo $v;
		echo "<br>";
	} 
}

system("gofmt -w goWorld.go");
system("taskkill /im goWorld.exe /f");


*/