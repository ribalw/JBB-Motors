
<?php

    //Start session management
    session_start();
    if( isset($_SESSION['loggedInUserEmail']))
    {
    
    //Remove all session variables
    session_unset(); 

    //Destroy the session 
    session_destroy(); 

    //Echo result to user
    echo 'Thanks For Visiting JBBMotors :)';
    }
    else
    {
    echo 'You Are Even Not Logged In :(';
    }
?>
