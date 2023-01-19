<?php include './partials/header.php' ?>
<?php include './utils/db_connect.php' ?>
<?php
    $idPatient = $_GET['patient_id'];
    $appointementStmnt = $pdo->prepare('SELECT * FROM appointments JOIN patients ON appointments.idPatients = patients.id WHERE appointments.idPatients = '. $_GET['patient_id']);
    $appointementStmnt->execute();
    $appointements = $appointementStmnt->fetchAll(PDO::FETCH_ASSOC);
?>
<main class="container">
    <?php include './utils/alert.php' ?>
    <section>
    <h3>Rendez-vous</h3>
   
        <h3>Liste des rendez vous du patient</h3>
      <table>
        <thead>
          <tr>
              <th>Id</th>
              <th>dateHour</th>
          </tr>
        </thead>

        <tbody>
            <?php foreach ($appointements as $appointement) { ?>
                <tr>
                    <td><?= $appointement['id']?></td>
                    <td><?= $appointement['dateHour']?></td>
                    <td>
                        <a class="btn blue" href="./modif-rendezvous.php?rdv_id=<?=$appointement['id']?>&&patient_id=<?=$idPatient?>">Modifier</a>
                        <a class="btn red" href="./process/process-suppr-rendezvous.php?rdv_id=<?=$appointement['id']?>">Supprimer</a>
                    </td>
                </tr>
            <?php }?>
        </tbody>
      </table>
    </section>
</main>

<script src="./assets/js/ajout_patient.js"></script>

<?php include './partials/footer.php' ?>