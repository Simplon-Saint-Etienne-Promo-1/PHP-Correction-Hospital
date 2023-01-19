<?php
if (
    isset($_GET['patient_id']) && !empty($_GET['patient_id'])
) {
    // Connexion à la base de données
    include '../utils/db_connect.php';
    // Supprimer un patient et ces rendez-vous

    $pdostmnt = $pdo->prepare('DELETE FROM appointments WHERE appointments.idPatients = ?');
    $isSuccess =  $pdostmnt->execute([
        $_GET['patient_id']
    ]);

    if($isSuccess) {

        $pdostmnt = $pdo->prepare('DELETE FROM patients WHERE id = ?');
        $isSuccess =  $pdostmnt->execute([
            $_GET['patient_id']
        ]);
    }


    if ($isSuccess) {
        header('Location: ../liste-patient.php?&success=Le patient ainsi que ces rendez-vous ont bien été supprimés !');    
    } else {
        header('Location: ../liste-patient.php?error=La suppression a échouée');    
    }
    //rediriger vers une page
} else {
    header('Location: ../liste-patient.php?error=Je ne sais pas qui supprimer');    
}