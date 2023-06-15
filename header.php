<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Verti</title>
<meta charset="utf-8">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,800" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Oleo+Script:400" rel="stylesheet" type="text/css">
<script src="css/5grid/jquery.js"></script>
<script src="css/5grid/init.js?use=mobile,desktop,1000px&amp;mobileUI=1&amp;mobileUI.theme=none&amp;mobileUI_titleBarOverlaid=1&amp;mobileUI_titleBarHeight=60&amp;viewport_is1000px=1060&amp;mobileUI_openerWidth=80"></script>
<noscript>
<link rel="stylesheet" href="css/5grid/core.css">
<link rel="stylesheet" href="css/5grid/core-desktop.css">
<link rel="stylesheet" href="css/5grid/core-1200px.css">
<link rel="stylesheet" href="css/5grid/core-noscript.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/style-desktop.css">
</noscript>
<!--[if lte IE 8]>
<link rel="stylesheet" href="css/ie8.css">
<![endif]-->
<!--[if lte IE 7]>
<link rel="stylesheet" href="css/ie7.css">
<![endif]-->
</head>
<body class="homepage">
<div id="header-wrapper">
  <div class="5grid-layout">
    <div class="row">
      <div class="12u">
        <header id="header">
          <div id="logo">
            <h1><a href="#" class="mobileUI-site-name">KÜTV</a></h1><br><br>
            <span>XIV. KÖZÉPISKOLÁSOK ÜZLETI TANÁCSADÓ VERSENYE</span> </div>
              <nav id="nav" class="mobileUI-site-nav">
            <ul>
            <?php
            if(isset($_SESSION["csapatID"] ))
            {  
                if($_SESSION["csapatNev"]=="admin")
                {
                    
                echo " 
    <li><a href='adminhome.php'>Adminoldal</a></li>
                     <li><a href='Új mappa/logout.inc.php'>Kijelentkezes</a></li>";


}
                else
                {
                echo " <li ><a href='index.php'>Kezdőoldal
              </a></li>
              <li><a href='left-sidebar.php'>Informaciok</a></li>
              <li><a href='right-sidebar.php'>Versenyszabályzat</a></li>
             
<li><a href='profil.php'>Csapatprofil</a></li>
            
    <li><a href='Új mappa/logout.inc.php'>Kijelentkezes</a></li>";
                }
}
            else
            {
echo "<li ><a href='index.php'>Kezdőoldal
              </a></li>
              <li><a href='left-sidebar.php'>Informaciok</a></li>
              <li><a href='right-sidebar.php'>Versenyszabályzat</a></li>
                <li><a href='login.php'>Bejelentkezes</a></li>
                
              <li><a href='no-sidebar.php'>Regisztralas</a></li>
";
}
          
                
                ?>
        
       
            
                
                
            
             
            </ul>
          </nav>
        </header>
      </div>
    </div>
  </div>
</div>
