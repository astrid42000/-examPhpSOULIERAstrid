<?php
require_once('pdo.php');
include_once ('function.php');
include ('head.php');

session_start();

    $errors2=[];
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $errors2=validcomp($pdo);
        if (count($errors2)===0){
            ajoutBDD2($pdo);
            header('location:session.php');
        }
    }
    ?>
<div class="accordion">
    <div class="button">
        <button data-toggle="collapse" data-target="#competence" >Compétences</button>
    </div>
    <div id="competence" class="collapse" >
        <div class="card-body">
            <form method="post" class="experience">
                <label >Titre</label><br>
                <input type="texte" name="titre"><br>
                <label for="degres">Degrés de compétences (0 à 5)</label><br>
                <input id="degres" type="number" name="note" min="0" max="5"><br><br>
                <input type="submit"><br>


            </form>

        </div>
    </div>
</div>

    <div class="erreur">
        <h3><?php
            displayError($errors2);
            ?></h3>
    </div>
