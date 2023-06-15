<?php
include_once 'header.php';
?>

<div id="main-wrapper">
  <div class="5grid-layout">
    <div class="row">
      <div class="12u mobileUI-main-content">
        <div id="content">
          <article class="last">
            <section class="signup-form">
                <h2>
                    Regisztralj!
                </h2>
                <form action="Új mappa/no-sidebar.inc.php" method="post">
                    <input type="text" name="namecs" placeholder="Csapatnev">
                      <input type="text" name="name1" placeholder="Csapattag neve">
                        <input type="text" name="name2" placeholder="Csapattag neve">
                          <input type="text" name="name3" placeholder="Csapattag neve">
                              <input type="text" name="namet" placeholder="Kiserotanar neve">
                              <br>
                            <input type="text" name="email" placeholder="Email">
                             <br>
                              <input type="password" name="password" placeholder="Jelszo">
                               <input type="password" name="passwordrepet" placeholder="Jelszo ismetlese">
                                <br>
                           
                               <select name="select1" size=”3”>
      <option value="10">10.osztaly</option>
      <option value="11">11.osztaly</option>
      <option value="12" selected>12.osztaly</option>
   </select>
   <br>
   <select name="select2" size=”1”>
      <option value=" Bolyai Farkas Elmeleti Liceum">"Bolyai Farkas" Elmeleti Liceum</option>
      <option value="Reformatus Kollegium">Reformatus Kollegium</option>
      <option value="Katolikus kollegium">Katolikus kollegium</option>
      <option value="Colegiul National Alexandru Papiu" selected>Colegiul National "Alexandru Papiu"</option>
   </select>
  <br>
                              <br>
                               <button type="submit"
                               name="submit">
                                   Regisztralas
                               </button>
                    
                </form>
                <a href="forgot.php">Elfelejtett jelszo?</a>
                <?php
if(isset($_GET["error"]))
{
    if($_GET["error"]=="emptyinput")
    {
        echo "<p>Nincs minden mezo kitoltve!</p>";
}
   else if($_GET["error"]=="invalidnev")
    {
        echo "<p>A nevek csak betuket tartalmazhatnak!</p>";
}
  else if($_GET["error"]=="invalidemail")
    {
        echo "<p>Helytelen e-mail!</p>";
}
    else if($_GET["error"]=="passworddontmatch")
    {
        echo "<p>A jelszavak nem egyeznek!</p>";
}
    else if($_GET["error"]=="HIBA1")
    {
        echo "<p>Valami hiba tortent!</p>";
}
    else if($_GET["error"]=="letezocsapatnev")
    {
        echo "<p>Foglalt csapatnev vagy e-mail !</p>";
}
    else if($_GET["error"]=="none")
    {
        echo "<p>Sikeres regisztracio!Gratulalunk!</p>";
             
 
        
}
}
                


                

                ?>
            </section>
          </article>
        </div>
      </div>
    </div>
  </div>
</div>


<?php
include_once 'footer.php';
    
?>