<?php
function emptyInpSignup($namecs,$name1,$name2,$name3,$namet,$email,$password,$passwordrepet)
{
    $result;
    if(empty($namecs) || empty($name1) || empty($name2)|| empty($name3)
      || empty($namet)
      || empty($email)
      || empty($password)
      || empty($passwordrepet))
    {
        $result = true;
}
    else
    {
        $result= false;
}
    return $result;
    
}
function invalidNev($namecs)
{
    $result;
    if(!preg_match("/^[a-zA-z]*$/",$namecs))
    {
        $result=true;
}
    else
    {
        $result=false;
}
    return $result;
}
function invalidEmail($email)
{
    $result;
    if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        $result=true;
}
    else
    {
        $result=false;
}
    return $result;
}
function pwdMatch($password,$passwordrepet)
{
    $result;
    if($password !== $passwordrepet)
    {
        $result=true;
}
    else
    {
        $result=false;
}
    return $result;
}

function nevLet($conn,$namecs,$email)
{
    $sql="SELECT * FROM csapat WHERE csapatNev= ? OR csapatEmail= ?;";
    $stmt= mysqli_stmt_init($conn);
    if(!(mysqli_stmt_prepare($stmt,$sql)))
    {
        header("location: ../no-sidebar.php?error=HIBA1");
        exit();
        
}
    mysqli_stmt_bind_param($stmt,"ss",$namecs,$email);
    mysqli_stmt_execute($stmt);
    
    $resultData=mysqli_stmt_get_result($stmt);
    if($row=mysqli_fetch_assoc($resultData))
    {
       return $row; 
}
    else
    {
$result=false;
    return $result;}
    mysqli_stmt_close($stmt);
}
function createCsapat($conn,$namecs,$email,$password,$namet,$osztaly,$iskola,$name1,$name2,$name3)
{
    $sql="INSERT INTO csapat (csapatNev,csapatEmail,csapatJelszo,kiseroTanar,csapatOsztaly,csapatIskola,elsotag,masodiktag,harmadiktag) VALUES (?,?,?,?,?,?,?,?,?);";
    $stmt= mysqli_stmt_init($conn);
   if(!(mysqli_stmt_prepare($stmt,$sql)))
    {
        header("location: ../no-sidebar.php?error=HIBA2");
        exit();
        
}
    $hashedPWD=password_hash($password,PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt,"sssssssss",$namecs,$email,$password,$namet,$osztaly,$iskola,$name1,$name2,$name3);
    mysqli_stmt_execute($stmt);
    
 
    mysqli_stmt_close($stmt);
    header("location: ../no-sidebar.php?error=none");
        exit();
    
}

function insertFile($conn,$filename,$fordulo,$csapatID)
{
    if($fordulo == 1)
    {
 $sql="UPDATE dolgozatok
 SET csapatID= ?,elso_fordulo= ?
 WHERE csapatID=$csapatID OR csapatID=0
 ;";
         $stmt= mysqli_stmt_init($conn);
   if(!(mysqli_stmt_prepare($stmt,$sql)))
    {
        header("location: ../profil.php?error=HIBA2");
        exit();
        
}
    mysqli_stmt_bind_param($stmt,"ss",$csapatID,$filename);
    mysqli_stmt_execute($stmt);
    
 
    mysqli_stmt_close($stmt);
 
        exit();

}
    if($fordulo == 2)
    {
 $sql="UPDATE dolgozatok
 SET csapatID= ?,masodik_fordulo= ?
 WHERE csapatID=$csapatID OR csapatID=0
 ;";
         $stmt= mysqli_stmt_init($conn);
   if(!(mysqli_stmt_prepare($stmt,$sql)))
    {
        header("location: ../profil.php?error=HIBA2");
        exit();
        
}
    mysqli_stmt_bind_param($stmt,"ss",$csapatID,$filename);
    mysqli_stmt_execute($stmt);
    
 
    mysqli_stmt_close($stmt);
 
        exit();
}
    if($fordulo == 3)
    {
 $sql="UPDATE dolgozatok
 SET csapatID= ?,harmadik_fordulo= ?
 WHERE csapatID=$csapatID OR csapatID=0
 ;";
         $stmt= mysqli_stmt_init($conn);
   if(!(mysqli_stmt_prepare($stmt,$sql)))
    {
        header("location: ../profil.php?error=HIBA2");
        exit();
        
}
    mysqli_stmt_bind_param($stmt,"ss",$csapatID,$filename);
    mysqli_stmt_execute($stmt);
    
 
    mysqli_stmt_close($stmt);
 
        exit();
}
   
   
    
}

function emptyInpLogin($namecs,$password)
{
    $result;
    if( empty($namecs)
      || empty($password)
    )
    {
        $result = true;
}
    else
    {
        $result= false;
}
    return $result;
    
}
function emptykod($email)
{
    $result;
    if( empty($email)
      
    )
    {
        $result = true;
}
    else
    {
        $result= false;
}
    return $result;
    
}
function loginUser($conn,$namecs,$password)
{
    
    $namex=nevLet($conn,$namecs,$namecs);
   
    if($namex=== false)
    {
        header("location: ../login.php?error=wronglogin1");
        exit();
}
    
        $passwordHashed= $namex["csapatJelszo"];
   //$checkpwd=password_verify($password,$passwordHashed);
  
    if($password != $passwordHashed)
    {
      header("location: ../login.php?error=wronglogin2");
        exit();  
}
    else if($namex["csapatNev"]=="admin")
    {
         session_start();
        $_SESSION["csapatID"]=$namex["csapatID"];
         $_SESSION["csapatNev"]=$namex["csapatNev"];
            header("location: ../index.php");
        exit();
       
       
}
    else
    {
 session_start();
        $_SESSION["csapatID"]=$namex["csapatID"];
         $_SESSION["csapatNev"]=$namex["csapatNev"];
            header("location: ../index.php");
        exit(); 
}
}
function loginkod($conn,$email)
{
    
    $namex=nevLet($conn,$email,$email);
   
    if($namex=== false)
    {
       
}
    else
    {
        $passwordHashed= $namex["csapatJelszo"];
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
$mail->Subject='Elfelejtett jelszo';
$mail->Body="Az On csapatanak a KUTV oldalahoz tarsitott jelszava a kovetkezo:".$passwordHashed;
$mail->AddAddress($email);
$mail->Send();
        
        
 header("location: ../login.php?Jelszavarol e-mailben ertesitettuk!");
        
        exit();
        
    }
        
   

   
}

    
