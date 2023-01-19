<?php include './partials/header.php' ?>
<?php include './utils/db_connect.php' ?>
<?php

    $patientStmnt = $pdo->prepare('SELECT * FROM patients WHERE id = '. $_GET['patient_id']);
    $patientStmnt->execute();
    $patient = $patientStmnt->fetch(PDO::FETCH_ASSOC);


    $appointmentStmnt = $pdo->prepare('SELECT * FROM appointments WHERE idPatients = '. $_GET['patient_id']);
    $appointmentStmnt->execute();
    $appointment = $appointmentStmnt->fetch(PDO::FETCH_ASSOC);


?>


<table class="container">
        <thead>
            <th>Id</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Mail</th>
            <th>Téléphone</th>
            <th>Date de naissance</th>
        </thead>

        <tbody>
                <tr>
                    <td><?=$patient['id']?></td>
                    <td><?=$patient['firstname']?></td>
                    <td><?=$patient['lastname']?></td>
                    <td><?=$patient['mail']?></td>
                    <td><?=$patient['phone']?></td>
                    <td><?=$patient['birthdate']?></td>
                    <td>
                        <a class="btn blue" href="modif-patient.php?patient_id=<?=$patient['id']?>">Modifier</a>
                        <a></a>
                        <a></a>
                    </td>
            
                </tr>
        </tbody>
    </table>

<?php include '././partials/footer.php'?>