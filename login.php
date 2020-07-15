<?php
require_once('pdo.php');
include_once ('function.php');
include ('head.php');

session_start();



$errors=[];
$errors2=[];
if($_SERVER['REQUEST_METHOD']==='POST'){
    $errors= validLogin();
    $errors2=connectUser($pdo);
    if (count($errors)===0 AND count($errors2)===0){
        $_SESSION['email']=$_POST['email'];
        $_SESSION['password']=$_POST['password'];
        $_SESSION['prenom']='Astrid';
        header('Location: session.php');
    }
}
?>



<body>

<div class="cv2">
    <button ><a href="accueil.php">Accueil</a></button>
</div>


<div class="login">
    <h2>Connexion</h2>
    <div class="connexion">
        <form method="post" enctype="multipart/form-data">
            <label>Adresse mail </label>
            <input name="email" type="text" placeholder="email" required> <br><br>
            <label>Password : </label>
            <input name="mot_de_passe" type="password" placeholder="Mot de passe" required> <br><br>

            <input type="submit" >
        </form>
    </div>
</div>


<div class="erreur">
<h3><?php
displayError($errors);
displayError($errors2);

?></h3>
</div>
</body>
