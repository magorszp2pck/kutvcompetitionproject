<?php
$serverName="localhost";
$dbUserName="root";
$dbPassword="";
$dbName="kutvproject";


$conn=mysqli_connect($serverName,$dbUserName,$dbPassword,$dbName);
    
    if(!$conn)
    {
        die("Nem sikerult csatlakozni".mysqli_connect_error());
}