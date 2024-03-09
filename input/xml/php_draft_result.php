<?php file_put_contents("draft.txt", stripslashes($_POST['phpscript']));

	function format(&$simpleXmlObject){

		if( ! is_object($simpleXmlObject) ){
			return "";
		}
		$dom = new DOMDocument('1.0');
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($simpleXmlObject->asXML());

		return $dom->saveXML();
	}

	$row_xml = file_get_contents("draft.txt");
	if (strlen($row_xml) == 0)
	{
		$row_xml = "<root>Sample</root>";
	}
	
	$xml = simplexml_load_string($row_xml);
	echo $formatted_xml = format($xml);

?>