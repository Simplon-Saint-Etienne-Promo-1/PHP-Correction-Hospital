<?php
if (
    isset($_POST['lastname']) && !empty($_POST['lastname']) &&
    isset($_POST['firstname']) && !empty($_POST['firstname']) &&
    isset($_POST['phone']) && !empty($_POST['phone']) &&
    isset($_POST['mail']) && !empty($_POST['mail']) &&
    isset($_POST['birthdate']) && !empty($_POST['birthdate'])&&
    isset($_GET['patient_id']) && !empty($_GET['patient_id'])
) {
    //connexion à la base de données 
    include '../utils/db_connect.php';
    echo "bonjour";
    // faire la requete
    $pdostmnt = $pdo->prepare('UPDATE patients SET lastname=?,firstname=?,birthdate=?,phone=?,mail=? WHERE id = ?');
    $isSuccess =  $pdostmnt->execute([
        $_POST['lastname'],
        $_POST['firstname'],
        $_POST['birthdate'],
        $_POST['phone'],
        $_POST['mail'],
        $_GET['patient_id']
    ]);
    echo "bonjour";
    if ($isSuccess) {
        header('Location: ../profil-patient.php?patient_id='.$_GET['patient_id'].'&success=Le patient à bien été modifié !');    
    } else {
        header('Location: ../modif-patient.php?patient_id='.$_GET['patient_id'].'&error=Erreur lors de la modification du patient !');    
    }
    //rediriger vers une page
} else {
    header('Location: ../modif-patient.php?patient_id='.$_GET['patient_id'].'&error=Le formulaire n\'est pas valide !');    
}
