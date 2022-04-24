<?php 

    define('DB_HOST' , "badyklc310erjvtfmxyn-mysql.services.clever-cloud.com") ; 
    define('DB_USER' , "ugtetnjyimvbutuk") ; 
    define('DB_PASS' , "iGk6bEUp6lFKGAdelmGZ") ; 
    define('DB_NAME' , "badyklc310erjvtfmxyn") ; 

    // define('DB_HOST' , "localhost") ; 
    // define('DB_USER' , "admin") ; 
    // define('DB_PASS' , "admin") ; 
    // define('DB_NAME' , "schoolSystem") ; 


    $connection = new mysqli(
        DB_HOST , DB_USER , DB_PASS , DB_NAME
    ) ; 

    if($connection->connect_error){
        die("Connection Error : " . $connection->connect_error) ; 
    }


    


?> 