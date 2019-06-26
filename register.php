   <?php 
    
   
   if (isset($_GET['f_name']) && isset($_GET['l_name']) && isset($_GET['p_number']) && isset($_GET['email']) && isset($_GET['password'])) 
	{
		$f_name = $_GET['f_name'];
        $l_name = $_GET['l_name'];
        $p_number = $_GET['p_number'];
		$password = $_GET['password'];
        $email = $_GET['email'];
        
       
          $userData = '../../data/customer.xml';
          if (file_exists($userData)) 
	{
		  $doc = new DomDocument('1.0');
		  $doc = DomDocument::load($userData);
          $doc->formatOutput=true;
          $doc->preserveWhiteSpace = false;
		  $xUser = $doc->getElementsByTagName("User");
		  $exists = false;
		 
		   for ($i=0; $i<$xUser->length; $i++) 
		{ 
			$fxEmail = $xUser->item($i)->getElementsByTagName("Email");
			$fxEmail = $fxEmail->item(0)->nodeValue;
			 
			if ($email == $fxEmail)
			{
				echo 1;
				$exists = true;
			}
		} 
	

          if ($exists == false) 
		{
		
    $customer_id = mt_rand(100000, 999999);    
    $userinfo = $doc->getElementsByTagName('UserInfo')->item(0);
         
    $user = $doc->createElement('User');
    $userinfo->appendChild($user);
         
$f_name = $doc->createElement('FirstName',$f_name);
$user->appendChild($f_name); 

$l_name = $doc->createElement('LastName',$l_name);
$user->appendChild($l_name); 
         
$p_number = $doc->createElement('PhoneNumber',$p_number);
$user->appendChild($p_number); 
         
$password = $doc->createElement('Password',$password);
$user->appendChild($password); 

$email = $doc->createElement('Email',$email);
    $user->appendChild($email); 
	
$customer_id_xml = $doc->createElement('CustomerID',$customer_id);
$user->appendChild($customer_id_xml);
    $doc->save("../../data/customer.xml") or die("error");
		
		}
	}
    else{  
        
   $doc = new DOMDocument('1.0');
   $doc->formatOutput=true;



$customer_id = mt_rand(100000, 999999);        
$userinfo = $doc->createElement('UserInfo');
$doc->appendChild($userinfo); 
        
$user = $doc->createElement('User');
$userinfo->appendChild($user);
         
$f_name = $doc->createElement('FirstName',$f_name);
$user->appendChild($f_name); 

$l_name = $doc->createElement('LastName',$l_name);
$user->appendChild($l_name); 
         
$p_number = $doc->createElement('PhoneNumber',$p_number);
$user->appendChild($p_number); 
         
$password = $doc->createElement('Password',$password);
$user->appendChild($password); 

$email = $doc->createElement('Email',$email);
    $user->appendChild($email); 
	
$customer_id_xml = $doc->createElement('CustomerID',$customer_id);
$user->appendChild($customer_id_xml); 
	
$strXml = $doc->saveXML();
//echo $strXml;
//echo "<xmp>".$doc->saveXML()."</xmp>";
$doc->save("../../data/customer.xml") or die("error");
     } } 


/*
 $xmlFile = "customer.xml";
 $HTML = "";
 $count = 0;
 $dom = DOMDocument::load($xmlFile);
 $user = $dom->getElementsByTagName("User"); 
 $userinfo = array();

 foreach($user as $node)
{  
  
	 $fname = $node->getElementsByTagName("FirstName");
	 $fname = $fname->item(0)->nodeValue;
	 
	 $lname = $node->getElementsByTagName("LastName");
	 $lname = $lname->item(0)->nodeValue;
	 
	 $pnumber = $node->getElementsByTagName("phoneNumber");
	 $pnumber = $pnumber->item(0)->nodeValue;
     
 }
   



    $HTML = $HTML."<br><span>First Name: ".$fname."</span><br><span>Last Name: ".$lname."</span><br>"."<span>Phone Number: ".$pnumber."</span><br>";
    $count++; 


if($count == 0){ $HTML ="<br><span>No Users Available</span>";
               }
echo $HTML; */
     
    
    ?>
