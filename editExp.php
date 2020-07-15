<?php
require_once('pdo.php');
include_once ('function.php');
include ('head.php');

session_start();


$id=$_GET['id'];
$experience= getExp($pdo,$id);
$errors=[];
if($_SERVER['REQUEST_METHOD']==='POST'){
$validation= validEdit();
$errors=$validation['errors'];
if (count($errors)===0){
updateBdd($pdo,$experience['id']);
header('location:session.php');
}
}

?>

<body>

<div class="accordion">


    <div class="button">
        <button data-toggle="collapse" data-target="#experience">Expériences</button>
    </div>
    <div id="experience" class="collapse" >
        <div class="card-body">
            <form method="post" action="editExp.php?id=<?php echo($experience['id']);?>" class="experience">
                <label>Titre</label><br>
                <input type="texte" name="titre" value="<?php echo($experience['titre']);?>" ><br>
                <label>Date de début</label><br>
                <input type="date" name="date_debut" value="<?php echo($experience['date_debut']);?>"><br>
                <label>Date de fin</label><br>
                <input type="date" name="date_fin" value="<?php echo($experience['date_fin']);?>"><br>
                <label>Description du poste</label><br>
                <textarea name="description" ><?php echo($experience['description']);?></textarea><br>
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


</body>
