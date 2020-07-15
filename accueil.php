<?php
require_once('pdo.php');
include_once ('function.php');
include ('head.php');



?>
<?php
$reponse = $pdo->query('SELECT * FROM experience');
$reponse2= $pdo->query('SELECT * FROM competence');
?>

<body>
<div>

    <div id="header">
    <div class="cv2"><button><a href="login.php">Se connecter</a></button></div>
    <div class="cv2"><button><a href="session.php">Mon espace</a></button></div>
    </div>

    <section id="main">
        <!--------HEADER---------->
        <header>
            <hr/><div class="image"><img class=photo" src="image/avatar2.jpg"></div><hr/>
            <h1>Astrid Soulier</h1>
            <p>Developpeuse web et web mobile</p>
        </header>
        <!--------HEADER---------->
        <hr/>
        <!--------ACCORDEON---------->
        <div class="accordion">

            <div class="button">
                <button  data-toggle="collapse" data-target="#collapseOne" >Formations</button>
            </div>
            <div id="collapseOne" class="collapse" >
                <div class="card-body">
                    <li>Mars 2020 à Décembre 2020 :</li>
                    <p class="titre">Formation de développement web et web mobile</p>
                    <p class="sous">Diplôme d'Etat de niveau Bac +2</p>
                    <p class="sous">Entreprise Human Booster, St Etienne</p><br>
                    <li>2019</li>
                    <p class="titre">Auto formation dans le développemnt web</p>
                    <p class="sous">Site Openclassroom</p><br>
                    <li>2009</li>
                    <p class="titre">Diplôme d'Etat infirmier</p>
                    <p class="sous">IFSI du CHU de St Etienne</p><br>
                    <li>2005</li>
                    <p class="titre">Baccalauréat Scientifique</p>
                    <p class="sous1">Lycée Simone Weil, St Etienne</p>
                </div>
            </div>



            <div class="button">
                <button data-toggle="collapse" data-target="#collapseTwo">Expériences</button>
            </div>
            <div id="collapseTwo" class="collapse" >
                <div class="card-body">
                    <?php while ($data = $reponse->fetch()){?>
                        <li><?php echo($data['date_debut']);?>/ <?php echo($data['date_fin']);?></li>
                        <p class="titre"><?php echo($data['titre']);?></p>
                        <p class="sous"><?php echo($data['description']);?></p>
                    <?php }

                    $reponse->closeCursor();
                    ?>
                </div>
            </div>



            <div class="button">
                <button data-toggle="collapse" data-target="#collapseThree" >Compétences</button>
            </div>
            <div id="collapseThree" class="collapse" >
                <div class="carte">
                    <ul class="competence">
                    <?php while ($data2 = $reponse2->fetch()){?>
                        <p><?php echo($data2['titre']);?></p>
                        <div><?php
                            $note=$data2['note'];
                            stars($note);?></div>
                    <?php }
                    $reponse->closeCursor();
                    ?>
                    </ul>
                </div>
            </div>



            <div class="button">
                <button class="dernier" data-toggle="collapse" data-target="#collapseFour" >Intérêts</button>
            </div>
            <div id="collapseFour" class="collapse" >
                <div class="card-body">
                    <p class="sous1">J'aime beaucoup la patisserie avec le cake design.</p>
                    <p class="sous1">Pratique instrumentale (flûte traversière et piano) depuis 25 ans</p>
                </div>
            </div>
        </div>
        <!--------ACCORDEON---------->
        <hr/>

        <!--------RESEAUX---------->
        <div class="reseaux">
            <a href="mailto:astrid_42@hotmail.fr" target="_blank" class="email"></a>
            <a href="https://www.linkedin.com/in/astrid-soulier-a82389140/" target="_blank" class="link"></a>
            <a href="https://github.com/astrid42000" target="_blank" class="git"></a>
        </div>
        <!--------RESEAUX---------->
        <div class="cv ">
            <button><a href="image/cv.pdf" target="_blank" download="cv Soulier Astrid">CV à imprimer</a></button>

        </div>


    </section>
</div>
</body>
</html>


</body>
