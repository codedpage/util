<?php
/**
 * Change the path to your folder.
 *
 * This must be the full path from the root of your
 * web space. If you're not sure what it is, ask your host.
 *
 * Name this file index.php and place in the directory.
 */
	// Define the full path to your folder from root
	
	$path = "."; //home/user/public/foldername/";
	
	//Open the folder
	
	$dir_handle = @opendir($path) or die("Unable to open $path");
	
	//file & folders
	$files 		= array();
	$folders 	= array();


    // Loop through the files
    while ($file = readdir($dir_handle)) 
	{
		if (in_array($file, array(".", "..","index.php", ".htaccess")))
		{ 
			//nothing
		}else {
			if (is_file($file))
			$files[] = $file;
			else
			$folders[] = $file;

			//echo "<a href=\"$file\">$file</a><br />";
		}
    }
	
	foreach($files as $f) 
	{
		//$re_arrange[filemtime($f)] = $f;
		$re_arrange[] = $f;
	}

	sort($re_arrange);
	sort($folders);

	foreach($folders as $f) 
	{
		echo "<a href=\"$f\">[".$f."]<br/>";	
	}
	
	if (count($folders) > 0)
	{
		//echo "<br>";
	}

	foreach($re_arrange as $f) 
	{
		$ext = pathinfo($f, PATHINFO_EXTENSION);
		
		if ($ext == "md")
			echo "<a href=\"md.php?f=$f\">".$f."<br/>";
		else 
			echo "<a href=\"$f\">".$f."<br/>";		 
	}

    closedir($dir_handle);

?> 

<style>
.img { border: 1px solid #dfdfdf; padding:5px; margin:2px; background-color:#fff}
a { text-decoration: none }
</style>
