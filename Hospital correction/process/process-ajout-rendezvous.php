<?php
if (
    isset($_POST['dateHour']) && !empty($_POST['dateHour']) &&
    isset($_POST['patient']) && !empty($_POST['patient'])
) {
    // Connexion à la base de données 
    include '../utils/db_connect.php';
    // Ajout du rendez-vous dans la base de données
    $pdostmnt = $pdo->prepare('INSERT INTO appointments( dateHour, idPatients) VALUES (?,?)');
    $isSuccess =  $pdostmnt->execute([
        $_POST['dateHour'],
        $_POST['patient'],
    ]);

    if ($isSuccess) {
        header('Location: ../liste-patient.php?success=Le rendez vous à bien été ajouté !');    
    } else {
        header('Location: ../ajout-rdv.php?error=Erreur lors de l\'enregistrement du rendez vous !');    
    }
    
    //rediriger vers une page
} else {
    header('Location: ../ajout-rdv.php?error=Le formulaire n\'est pas valide !');    
}