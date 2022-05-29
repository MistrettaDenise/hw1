<?php
require_once 'Credenziali.php';

$id=checkAuth();
?>

<html>
  <head>
    <meta charset="utf-8">
    <title>Pizzeria 360°</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i|Open+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="birre_API.css">
    <script src="birre_API.js" defer></script>
  </head>
  
  <body>
      <header>
        <nav>
          <div id="logo">
            <img src="Logo360.jpg">
          </div>

          <div class="menu">
            <?php 
            if($_SESSION['accesso']>0||$_SESSION['tipo']=="Direttore") {
              echo "<a href='home.php'>Home</a>";
              echo "<a href='profilo.php'>Il tuo profilo</a> ";
              echo "<a href='logout.php'>Logout</a> ";
            }
            else{
              echo "<a href='home.php'>Home</a>";
              echo "<a href='login.php'>Login</a>";
            }
            ?>
          </div>

          <div class="menuApp">
            <div></div>
            <div></div>
            <div></div>
          </div>
        </nav>
        
        <h1>
          <p> Il gusto della tua pizza a 360° </p>
          <strong> Vuoi sapere come nascono le nostre pizze? </strong><br/>
          <a class="button"> Clicca qui </a>
        </h1>
      </header>
      
      <div> 

      </section> 

      <div id="titolo">
        <h1>Le 10 birre che vi consigliamo grazie a PunkAPI</h1> 
      </div>
      <section id='birre'>

      </section>
      
      <footer>
        <div id="footer_info">
          <img id="logo" src="Logo360.jpg"/>
          <div id="social_media">
            <h1> SEGUICI SU </h1>
            <img src="FB.png"/>
            <img src="IG.png"/>
            <img src="TW.png"/>
          </div>
        </div>
        <p> Powered by Mistretta Denise Pia 1000001167 </p>
      </footer>
  </body>
</html>

