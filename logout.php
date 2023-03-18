<?php
    session_start();
    if(isset($_SESSION['Email'] ))
    {
   
            unset($_SESSION['Email']);
            session_destroy();
            header('Location: landingpage.php');
            
        }
    
    

    ?>