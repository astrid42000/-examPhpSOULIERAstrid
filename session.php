<?php
require_once('pdo.php');
include_once ('function.php');
include ('head.php');

session_start();

if (! isset( $_SESSION [ 'email' ]) || empty( $_SESSION [ 'email' ])) {
    header( 'Location: login.php' );
}

$errors=[];
if($_SERVER['REQUEST_METHOD']==='POST'){
    $errors=validexp($pdo);
    if (count($errors)===0){
        ajoutBDD($pdo);
        header('location:session.php');
    }
}


$reponse = $pdo->query('SELECT * FROM experience');
$reponse2= $pdo->query('SELECT * FROM competence');

?>

<body>
<div id="header">
    <div class="cv2"><button><a href="accueil.php">Accueil</a></button></div>
    <div class="cv2"><button><a href="deconnect.php">Se déconnecter</a></button></div>
</div>

<div class="bonjour">
    <h2>Bonjour <?php echo($_SESSION['prenom']) ?></h2>
    <div>
    <button class="crud"><a href="ajoutExp.php">Ajout expérience</a></button>
    <button class="crud"><a href="ajoutComp.php">Ajout compétence</a></button>
    </div>
</div>



<div class="tableaux">
    <h2> Liste des Expériences</h2>

    <table class="table p-3 ">
        <thead class="thead-light">
        <tr>
            <th scope="col">Titre</th>
            <th scope="col">Description</th>
            <th scope="col">Liens</th>

        </tr>
        </thead>
        <tbody class="w-100">
    <?php while ($data = $reponse->fetch()){?>
        <tr>
            <td><?php echo($data['titre']);?></td>
            <td><?php echo($data['description']); ?></td>

            <td>
                <a class="text-reset" title="modifier" href="editExp.php?id=<?php echo($data['id']); ?>">
                    Modifier
                </a>
                <a class="text-reset" title="supprimer" href="deleteExp.php?id=<?php echo($data['id']); ?>">
                   Supprimer
                </a>
            </td>
        </tr>

    <?php }

    $reponse->closeCursor();
    ?>
        </tbody>
    </table>
</div>




<div class="tableaux">
    <h2> Liste des Compétences</h2>

    <table class="table p-3">
        <thead class="thead-light ">
        <tr>
            <th scope="col">Titre</th>
            <th scope="col">Description</th>
            <th scope="col">Liens</th>

        </tr>
        </thead>
        <tbody class="w-100 ">
        <?php while ($data2 = $reponse2->fetch()){?>
            <tr>
                <td><?php echo($data2['titre']);?></td>
                <td><?php echo($data2['note'].'/5'); ?></td>

                <td>
                    <a class="text-reset" title="modifier" href="editComp.php?id=<?php echo($data2['id']); ?>">
                        Modifier
                    </a>
                    <a class="text-reset" title="supprimer" href="deleteComp.php?id=<?php echo($data2['id']); ?>">
                        Supprimer
                    </a>
                </td>
            </tr>

        <?php }

        $reponse->closeCursor();
        ?>
        </tbody>
    </table>
</div>



</body>
