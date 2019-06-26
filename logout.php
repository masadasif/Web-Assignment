   <?php 
    
   session_start();
     $manager = $_SESSION['username'];
	 //include 'logout.htm';
	 echo $manager;
	 $_SESSION['username'] = false;      
    
    ?>

