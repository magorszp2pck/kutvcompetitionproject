<?php
include_once 'header.php';
?>

           <form action="Új mappa/forgot.inc.php" method="post">
                           <h2>Jelszo visszallitas</h2>
                           <p>A jelszavarol emailben tajekoztatjuk!</p>
                           <br>
                            <input type="text" name="email" placeholder="Email ">
                             
                              <br>
                               <button type="submit"
                               name="submit">
                                   E-mail kuldese
                               </button>
                    
                </form>
<?php
include_once 'footer.php';
    
?>