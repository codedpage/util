<?php file_put_contents("draft.txt", stripslashes($_POST['phpscript']));
$data = file_get_contents("draft.txt");

//$data = '{"billerid":"AIRT00000NAT87","authenticators":[{"parameter_name":"Customer Id","value":"3011126026"}],"currency":"356","payment_amount":"","customer":{"firstname":"ABC","lastname":"XYZ","mobile":"8879119732","mobile_alt":"9859585525","email":"abc@billdesk.com","email_alt":"abc2@billdesk.com","pan":"BZABC1234L","aadhaar":"123123123123"},"metadata":{"agent":{"agentid":"BD01BD02MOB000000001"},"device":{"app":"nanopay","imei":"990000862471854","init_channel":"Mobile","ip":"14.98.238.188","mac":"11-AC-58-21-1B-AA","os":"android"}},"risk":[{"score_provider":"BD01","score_type":"030","score_value":"TXNRISK"},{"score_provider":"BBPS","score_type":"030","score_value":"TXNRISK"}]}';
$data = json_decode($data);
$data = json_encode($data, JSON_PRETTY_PRINT);

//file_put_contents("draft.txt", $data);
 

echo  $data;
 
?>