<?php

require_once 'Credenziali.php';

$id=checkAuth();
$error=array();
if (!empty($_POST["vecchia"]) && !empty($_POST["nuova"]) && !empty($_POST["conferma"])) {
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
    
    if($_SESSION["tipo"]=="Utente") {
        $query="select utenti.password from utenti where utenti.id='".$_SESSION['accesso']."'";
        $res=mysqli_query($conn,$query);
        $passwordDataBase=mysqli_fetch_assoc($res);
    }
    if($_SESSION["tipo"]=="Direttore") {
        $query="select direttore.password from direttore where direttore.CF='".$_SESSION['accesso']."'";
        $res=mysqli_query($conn,$query);
        $passwordDataBase=mysqli_fetch_assoc($res);
    }
    if(!password_verify($_POST['vecchia'], $passwordDataBase['password'])) {
            $error[] = "Password vecchia errata!!";
            $errore="Password vecchia errata!!";
    }
    if (strlen($_POST["nuova"]) < 8) {
        $error[] = "Caratteri password insufficienti";
        $errore="Password con carratteri insufficienti";
    }
    if (strcmp($_POST["nuova"], $_POST["conferma"]) != 0) {
        $error[] = "Le password non coincidono";
        $errore="Le password non coincidono";
    }
    if (count($error) == 0) {
        $errore="Password Modificata con successo";
        $passwordNuova=password_hash($_POST["nuova"], PASSWORD_BCRYPT);
        $query="UPDATE utenti SET Password ='$passwordNuova'  WHERE ID ='".$_SESSION['accesso']."'";
        $res=mysqli_query($conn,$query);
        echo "<script type='text/javascript'>alert('$errore');</script>";
    }
    else {               
        echo "<script type='text/javascript'>alert('$errore');</script>";
    }
}

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
        <link rel="stylesheet" href="profilo.css">
        <script src="profilo.js" defer></script>
    </head>
    
    <body>
        <header>
            <nav>
                <div id="logo">
                    <img src="Logo360.jpg">
                </div>
                <div class="menu">
                    <a href="home.php">Home</a>
                    <a href="birre_API.php">I nostri prodotti</a>
                    <a href="logout.php">Logout</a>
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