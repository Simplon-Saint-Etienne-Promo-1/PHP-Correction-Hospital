<?php include './partials/header.php' ?>
<?php include './utils/db_connect.php' ?>
<?php

?>
<main class="container">
    <form action="liste-patient.php" method="get">
        <input type="text" name="search" placeholder="Rechercher par nom ou prénom">
        <button type="submit" class="btn">Rechercher</button>
    </form>
    <?php
    if(isset($_GET['search'])) {
        // Utilisation de la barre de recherche
        $search = "%" . $_GET['search'] . "%";
        $patientStmnt = $pdo->prepare('SELECT * FROM patients WHERE firstname LIKE :search OR lastname LIKE :search');
        $patientStmnt->execute(array(':search' => $search));
        $patients = $patientStmnt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        // Ajout de la pagination
        $page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? intval($_GET['page']) : 1;
        $resultsPerPage = 5;
        $debut = ($page - 1) * $resultsPerPage;

        $patientStmnt = $pdo->prepare('SELECT * FROM patients LIMIT :debut, :resultsPerPage');
        $patientStmnt->bindValue(':debut', $debut, PDO::PARAM_INT);
        $patientStmnt->bindValue(':resultsPerPage', $resultsPerPage, PDO::PARAM_INT);
        $patientStmnt->execute();
        
        $patients = $patientStmnt->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <div class="pagination">    
        <?php
            $totalPatientsStmnt = $pdo->query('SELECT COUNT(*) FROM patients');
            $totalPatients = $totalPatientsStmnt->fetchColumn();
            $totalPages = ceil($totalPatients / $resultsPerPage);
            for ($i = 1; $i <= $totalPages; $i++) {
                if ($i == $page) {
                    echo '<span>' . $i . '</span>';
                } else {
                    echo '<a href="liste-patient.php?page=' . $i . '">' . $i . '</a>';
                }
            }
        ?>
        </div>
    <?php }?>
    
    <?php include './utils/alert.php' ?>
    <table>
        <thead>
            <th>Id</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Mail</th>
            <th>Téléphone</th>
            <th>Date de naissance</th>
        </thead>

        <tbody>
            <?php foreach ($patients as $patient) {?>
                <tr>
                    <td><?= $patient['firstname']?></td>
                    <td><?= $patient['lastname']?></td>
                    <td>
                        <a class="btn" href="./profil-patient.php?patient_id=<?=$patient['id']?>">Voir</a>
                        <a></a>
                        <a class="btn red" href="./process/process-suppr-patient.php?patient_id=<?=$patient['id']?>">Supprimer</a>
                    </td>
                    
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <!-- Ajout du lien pour créer un patient -->
    <a class="btn" href="./ajout-patient.php">Ajouter un patient</a>
    
</main>

<?php include '././partials/footer.php'?>