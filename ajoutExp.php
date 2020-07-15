<?php
require_once('pdo.php');
include_once ('function.php');
include ('head.php');

session_start();

$errors=[];
if($_SERVER['REQUEST_METHOD']==='POST'){
    $errors=validexp($pdo);
    if (count($errors)===0){
        ajoutBDD($pdo);
        header('location:session.php');
    }
}

?>


<div class="accordion">


    <div class="button">
        <button data-toggle="collapse" data-target="#experience">Expériences</button>
    </div>
    <div id="experience" class="collapse" >
        <div class="card-body">
            <form method="post" class="experience">
                <label>Titre</label><br>
                <input type="texte" name="titre" ><br>
                <label>Date de début</label><br>
                <input type="date" name="date_debut" ><br>
                <label>Date de fin</label><br>
                <input type="date" name="date_fin" ><br>
                <label>Description du poste</label><br>
                <textarea name="description"></textarea><br>
                <input type="submit"><br>


            </form>

        </div>
    </div>
</div>


    <div class="erreur">
        <h3><?php
            displayError($errors);
            ?></h3>
    </div>
