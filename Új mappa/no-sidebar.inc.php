<?php

if(isset($_POST['submit']))
{
   $namecs=$_POST['namecs'];
      $name1=$_POST['name1'];
      $name2=$_POST['name2'];
      $name3=$_POST['name3'];
      $namet=$_POST['namet'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $passwordrepet=$_POST['passwordrepet'];
    $osztaly=$_POST['select1'];
    $iskola=$_POST['select2'];
    
     require_once ('PHPMailer/PHPMailerAutoload.php');
$mail= new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth= true;
$mail->SMTPSecure='ssl';
$mail->Host='smtp.gmail.com';
$mail->Port='465';
$mail->isHTML();
$mail->Username='denesmagor24@gmail.com';
$mail->Password='hcszidntrgyauevp';
$mail->setFrom('denesmagor24@gmail.com');
$mail->Subject='SIKERES REGISZTRÁCIÓ';
$mail->Body="A(z) ".$namecs." nevu csapat sikeresen regisztralt az ideni KUTV versenyre!Gratulalunk!";
$mail->AddAddress($email);
$mail->Send();

 
                   

    
    require_once 'dbh.inc.php';
    require_once  'functions.inc.php';
    
    if(emptyInpSignup($namecs,$name1,$name2,$name3,$namet,$email,$password,$passwordrepet)!== false)
    {
          header("location: ../no-sidebar.php?error=emptyinput");
        exit();
        
}
     if(invalidNev($namecs)!== false)
    {
          header("location: ../no-sidebar.php?error=invalidnev");
        exit();
        
}
       if(invalidEmail($email)!== false)
    {
          header("location: ../no-sidebar.php?error=invalidemail");
        exit();
        
}
      if(pwdMatch($password,$passwordrepet)!== false)
    {
          header("location: ../no-sidebar.php?error=passworddontmatch");
        exit();
        
}
      if(nevLet($conn,$namecs,$email)!== false)
    {
          header("location: ../no-sidebar.php?error=letezocsapatnev");
        exit();
        
}
    createCsapat($conn,$namecs,$email,$password,$namet,$osztaly,$iskola,$name1,$name2,$name3);
   



}



else
{
    header("location: ../no-sidebar.php");
    exit();
}