
<?php
if(isset($_POST["submit"]))
{
    $namecs=$_POST["namecs"
    ];
    $password=$_POST["password"];
    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
     if(emptyInpLogin($namecs,$password)!== false)
    {
          header("location: ../login.php?error=emptyinput");
        exit();
        
}
    
    loginUser($conn,$namecs,$password);
}
else
{
    header("location: ../login.php");
    exit();
}