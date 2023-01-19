<?php
if (
    isset($_GET['rdv_id']) && !empty($_GET['rdv_id'])
) {
    // Connexion à la base de données
    include '../utils/db_connect.php';
    // Supprimer un patient et ces rendez-vous

    $pdostmnt = $pdo->prepare('DELETE FROM appointments WHERE id = ?');
    $isSuccess =  $pdostmnt->execute([
        $_GET['rdv_id']
    ]);


    if ($isSuccess) {
        header('Location: ../liste-rendezvous.php?&success=Le rendez-vous à été supprimé !');    
    } else {
        header('Location: ../liste-rendezvous.php?error=La suppression a échouée');    
    }
    //rediriger vers une page
} else {
    header('Location: ../liste-rendezvous.php?error=Je ne sais pas qui supprimer');    
}