<?php

require_once 'Credenziali.php';

if (!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["nome"]) && !empty($_POST["cognome"]) && !empty($_POST["conferma-password"]) && !empty($_POST["data"])) {
    $error=array();
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
    
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $query = 'SELECT username from utenti where username = "'.$username.'"';
    $res = mysqli_query($conn, $query);
    $query2 = 'SELECT username from direttore where username = "'.$username.'"';
    $res2=mysqli_query($conn, $query2);
    if (mysqli_num_rows($res) > 0 || mysqli_num_rows($res2) > 0) {
        $error[] = "Username già utilizzato";
    }

    if(strlen($username)>15) {
        $error[] = "Username troppo lungo";
    }

    if (strlen($_POST["password"]) < 8) {
        $error[] = "Caratteri password insufficienti";
    }
            
    if (strcmp($_POST["password"], $_POST["conferma-password"]) != 0) {
        $error[] = "Le password non coincidono";
    }

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error[] = "Email non valida";
    } 
    else{
        $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
        $res = mysqli_query($conn, 'SELECT email FROM utenti WHERE email ="'.$email.'"');
        $res2 = mysqli_query($conn, 'SELECT email FROM direttore WHERE email ="'.$email.'"');
        if (mysqli_num_rows($res) > 0 || mysqli_num_rows($res2) > 0) {
            $error[] = "Email già utilizzata";
        }
    }

    if (count($error) == 0) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $name = mysqli_real_escape_string($conn, $_POST['nome']);
        $surname = mysqli_real_escape_string($conn, $_POST['cognome']);
        $data=mysqli_real_escape_string($conn,$_POST['data']);    
        $email=mysqli_real_escape_string($conn,$_POST['email']); 
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $password = password_hash($password, PASSWORD_BCRYPT);

        $query = "INSERT INTO utenti(ID,Nome,Cognome,DataNascita,Username,Password,Email) VALUES('','$name', '$surname', '$data', '$username', '$password', '$email')";
        mysqli_query($conn, $query);                
        header("Location: login.php");
        exit;
    }
    else{
        $errore1= "Errore nella compilazione dei campi!"; 
    }
    
    mysqli_close($conn);
}

else if(isset($_POST["username"])) {
    $errore1= "Compila tutti i campi!"; 
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
        <script src="login.js" defer></script>
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
        
        <section id="Sezione">

        </div>
        <div id="Contorno">
            <div id="Login">
                <p>REGISTRATI</p>
                <h1>Inserisci i tuoi dati</h1>
            </div>
            
            <form name='singup' method="post" >
                <div id=flex_column>
                    <div id='nome'>
                    <div id=flex_row>
                        <p>Nome</p>
                        <input name="nome" type="text">   
                    </div>

                    <h5 class='hidden' id='errore'>Campo nome non inserito!</h5>
                </div>
                
                <div id='cognome'>
                    <div id=flex_row>
                        <p>Cognome</p>
                        <input name="cognome" type="text">
                    </div>

                    <h5 class='hidden' id='errore'>Campo cognome non inserito!</h5>
                </div>

                <div id='email'>
                    <div id=flex_row>
                        <p>Email</p>
                        <input name="email" type="text">
                    </div>

                    <h5 class='hidden' id='errore'>Email inserita non valida!</h5>
                </div>
                
                <div id=flex_row>
                    <p>Data di nascita</p>
                    <input name="data" type="date">
                </div>

                <div id='username'>
                    <div id=flex_row>                    
                        <p>Username</p>
                        <input name="username"type="text">
                    </div>

                    <h5 class='hidden' id='errore'>Sono ammessi lettere e numeri. Max 15 caratteri</h5>
                </div>

                <div id='password'>
                    <div id=flex_row>
                        <p>Password</p>
                        <input name="password" type="password">
                    </div>

                    <h5 class='hidden' id='errore'>Il campo deve avere almeno 8 caratteri!</h5>
                </div>

                <div id='confirm_password'>
                    <div id=flex_row>
                        <p>Conferma Password</p>
                        <input name="conferma-password" type="password">
                    </div>

                    <h5 class='hidden' id='errore'>Le password devono essere uguali!</h5>
                    </div>                    
                </div>
                
                <div id="buttonDiv">
                    <button type="submit">Registrati</button>
                </div>
                
                <div id='colore'>
                    <?php if(isset($errore1))echo $errore1;?>
                </div>
            </form>

            <div class="signup"><a href="login.php">Sei già registrato? Clicca qui!</a>
        </div>
        </div>
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