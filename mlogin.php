   <?php 
    
   session_start();
   if (isset($_GET['username']) && isset($_GET['password'])) 
	{
		$password = $_GET['password'];
        $username = $_GET['username'];

       
         
$file = 'manager.txt';  

// Lets open it up:  
if (!$login = file($file))  
{  
    echo 'Unable to open file...';  
    exit; 
} 
foreach ($login AS $members) 
{ 
     // For this, we are creating an array for each user, with their username as the index 
    list($user, $pass) = split(' ', trim($members)); 
    $members_array[$user] = array('password' => $pass); 
}  
if (array_key_exists($username, $members_array)) 
{ 
    if ($members_array[$username]['password'] == $password) 
    { 
        $_SESSION['username'] = $username; 
        include 'listing.htm'; 
    } 
    else 
    { 
        echo 1;
		 $_SESSION['username'] = false; 
    } 
} 
else 
{ 
    echo 2; 
	 $_SESSION['username'] = false; 
}
	 
	 }

     
    
    ?>
