<?php session_start();?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Online PHP Editor</title>
<script language="javascript" src="jquery.js"></script>
</head>
<body>
<form action="" method="post">
<table cellpadding="0" cellspacing="0" border="0" width="100%" style=" border:1px solid #005B8F; height:98.5%">
<? 
	if (isset($_SESSION['logged_in_editor']) || 1 )
	{
		goto logged_in;
	}

	$c_time = time() + 0;
	if ( !isset($_POST['passcode']) || $_POST['passcode'] <> 'editor') { ?>
 	<tr>
		<td colspan="3" align="center">Enter Passcode
		<input type="password"  size="40" name="passcode"><input type="submit" value="Go"></td>
	</tr>
	<? } else { logged_in: $_SESSION['logged_in_editor'] = true; ?>
 	<tr bgcolor="#005B8F" style="color:#FFFFFF; height:30px;">
		<th>
			<input type="radio" id="ep" name="etype" value="php" checked="checked" /><label for="ep">PHP</label> &nbsp;&nbsp;&nbsp;
			<input type="radio" id="eh" name="etype" value="html" /><label for="eh">HTML</label>&nbsp;&nbsp;&nbsp;	
			<input style="float:right;" type="button" id="reset" value="Reset" />
		</th>
		<th>
			<div style="float:left;">
				<input type="button" id="execute" value="Result" />
			</div>			
			<div style="float:right; color:#333; !important; font-weight:bold" title="rs~ag-cd-ni-cu-ng-al-pb-zn">
			</div>
		</th>			
	</tr>
	<tr height="500" valign="top">
		<td width="50%"><div style="width:100%; height:100%;">
		
<?php
if ( 0 <> filesize('draft.txt') )
{
	echo '<textarea id="phpeditor" name="phpeditor" style="border:0px; width:100%; height:99%">'.file_get_contents('draft.txt').'</textarea>';
} else { 
?>
		<textarea id="phpeditor" name="phpeditor" style="border:0px; width:100%; height:99%">$a = array(1,2,3,4);

echo "<pre>";
print_r($a);
echo "</pre>";</textarea>
<?php } ?>
</div>
</td> 		
		<td width="50%" style="width:100%; height:100%; border-left:1px solid #005B8F"><div id="phpeditor_result"></div></td>
	</tr>
	<? } ?>
</table>
</form>
</body>
</html>

<script>
$(document).ready(function () {
	$('#execute').click(function() {
		var etype =  $("[name=etype]:checked").val();
		 
		if (etype == "php")
		{
			$.post("php_editor_result.php",{phpscript:$("#phpeditor").val()}, function(txt){
				$("#phpeditor_result").html(txt);
			});
		}
		else
		{
			$("#phpeditor_result").html($("#phpeditor").val());
		} 
	});   
	
	$('#phpeditor').keydown(function(e) {
	
		if(e.keyCode == 27)
		$('#execute').click();
	});	
	
	$("#reset").live("click", function(){
		$.post("reset.php", function(txt){
				$("#phpeditor").html(txt);
		});
	});  	
}); 
</script>


<?php /*?>http://api.ipinfodb.com/v2/ip_query.php?key=c2198f8881f5ffef78f6a2038ad4aee80f0f3e795e634fcb42edfdc489ee9f79&ip=112.110.54.32&timezone=false<?php */?>