   <?php 
    
   
   if (isset($_GET['i_name']) && isset($_GET['i_price']) && isset($_GET['i_number']) && isset($_GET['desc']) && isset($_GET['qty'])) 
	{
		$i_price = $_GET['i_price'];
        $desc = $_GET['desc'];
        $i_number = $_GET['i_number'];
		$qty = $_GET['qty'];
        $i_name = $_GET['i_name'];
		$sold = 0;
		$hold = 0;
        
       
          $goods = '../../data/goods.xml'; 
	

          if (file_exists($goods)) 
		{
		  $doc = new DomDocument('1.0','utf-8');
		  $doc = DomDocument::load($goods);
          $doc->formatOutput=true;
          $doc->preserveWhiteSpace = false;
      
    $goods = $doc->getElementsByTagName('Goods')->item(0);
         
    $item = $doc->createElement('Item');
    $goods->appendChild($item);
         
$i_name = $doc->createElement('ItemName',$i_name);
$item->appendChild($i_name); 

$i_price = $doc->createElement('ItemPrice',$i_price);
$item->appendChild($i_price); 
         
$qty = $doc->createElement('ItemQuantity',$qty);
$item->appendChild($qty); 
         
$desc = $doc->createElement('ItemDescription',$desc);
$item->appendChild($desc); 

$i_number = $doc->createElement('ItemNumber',$i_number);
$item->appendChild($i_number); 

$hold = $doc->createElement('ItemHold',$hold);
$item->appendChild($hold);

$sold = $doc->createElement('ItemSold',$sold);
$item->appendChild($sold);
	
    $doc->save("../../data/goods.xml") or die("error");
		
		}
	
    else{  
        
   $doc = new DOMDocument('1.0', 'utf-8');
   $doc->formatOutput=true;

       
$goods = $doc->createElement('Goods');
$doc->appendChild($goods); 
        
$item = $doc->createElement('Item');
$goods->appendChild($item);
         
$i_name = $doc->createElement('ItemName',$i_name);
$item->appendChild($i_name); 

$i_price = $doc->createElement('ItemPrice',$i_price);
$item->appendChild($i_price); 
         
$qty = $doc->createElement('ItemQuantity',$qty);
$item->appendChild($qty); 
         
$desc = $doc->createElement('ItemDescription',$desc);
$item->appendChild($desc); 

$i_number = $doc->createElement('ItemNumber',$i_number);
$item->appendChild($i_number); 

$hold = $doc->createElement('ItemHold',$hold);
$item->appendChild($hold); 

$sold = $doc->createElement('ItemSold',$sold);
$item->appendChild($sold);
	
    $doc->save("../../data/goods.xml") or die("error");
     } } 

     
    
    ?>
