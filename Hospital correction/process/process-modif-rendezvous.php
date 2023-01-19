<?php
if (
    isset($_POST['dateHour']) && !empty($_POST['dateHour']) &&
    isset($_GET['id_patient']) && !empty($_GET['id_patient']) &&
    isset($_GET['rdv_id']) && !empty($_GET['rdv_id'])
) {
    // Connexion à la base de données 
    include '../utils/db_connect.php';
    // Ajout du rendez-vous dans la base de données
    // Modification de la date supp le T
    $date = str_replace('T', ' ', $_POST['dateHour']);
    $idRdv = $_GET['rdv_id'];
    $pdostmnt = $pdo->prepare('UPDATE appointments SET dateHour=? WHERE id = ?');
    $isSuccess =  $pdostmnt->execute([
        $date,
        $idRdv
    ]);

    if ($isSuccess) {
        $lastDate = $_POST['dateHour'];
        header('Location: ../liste-rendezvous.php?success=Le rendez vous à bien été modifié par la date suivante: ' . $date . '! id_rdv = ' . $idRdv);    
    } else {
        header('Location: ../ajout-rendezvous.php?error=Erreur lors de l\'enregistrement du rendez vous !');    
    }
    
    //rediriger vers une page
} else {
    header('Location: ../ajout-rendezvous.php?error=Le formulaire n\'est pas valide !');    
}