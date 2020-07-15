<?php

function validLogin(){
$errors=[];
if(empty($_POST['email']) OR empty($_POST['mot_de_passe'])){
$errors[]='erreur d\'identifiants';
}
if (empty($_POST['mot_de_passe'])){

$errors[]="il manque le mot de passe";
}

if (empty($_POST['email'])){

$errors[]="il manque le pseudo";}
return $errors;
}

function connectUser($pdo){
    $errors=[];
    $envoi=$pdo->prepare('SELECT * FROM user WHERE email=:email AND mot_de_passe=:mot_de_passe');
    $envoi->execute([
        'email'=>$_POST['email'],
        'mot_de_passe'=>md5($_POST['mot_de_passe'])]);

    $res=$envoi->fetch();
    if($res){
        $_SESSION['user']=$res;}
    else{
        $errors[]='erreur identifiant et/ou mot de passe';
    }

    return $errors;

}


function displayError($errors){
if(count($errors)!=0){
    echo ('<h2> Erreurs lors de l\'envoi du formulaire</h2><ul>');
    foreach($errors as $error){
        echo ('<ol>'.$error.'</ol>');
    }
    echo('</ul>');
}

}




function ajoutBDD($pdo){
    $envoi = $pdo->prepare('INSERT INTO experience (titre,description,date_debut,date_fin) 
VALUES (:titre, :description, :date_debut, :date_fin=null)');
    $envoi->execute([
        'titre' => $_POST['titre'],
        'description' => $_POST['description'],
        'date_debut' => $_POST['date_debut'],
        'date_fin' => $_POST['date_fin']

    ]);

}

function ajoutBDD2($pdo){
    $envoi = $pdo->prepare('INSERT INTO competence (titre,note) 
VALUES (:titre, :note)');
    $envoi->execute([
        'titre' => $_POST['titre'],
        'note' => $_POST['note']

    ]);

}

function validcomp($pdo){
    $errors=[];

    if (empty($_POST['titre'])){

        $errors[]="il manque un titre";
    }

    if (empty($_POST['note'])){

        $errors[]="il manque la note";
    }


    return $errors;
}




function validexp($pdo){
    $errors=[];

    if (empty($_POST['titre'])){

        $errors[]="il manque un titre";
    }

    if (empty($_POST['date_debut'])){

        $errors[]="il manque la date de début";
    }

    if (empty($_POST['description'])){

        $errors[]="il manque la description";}

    return $errors;
}


function stars($note){
switch ($note) {
    case 0:
        echo "";
        break;
    case 1:
        echo ('<img src=image/etoile1.png>');
        break;
    case 2:
        echo ('<img src=image/etoile1.png>'.'<img src=image/etoile1.png>');
        break;
    case 3:
        echo ('<img src=image/etoile1.png>'.'<img src=image/etoile1.png>'.'<img src=image/etoile1.png>');
        break;
    case 4:
        echo ('<img src=image/etoile1.png>'.'<img src=image/etoile1.png>'.'<img src=image/etoile1.png>'.'<img src=image/etoile1.png>');
        break;
    case 5:
        echo ('<img src=image/etoile1.png>'.'<img src=image/etoile1.png>'.'<img src=image/etoile1.png>'.'<img src=image/etoile1.png>'.'<img src=image/etoile1.png>');
        break;
}

}

function getExp($pdo,$id)
{
    $res = $pdo->prepare('SELECT * FROM experience WHERE id = :id');
    $res->execute(['id'=> $id]);
    return $res->fetch();
}


function updateBdd($pdo, $id){
    $envoi = $pdo->prepare('UPDATE experience SET titre = :titre, description = :description , date_debut = :date_debut , date_fin = :date_fin WHERE id = :id');
    $envoi->execute([
        'titre' => $_POST['titre'],
        'description' => $_POST['description'],
        'date_debut' => $_POST['date_debut'],
        'date_fin' => $_POST['date_fin'],
        'id'=> $id
    ]);
}

function validEdit()
{
    $errors = [];
    if (empty($_POST['titre'])) {
        $errors[] = 'Veuillez saisir un titre';
    }

    if (empty($_POST['description'])) {
        $errors[] = 'Veuillez saisir une description';
    }

    if (empty($_POST['date_debut'])) {
        $errors[] = 'Veuillez saisir une date de début';
    }
}


function updateBdd2($pdo, $id){
    $envoi = $pdo->prepare('UPDATE competence SET titre = :titre, note = :note  WHERE id = :id');
    $envoi->execute([
        'titre' => $_POST['titre'],
        'note' => $_POST['note'],
        'id'=> $id
    ]);
}

function validEdit2()
{
    $errors = [];
    if (empty($_POST['titre'])) {
        $errors[] = 'Veuillez saisir un titre';
    }

    if (empty($_POST['note'])) {
        $errors[] = 'Veuillez saisir une note';
    }

}

function getComp($pdo,$id)
{
    $res = $pdo->prepare('SELECT * FROM competence WHERE id = :id');
    $res->execute(['id'=> $id]);
    return $res->fetch();
}

function deleteComp($pdo,$id){
    $envoi=$pdo->prepare('DELETE FROM competence WHERE id = :id');
    $envoi->execute(['id'=>$id]);
}

function deleteExp($pdo,$id){
    $envoi=$pdo->prepare('DELETE FROM experience WHERE id = :id');
    $envoi->execute(['id'=>$id]);
}

