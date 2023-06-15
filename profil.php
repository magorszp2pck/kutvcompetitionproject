<?php
include_once 'header.php';
?>
<div id="main-wrapper">
  <div class="5grid-layout">
    <div class="row">
      <div class="4u">
        <div id="sidebar">
          <section>
            <h3>FELTÖLTÉS</h3>
            <p>Ide tölthetitek fel az adott forduló megoldását</p>
             <form action="upload.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="file">
                <br>
                 <select name="select1" size=”1”>
      <option value="1">Első forduló</option>
      <option value="2">Második forduló</option>
      <option value="3">Harmadik forduló</option>
     
   </select>
               <br>
                <button type="submit" name="submit" class="button button-icon button-icon-paper" > FELTÖLTÉS</button>
                 
             </form>
              
          </section>
        
        </div>
      </div>
      <div class="8u mobileUI-main-content">
        
          <h3>A csapat információi</h3>
                    <table>
    <tr>
        <th>Csapat neve</th>
        <th>Csapat e-mailje</th>
        <th>Kisérőtanár</th>
        <th>Évfolyam</th>
        <th>Iskola</th>
        <th>Tagok</th>
        
        
    </tr>
            <?php
          
 require_once 'Új mappa/dbh.inc.php';
          $name=$_SESSION["csapatNev"];
                        
$sql = "SELECT csapatNev,csapatEmail,kiserotanar,csapatOsztaly,csapatIskola,elsotag,masodiktag,harmadiktag FROM csapat WHERE csapatNev = '$name' ;";
$result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function
echo "<br>";
echo "<table border='1'>";
  while($row = mysqli_fetch_array($result)) {
                echo "\t<tr><td>".$row['csapatNev']."</td><td>".$row['csapatEmail']."</td><td>".$row['kiserotanar']."</td><td>".$row['csapatOsztaly']."</td><td>".$row['csapatIskola']."</td><td>".$row['elsotag']."</td><td>".$row['masodiktag']."</td><td>".$row['harmadiktag']."</td></tr>\n";
            }
           
echo "</table>";
?>
               <h3>A csapat feltötött megoldásai</h3>
                    <table>
    <tr>
        <th>Első forduló</th>
        <th>Második forduló</th>
        <th>Harmadik forduló</th>
        
        
    </tr>
         
      <?php
          
 require_once 'Új mappa/dbh.inc.php';
         $id=$_SESSION["csapatID"];
$sql = "SELECT elso_fordulo,masodik_fordulo,harmadik_fordulo FROM dolgozatok WHERE csapatID = '$id' ;";
$result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function
echo "<br>";
echo "<table border='1'>";
  while($row = mysqli_fetch_array($result)) {
                echo "\t<tr><td>".$row['elso_fordulo']."</td><td>".$row['masodik_fordulo']."</td><td>".$row['harmadik_fordulo']."</td></tr>\n";
            }
            mysqli_close($conn);
echo "</table>";
?>
                       
  </div>
</div>
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
