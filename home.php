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
        
        <link rel="stylesheet" href="home.css">
        <script src="home.js" defer></script>
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
                echo "<a href='profilo.php'>Il tuo profilo</a> ";
                echo "<a href='birre_API.php'>I nostri prodotti</a>";
                echo "<a href='logout.php'>Logout</a> ";
                }
                else{
                    echo "<a href='birre_API.php'>I nostri prodotti</a>";
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

        <div id="main">
            <h1> Le nostre specialità </h1>
            <p> Vieni a provarle! </p>
        </div>
    
        <div>
            <?php
            if($_SESSION['tipo']=="Direttore") {
                echo "        <div class=addPost>
                <h1>Inserisci una nuova pizza</h1>
                <img class='imgplus' src= './img/plus.png'>
                </div>";
            }
            ?>
        </div>

        <section> 
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