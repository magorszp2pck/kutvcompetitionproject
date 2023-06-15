<?php
if(isset($_POST["submit"]))
{
    $email=$_POST["email"
    ];
    
    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
     if(emptykod($email)!== false)
    {
          header("location: ../login.php?error=emptyinput");
        exit();
        
}
    
    loginkod($conn,$email);
}
else
{
    header("location: ../login.php");
    exit();
}