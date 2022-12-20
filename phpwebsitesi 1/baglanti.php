<?php   
         $dbhost = 'localhost'; 
         $dbuser = '22430070053'; 
         $dbpass = '212121';    
         $dbname = 'meubmyo22430070053_data';  
         $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname); 
         $conn->Set_charset("utf8"); 
		 if(! $conn ) {              
            die('Could not connect: ' . mysqli_error()); 
         }
       

?>