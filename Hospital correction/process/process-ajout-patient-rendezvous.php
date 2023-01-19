<?php
if (
    isset($_POST['lastname']) && !empty($_POST['lastname']) &&
    isset($_POST['firstname']) && !empty($_POST['firstname']) &&
    isset($_POST['phone']) && !empty($_POST['phone']) &&
    isset($_POST['mail']) && !empty($_POST['mail']) &&
    isset($_POST['birthdate']) && !empty($_POST['birthdate']) &&
    isset($_POST['dateHour']) && !empty($_POST['dateHour'])
) {
    //connexion bdd 
    include '../utils/db_connect.php';
    // faire la requete
    $pdostmnt = $pdo->prepare('INSERT INTO patients( lastname, firstname, birthdate, phone, mail) VALUES (?,?,?,?,?)');
    $isSuccess =  $pdostmnt->execute([
        $_POST['lastname'],
        $_POST['firstname'],
        $_POST['birthdate'],
        $_POST['phone'],
        $_POST['mail']
    ]);

    $idPatient = $pdo->lastInsertId();

    $pdostmnt = $pdo->prepare('INSERT INTO appointments( dateHour, idPatients) VALUES (?,?)');
    $isSuccess =  $pdostmnt->execute([
        $_POST['dateHour'],
        $idPatient,
    ]);


    if ($isSuccess) {
        header('Location: ../liste-patient.php?success=Le patient et son rdv ont bien été ajouté !');    
    } else {
        header('Location: ../ajout-patient.php?error=Erreur lors de l\'enregistrement du patient et du rdv !');    
    }
    
    //rediriger vers une page
} else {
    header('Location: ../ajout-patient.php?error=Le formulaire n\'est pas valide !');    
}