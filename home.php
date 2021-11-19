<!DOCTYPE html>
<?php
include("database.php");
$db = new Database("aurabaza");

include "databaseKategorije.php";
$crudKategorije = new DatabaseKategorije("aurabaza");

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aura Cosmetics</title>
    <link rel="stylesheet" href="css/styleHome.css">
    <link rel="stylesheet" 
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <link rel = "stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css" 
    integrity="sha256-/sdxenK1NDowSNuphgwjv8wSosSNZB0t5koXqd7XqOI=" crossorigin="anonymous" />
    <link rel="stylesheet" href="lightbox.min.css">
    <script type="text/javascript" src="lightbox-plus-jquery.min.js"></script>
    <script type="text/javascript" src="jquery-1.10.2.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#tipTekst").blur(function(){
                var vrednost = $("#tipTekst").val();
                $.get("adminIzmeneValidacija.php", { nazivDodavanje: vrednost },
                function(data){
                    if (data == 0){
                        $("#poruka").html("Proizvod sa takvim nazivom već postoji u bazi");
                        $("#tipTekst").focus();
                    }
                    if (data == 1){
                        $("#poruka").html("Naziv proizvoda je dostupan");
                    }   
                });
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#tipId").blur(function(){
                var vrednost = $("#tipId").val();
                $.get("adminIzmeneValidacijaUpdate.php", { idIzmena: vrednost },
                function(data){
                    if (data == 1){
                        $("#poruka1").html("Proizvod sa ovim id ne postoji u bazi");
                        $("#tipId").focus();
                    }
                    if (data == 0){
                        $("#poruka1").html("Ovaj proizvod se moze izmeniti");
                    } 
                });
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#tipId1").blur(function(){
                var vrednost = $("#tipId1").val();
                $.get("adminIzmeneValidacijaDelete.php", { idBrisanje: vrednost },
                function(data){
                    if (data == 1){
                        $("#poruka2").html("Proizvod sa ovim id ne postoji u bazi");
                        $("#tipId1").focus();
                    }
                    if (data == 0){
                        $("#poruka2").html("Ovaj proizvod se moze obrisati");
                    }  
                });
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(
            function () {
                $("#kombo_kategorije").change(
                    function(){
                        var vrednost = $("#kombo_kategorije").val();
                        $.get("prikazDodatna.php", { id: vrednost },
                            function(data){
                                $("#popuni").html(data);
                        });
                });
        });
    </script>
</head>

<body>

    <section id="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="promo-title">AURA Cosmetics</p>
                </div>
                <div class="col-md-6 text-center">
                </div>
            </div>
        </div>
    </section>

    <section id="nav-bar">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#"><p>RAD SA BAZOM PROIZVODA</p></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" 
                    data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                      <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                          <a class="nav-link" href="#insert">DODAJ</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#update">IZMENI</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#delete">OBRIŠI</a>
                        </li>
                      </ul>
                    </div>
                  </nav>
    </section>
    <section id="sviProizvodi">
        <div id="zajedno">
            <div class="container">
                <h1 class="title text-center"><b>PROIZVODI:</b></h1>
                <img src="img/p88.jpg" id="majmun"><br><br>
                <form> 
                    <b>Izaberi kategoriju proizvoda:</b>
                    <select name="kategorije" id="kombo_kategorije">
                    <?php
                        $crudKategorije->select();
                        while($redKategorije=$crudKategorije->getResult()->fetch_object()){
                    ?>
                    <option value="<?php echo $redKategorije->id;?>"><?php echo $redKategorije->naziv;?></option>
                    <?php
                    }
                    ?>
                    </select>
                </form>
                <p><div id="popuni"></div></p>
            </div>
        </div>
    </section>

    <div class = "parallax5">
        </div>

    <section id="insert">
        <div id="zajedno">
            <div class="container">
                <h1 class="title text-center"><b>DODAJ PROIZVOD</b></h1>
                <img src="img/slikaa.jpg" id="majmun"><br><br>
                <form action="home.php" method="post">
            Unesite naziv: <input type="text" name="nazivDodavanje" id="tipTekst"><br>
                           <div id="poruka"></div><br><br>
            Unesite url slike: <input type="text" name="slikaDodavanje" id="tipTekst2"><br><br>
            Unesite cenu: <input type="text" name="cenaDodavanje" id="tipTekst3"><br><br>
            Unesite kategoriju: <input type="text" name="kategorijaDodavanje" id="tipTekst4"><br><br>
            <input type="submit" name ="dodaj" value="Dodaj" class="btn-primary"><br>
        </form>
        <?php
            if(isset($_POST["dodaj"])){
                $naziv=$_POST["nazivDodavanje"];
                $slika=$_POST["slikaDodavanje"];
                $cena=$_POST["cenaDodavanje"];
                $kategorija=$_POST["kategorijaDodavanje"];
                $kolone = "naziv, slika, cena, kategorija";
                $db->insert("proizvod", $naziv, $slika, $cena, $kategorija, $kolone);
            }
        ?>
            </div>
        </div>
    </section>

    <div class = "parallax2">
        </div>

        <section id="update">
        <div id="zajedno">
            <div class="container">
                <h1 class="title text-center"><b>IZMENI PROIZVOD</b></h1>
                <img src="img/p88.jpg" id="majmun"><br><br>
                <form action="home.php" method="post">
            Unesite id za izmenu: <input type="text" name="idIzmena" id="tipId"><br><br>
                            <div id="poruka1"></div><br><br>
            Naziv: <input type="text" name="nazivIzmena" id="tekst1"><br><br>
            Slika: <input type="text" name="slikaIzmena" id="tekst2"><br><br>
            Cena: <input type="text" name="cenaIzmena" id="tekst3"><br><br>
            Kategorija: <input type="text" name="kategorijaIzmena" id="tekst4"><br><br>
            <input type="submit" name ="izmeni" value="Izmeni" class="btn-primary"><br>
        </form>
        <?php
            if(isset($_POST["izmeni"])){
                $id=$_POST["idIzmena"];
                $naziv=$_POST["nazivIzmena"];
                $slika=$_POST["slikaIzmena"];
                $cena=$_POST["cenaIzmena"];
                $kategorija=$_POST["kategorijaIzmena"];
                $nizVrednosti = array($id, $naziv, $slika, $cena, $kategorija);
                $db->update("proizvod", $nizVrednosti);
            }
        ?>
                   
            </div>
        </div>
    </section>

    <div class = "parallax3">
        </div>

    <section id="delete">
        <div id="zajedno">
            <div class="container">
                <h1 class="title text-center"><b>OBRIŠI PROIZVOD</b></h1>
                <img src="img/slikaa.jpg" id="majmun"><br><br>
                <form action="home.php" method="post">
            Unesite id za brisanje: <input type="text" name="idBrisanje" id="tipId1"><br><br>
                                <div id="poruka2"></div><br><br>
            <input type="submit" name ="obrisi" value="Obrisi" class="btn-primary"><br>
        </form>
        <?php
            if(isset($_POST["obrisi"])){
                $id=$_POST["idBrisanje"];
                $id=(int)$id;
                $db->delete("proizvod", $id);
            }
        ?>
                   
            </div>
        </div>
    </section>
    <div class = "parallax4">
        </div>
     <!-----------Smooth scroll-------------->

     <script src="smooth-scroll.js">
        var scroll = new SmoothScroll('a[href*="#"]');
    </script>
</body>
</html>