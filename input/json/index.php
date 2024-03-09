<?php session_start();
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

$formatted_json = file_get_contents("draft.txt");
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>JSON</title>
<script language="javascript" src="jquery-1.10.2.js"></script>
</head>
<body>
<form action="" method="post"><pre>
<table cellpadding="2" cellspacing="0" border="0" width="100%" style=" border:1px solid #005B8F; height:98%">
<? 
	if (isset($_SESSION['logged_in_exchange']) || 1)
	{
		goto logged_in;
	}

	$c_time = time() + 0;
	if ( !isset($_POST['passcode']) || $_POST['passcode'] <> 'tanvi'.date("j", $c_time)) { ?>
 	<tr>
		<td colspan="3" align="center">Enter Passcode
		<input type="password"  size="40" name="passcode"><input type="submit" value="Go"></td>
	</tr>
	<? } else { logged_in: $_SESSION['logged_in_exchange'] = true; ?>
	<tr height="500" valign="top">
		<td width="95%"><div style="width:100%; height:100%;"><textarea id="phpeditor" name="phpeditor" style="border:0px; width:100%; height:100%"><?php echo isset($_GET['temp']) ? '' : $formatted_json?></textarea></div></td> 				
	</tr>
	<? } ?>
</table></pre>
</form>
</body>
</html>
<?php if (!isset($_GET['temp'])) : ?>	
<script>
$('#phpeditor').keydown(function(e) {

	if(e.keyCode == 27)
	{
		$.post("php_draft_result.php",{phpscript:$("#phpeditor").val()}, function(txt){
			$("#phpeditor").val(txt);
		});
	}
});

/*
$( document ).ready(function() {
  // Handler for .ready() called.  .siblings().css({"color": "green", "border": "2px solid green"});
 
$("#phpeditor").val().siblings().css({"color": "green", "border": "2px solid green"});
 
$("#phpeditor").val().each(function (index) {
        console.log(index);
    });
	
	});
*/	
</script>
<?php endif; ?>