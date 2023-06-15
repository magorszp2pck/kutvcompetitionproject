<?php
include_once 'header.php';
?>
<h2 align="center" >Csapatinformációk</h2>
  
 

<?php
 require_once 'Új mappa/dbh.inc.php';
$sql = "SELECT csapatNev,csapatEmail,kiserotanar,csapatOsztaly,csapatIskola,elsotag,masodiktag,harmadiktag FROM csapat WHERE csapatNev != 'admin' ;";
$result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function
echo "<br>";
echo "<table border='1'>";
while ($row = mysqli_fetch_assoc($result)) { // Important line !!!
    echo "<tr>";
    foreach ($row as $field => $value) { // If you want you can right this line like this: foreach($row as $value) {
        echo "<td>" . $value . "</td>"; 
    }
    echo "</tr>";
}
echo "</table>";
?>
<?php
include_once 'footer.php';
    
?>
<style>
    table {
       
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
     text-align:center;
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}</stye>