<?php
if (
    isset($_POST['lastname']) && !empty($_POST['lastname']) &&
    isset($_POST['firstname']) && !empty($_POST['firstname']) &&
    isset($_POST['phone']) && !empty($_POST['phone']) &&
    isset($_POST['mail']) && !empty($_POST['mail']) &&
    isset($_POST['birthdate']) && !empty($_POST['birthdate'])
) {
    // Connexion à la base de données 
    include '../utils/db_connect.php';
    // Ajout du patient dans la base de données
    $pdostmnt = $pdo->prepare('INSERT INTO patients( lastname, firstname, birthdate, phone, mail) VALUES (?,?,?,?,?)');
    $isSuccess =  $pdostmnt->execute([
        $_POST['lastname'],
        $_POST['firstname'],
        $_POST['birthdate'],
        $_POST['phone'],
        $_POST['mail']
    ]);

    if ($isSuccess) {
        header('Location: ../liste-patient.php?success=Le patient à bien été ajouté !');    
    } else {
        header('Location: ../ajout-patient.php?error=Erreur lors de l\'enregistrement du patient !');    
    }
    
    //rediriger vers une page
} else {
    header('Location: ../ajout_patient.php?error=Le formulaire n\'est pas valide !');    
}