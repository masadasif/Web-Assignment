   <?php 
    session_start();
   
   if (isset($_GET['email']) && isset($_GET['password'])) 
	{
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
		 
		   for ($i=0; $i<$xUser->length; $i++) 
		{ 
			$fxEmail = $xUser->item($i)->getElementsByTagName("Email");
			$fxEmail = $fxEmail->item(0)->nodeValue; 
			$fxPassword = $xUser->item($i)->getElementsByTagName("Password");
			$fxPassword = $fxPassword->item(0)->nodeValue; 
			$fxcustomerID = $xUser->item($i)->getElementsByTagName("CustomerID");
			$fxcustomerID = $fxcustomerID->item(0)->nodeValue; 
			 $_SESSION['username'] = $fxcustomerID; 
			 
			if ($email == $fxEmail && $password == $fxPassword)
			{
				echo 1;
			}
			
		}
		
	
 } 
 else {echo 2;} 
	}

     
    
    ?>
