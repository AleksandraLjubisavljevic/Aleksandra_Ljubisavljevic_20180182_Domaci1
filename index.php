<?php

if(isset($_POST['username'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];

    include("konekcijaAdmin.php");

    

    $sql = "SELECT * FROM korisnik WHERE korisnickoIme = '".$user."' AND lozinka='".$pass."' LIMIT 1";
    $rezultat = $mysqli->query($sql);

    if(!empty($rezultat) && $rezultat->num_rows==1){
        header("Location: home.php");
    }else{
        echo "<script type='text/javascript' src='jquery-1.10.2.js'></script>";
        echo 
            "<script type='text/javascript'>
                $(document).ready(function(){
                    $(\"#login_message\").text('Greska pri unosu! Pokušajte ponovo.');
                });
            </script>";
    }
    $mysqli->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aura Cosmetics</title>
    <link rel="stylesheet" href="css/styleAdmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css" 
    integrity="sha256-/sdxenK1NDowSNuphgwjv8wSosSNZB0t5koXqd7XqOI=" crossorigin="anonymous" />
</head>
<body>
    <img src="img/logo1.png" id="log">
    <div class="container">
        <form method="POST" action="#">
            <div class="form_input">
                <input type="text" name="username" placeholder="Unesite korisničko ime" id="korisnik" /><br>
            </div><br>
            <div class="form_input">
                <input type="password" name="password" placeholder="Unesite lozinku" id="lozinka" />
            </div><br><br><br>
            <input type="submit" name="submit" value="Prijavite se" class="btn-primary" id="login_btn"/>
            <p id="login_message"></p>
        </form>
    </div>
</body>
</html>