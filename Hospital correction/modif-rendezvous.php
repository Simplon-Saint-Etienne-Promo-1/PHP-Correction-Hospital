<?php include '././partials/header.php'?>
<?php include '././utils/db_connect.php';?>
<?php
        $patientStmnt = $pdo->prepare('SELECT * FROM patients WHERE id = ?');
        $patientStmnt->execute([$_GET['patient_id']]);
        $patient = $patientStmnt->fetch(PDO::FETCH_ASSOC);

        $patientsStmnt = $pdo->prepare('SELECT appointments.id, appointments.dateHour, appointments.idPatients, patients.lastname, patients.firstname FROM appointments JOIN patients ON patients.id = appointments.idPatients');
        $patientsStmnt->execute();
        $appointments = $patientsStmnt->fetchAll(PDO::FETCH_ASSOC);
?>
<main class="container">
    <h3>Choisissez une nouvelle date</h3>
    <section>
        <form action="./process/process-modif-rendezvous.php?id_patient=<?=$_GET['patient_id']?>&&rdv_id=<?=$_GET['rdv_id']?>" method="post">
            <h6>Modifier le rendez-vous de <?=$patient['lastname']?>. Identifiant du rendez-vous: <?=$_GET['rdv_id']?></h6>
            <input type="datetime-local" name="dateHour" id="">
            <button type="submit" class="btn">Modifier</button>
        </form>
    </section>
</main>