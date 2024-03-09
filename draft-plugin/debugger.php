<?php //ob_start(); session_start(); ob_start();
define('FILE_PATH', "/opt/homebrew/var/www/draft/edit/draft9.txt");


function dlog($data = '',$hr_flag=0)
{		
	if ($data === 1) {
		dloge();
		die;
	}

	$hr = '';
	if ($hr_flag)
	{		
		$hr = "<hr />";
	}		
	
	if (is_array($data) || is_object($data))
	{
		$data =  (array) $data; 		
	}	
	
	$out = $data;
	if (is_array($data))
	{
		ob_start();
		print_r($data);	 
		$out = ob_get_contents();
		ob_end_clean();
	}
	

	//desc
	file_put_contents(FILE_PATH,"\n-----".date("d M H:i:s")."-----\n".$out.$hr.file_get_contents(FILE_PATH));
}


function dloge()
{
	file_put_contents(FILE_PATH,'');
}

function dlogs()
{
	echo "<pre>";
	echo file_get_contents(FILE_PATH);
	echo "</pre>";
}




function dump($data = '', $print = true, $html = false)
{
    if ( true === $html )
    {
       $data = htmlspecialchars($data);
    }
    echo '<pre style="text-align: left; color: #000; border: 1px solid gray; padding: 20px; margin: 10px; background-color: #f3f3f3;';
    echo ' font-family: monospace; font-size: 11px; line-height: 18px;">';
    $print ? print_r($data) : var_dump($data);
    echo '</pre>';
}


function dump_info($level = 3)
{
	if ($level == 1)
		dump(get_defined_vars());

	if ($level == 2)
		dump(get_defined_constants());

	if ($level == 3)
		dump(get_defined_functions());

	if ($level == 4)
		dump(get_declared_classes());
	
	if ($level == 0)
	{
		echo "Variables";		dump(get_defined_vars());
		echo "Constants";		dump(get_defined_constants());
		echo "Functions";		dump(get_defined_functions());
		echo "Classes";			dump(get_declared_classes());
	}
}
