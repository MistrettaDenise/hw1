<?php

require_once 'Credenziali.php';

if (!empty($_POST["username"]) && !empty($_POST["password"]) ) {
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $query = "SELECT id, username, password FROM utenti WHERE username = '$username'";
    $res2 = mysqli_query($conn, $query);
    if (mysqli_num_rows($res2) > 0) {
        $entry = mysqli_fetch_assoc($res2);
        if (password_verify($_POST['password'], $entry['password'])) {
            $_SESSION["accesso"] = $entry['id'];
            $_SESSION["tipo"]="Utente";
            header("Location: home.php");
            mysqli_free_result($res);
            mysqli_close($conn);
            exit;
        }
    }
    else{
        $errore1 = "username e/o password errati.";
    }
    
    $query = "SELECT CF, username, password FROM direttore WHERE username = '$username'";
    $res2 = mysqli_query($conn, $query);
    if (mysqli_num_rows($res2) > 0) {
        $entry = mysqli_fetch_assoc($res2);
        if (password_verify($_POST['password'], $entry['password'])) {
            $_SESSION["accesso"] = $entry['CF'];
            $_SESSION["tipo"]="Direttore";
            header("Location: home.php");
            mysqli_free_result($res);
            mysqli_close($conn);
            exit;
        }
    }
    else {
        $errore1 = "username e/o password errati.";
    }
}

else if (isset($_POST["username"]) || isset($_POST["password"])) {
        $errore1 = "Inserisci username e password.";
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
        <link rel="stylesheet" href="login.css">


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
            <div id="Contorno">
                <div id="Login">
                    <p>LOGIN</p>
                    <h1>Inserisci i tuoi dati</h1>
                </div>
                
                <form name='login' method="post">
                    <div id=flex_column>

                        <div id=flex_row>
                            <p>Username</p>
                            <input name='username' type="text">
                        </div>
                        
                        <div id=flex_row>
                            <p>Password</p>
                            <input name='password' type="password">
                        </div>
                    </div>

                    <div id='colore'>
                        <div id="buttonDiv">
                            <button type="submit">Accedi</button>
                        </div>

                         <?php
                         if(isset($errore1))echo $errore1;?>
                    </div>
                </form>
                <div class="signup"><a href="sing up.php">Non sei registrato? Registrati!</a>
            </div> </div>
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