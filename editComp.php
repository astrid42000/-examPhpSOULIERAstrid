<?php
require_once('pdo.php');
include_once ('function.php');
include ('head.php');

session_start();


$id=$_GET['id'];
$competence= getComp($pdo,$id);
$errors=[];
if($_SERVER['REQUEST_METHOD']==='POST'){
    $validation= validEdit2();
    $errors=$validation['errors'];
    if (count($errors)===0){
        updateBdd2($pdo,$competence['id']);
        header('location:session.php');
    }
}

?>

<body>
<div class="accordion">
    <div class="button">
        <button data-toggle="collapse" data-target="#competence" >Compétences</button>
    </div>
    <div id="competence" class="collapse" >
        <div class="card-body">
            <form method="post" action="editComp.php?id=<?php echo($competence['id']);?>" class="experience">
                <label >Titre</label><br>
                <input type="texte" name="titre" value="<?php echo($competence['titre']);?>"><br>
                <label for="degres">Degrés de compétences (0 à 5)</label><br>
                <input id="degres" type="number" name="note" min="0" max="5" value="<?php echo($competence['note']);?>"><br><br>
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
