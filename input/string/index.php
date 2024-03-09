<?php session_start(); 
date_default_timezone_set("Asia/Kolkata");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>X-change</title>
<script language="javascript" src="jquery-1.10.2.js"></script>
</head>
<body>
<form action="" method="post">
<table cellpadding="2" cellspacing="0" border="0" width="100%" style=" border:1px solid #005B8F; height:98%">
<?php 
	if (isset($_SESSION['user_is_loggedin']))
	{
		goto logged_in;
	}

	if (0) { //( !isset($_POST['passcode']) || $_POST['passcode'] <> 'tanvi'.date("j")) { ?>
 	<tr>
		<td colspan="3" align="center">Enter Passcode
		<input type="password"  size="40" name="passcode"><input type="submit" value="Go"></td>
	</tr>
	<?php } else { logged_in: $_SESSION['logged_in_exchange'] = true; ?>
	<tr height="500" valign="top">
		<td width="95%"><div style="width:100%; height:100%;">
		<textarea id="phpeditor" name="phpeditor" style="border:0px; width:100%; height:45%"><?php echo isset($_GET['temp']) ? '' : htmlentities(file_get_contents('draft.txt'))?></textarea>
		<div id="phpeditor_result" style="border:1px solid #efefef; width:100%; height:40%"></div>
		<input type="button" style="width:100%; height:5%; font-size:20px;" onclick="clean()" value="C L E A R" />
		<input type="button" style="width:100%; height:10%; font-size:30px;"  onclick="save()" value="S T R I N G" /></div>
		</td> 				
	</tr>
	<?php } ?>
</table>
 </form>
</body>
</html>
<?php if (!isset($_GET['temp'])) { ?>	
<script>
$('#phpeditor').keydown(function(e) {

	if(e.keyCode == 27)
	{
		save()	 
	}
});

function save() {
			$.post("php_format_result.php",{phpscript:$("#phpeditor").val()}, function(txt){					 
				$("#phpeditor_result").html(txt)				
			});
}

function clean() {
			$("#phpeditor").val("").focus()
}

</script>
<?php } ?>