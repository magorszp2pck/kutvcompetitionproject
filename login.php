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
                   Jelentkezz be!
                </h2>
                <form action="Új mappa/login.inc.php" method="post">
                            <input type="text" name="namecs" placeholder="Email vagy Csapatnev">
                              <input type="password" name="password" placeholder="Jelszo">
                             
                              <br>
                               <button type="submit"
                               name="submit">
                                   Bejelentkezes
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
   else if($_GET["error"]=="wronglogin")
    {
        echo "<p>Helytelen e-mail vagy jelszo!</p>";
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