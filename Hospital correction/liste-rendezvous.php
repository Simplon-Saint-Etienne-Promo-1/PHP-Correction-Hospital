<?php include './partials/header.php' ?>
<?php include './utils/db_connect.php' ?>
<?php
    $patientsStmnt = $pdo->prepare('SELECT appointments.id, appointments.dateHour, appointments.idPatients, patients.lastname, patients.firstname FROM appointments JOIN patients ON patients.id = appointments.idPatients');
    $patientsStmnt->execute();
    $appointments = $patientsStmnt->fetchAll(PDO::FETCH_ASSOC);
?>
<main class="container">
    <?php include './utils/alert.php' ?>
    <section>
   
    <table>
        <thead>
          <tr>
              <th>Id</th>
              <th>Firstname</th>
              <th>Lastname</th>
              <th>dateHour</th>
              <th>Actions</th>
          </tr>
        </thead>

        <tbody>
            <?php foreach ($appointments as $appointment) {?>
                <tr>
                    <td><?=$appointment['id']?></td>
                    <td><?=$appointment['firstname']?></td>
                    <td><?=$appointment['lastname']?></td>
                    <td><?=$appointment['dateHour']?></td>
 
                    <td>
                        <a class="btn" href="rendezvous.php?patient_id=<?=$appointment['idPatients']?>">Voir</a>
                        <a class="btn blue" href="./modif-rendezvous.php?rdv_id=<?=$appointment['id']?>&&patient_id=<?=$appointment['idPatients']?>">Modifier</a>
                        <a class="btn red" href="./process/process-suppr-rendezvous.php?rdv_id=<?=$appointment['id']?>">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
            
        </tbody>
      </table>
      <a class="btn" href="ajout-rendezvous.php">Ajouter un rendez-vous</a>
    </section>
</main>

<script src="./assets/js/ajout_patient.js"></script>

<?php include './partials/footer.php' ?>