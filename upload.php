<?php
require_once 'header.php';
require_once'Új mappa/dbh.inc.php';
require_once 'Új mappa/functions.inc.php';
if(isset($_POST['submit']))
{
$file =$_FILES['file'];
    
    $fileName=$_FILES['file']['name'];
     $fileTmpName=$_FILES['file']['tmp_name'];
     $fileSize=$_FILES['file']['size'];
     $fileError=$_FILES['file']['error'];
     $fileType=$_FILES['file']['type'];
    
     $fordulo=$_POST['select1'];
    
    $fileExt= explode('.',$fileName);
    $fileActualExt=strtolower(end($fileExt));
    $allowed=array('pdf');
    if(in_array($fileActualExt,$allowed))
    {
        if($fileError === 0)
        {
if($fileSize < 250000)
{

    $fileNameNew=$_SESSION["csapatNev"]."_".$fordulo."._fordulo.".$fileActualExt;
    $fileDestination ='dolgozatok/'.$fileNameNew;
    move_uploaded_file($fileTmpName,$fileDestination);
  
  
    insertFile($conn,$fileNameNew,$fordulo,$_SESSION["csapatID"]);
    
    header("Location: profil.php?sikeresfeltoltes");
}
            else
            {
  header("Location: profil.php?tulnagyfile");
}
}
        else
        {
  header("Location: profil.php?hiba");
}
}
    else
    {
  header("Location: profil.php?nempdfformatum");
}
}
?>