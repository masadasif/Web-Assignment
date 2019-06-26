<?php 

$xmlfile = '../../data/goods.xml';
	if (!file_exists($xmlfile)){ 
	echo "The xml file does not exist.";
} else {
	$doc = new DomDocument(); 
	$doc->load($xmlfile); 
	echo ($doc->saveXML());
	}

          $userData = '../../data/goods.xml';
          if (file_exists($userData))
	{ 
		  $doc = new DOMDocument('1.0','utf-8');
		  $doc->load($userData);
		  $doc->formatOutput=true;
          $doc->preserveWhiteSpace = false;
		  $xItem = $doc->getElementsByTagName("Item");
		 
		   for ($i=0; $i<$xItem->length; $i++) 
		{ 
			$fxqty = $doc->getElementsByTagName("Item")->item($i);
			$fxhold = $fxqty->getElementsByTagName("ItemHold")->item(0);
			$fxsold = $fxqty->getElementsByTagName("ItemSold")->item(0);
			$total = $fxqty->getElementsByTagName("ItemQuantity")->item(0);
			
			$datavalue = $total->nodeValue-$fxsold->nodeValue; 
			$fxqty->replaceChild($total,$total);
			$fxqty->replaceChild($fxhold,$fxhold);
		    $fxqty->replaceChild($fxsold,$fxsold);
		    
			$total->nodeValue=$datavalue;
		    $fxhold->nodeValue=0;
		    $fxsold->nodeValue=0;
		}}

		
	if(isset($_POST['process'])){	
	$doc->save("../../data/goods.xml");
	header("location: processing.htm");
	}  

?>