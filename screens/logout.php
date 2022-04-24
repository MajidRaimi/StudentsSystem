<?php 

    session_start();

    setcookie("name" , "" , 86400 * 10) ;

    header("Location:index.php") ; 
    session_destroy() ; 

?>