<!DOCTYPE html>

<?php

include("databaseKategorije.php");
$crudKategorije = new DatabaseKategorije("aurabaza");

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Avon - Katalog</title>
    <link rel = "stylesheet" href = "css/stylePrikazTabeleMalaDopuna.css" />
    <link rel = "stylesheet" href = "css/bootstrap.min.css" />
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    </script>
    <script src = "js/bootstrap.min.js"></script>

    <script type="text/javascript" src="jquery-1.10.2.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".obrisi_link").click(function(){
                var vrednost = ($(this).attr("id")).substring(7);
                var red_tabele = $(this);
                $.get("obrisiProizvodIzTabele.php", { id: vrednost },
                    function(data){
                    if (data == 1){
                        $(red_tabele).parent().parent().remove();
                    }   
                });
            });
        });
    </script>
    
</head>
<body>

<div class = "col-md-2"></div>

<div class = "col-md-8">
        <div class = "row">

        <table border ="1" width="600" cellpadding="5" cellspacing="2" style="text-align:center ">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Naziv</th>
                        <th>Slika</th>
                        <th>Cena</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                for($i=0; $i<count($proizvodi); $i++){
                ?>
                    <tr>
                        <td><?php echo $proizvodi[$i]->getId(); ?></td>
                        <td><?php echo $proizvodi[$i]->getNaziv(); ?></td>
                        <td><img src = "<?php echo trim($proizvodi[$i]->getSlika(), " "); ?>" alt = "<?php echo $proizvodi[$i]->getNaziv(); ?>" id = "mojaSlika"/></td>
                        <td><?php echo $proizvodi[$i]->getCena(); ?></td>
                    </tr>

                <?php
                }
                ?>

                </tbody>
            </table>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js" integrity="sha256-lPE3wjN2a7ABWHbGz7+MKBJaykyzqCbU96BJWjio86U=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TimelineMax.min.js" integrity="sha256-fIkQKQryItPqpaWZbtwG25Jp2p5ujqo/NwJrfqAB+Qk=" crossorigin="anonymous"></script>
    <script src="jscriptKatalog.js"></script>
</body>
</html>