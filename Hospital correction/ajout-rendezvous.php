<?php include '././partials/header.php'?>
<?php include './utils/db_connect.php' ?>
<?php 
    // Récupération de tous les patients
    $patientStmnt = $pdo->prepare('SELECT * FROM patients');
    $patientStmnt->execute();
    
    $patients = $patientStmnt->fetchAll(PDO::FETCH_ASSOC);
?>
<main class="container">
    <?php include './utils/alert.php'?>
    <section>

            <!-- Création du formulaire d'ajout de rendez-vous -->
            <form action="./process/process-ajout-rendezvous.php" method="post">
                <input type="datetime-local" name="dateHour" id="">
                <select name='patient' style="display: block;">
                    <option value="" disabled selected>Choisissez le patient</option>
                    <?php foreach($patients as $patient) {?>
                        <option  value="<?=$patient['id']?>" ><?=$patient['lastname']?> <?=$patient['firstname']?>
                        
                    <?php }?>
                </select>
                    <button type="submit" class="btn">Ajouter</button>
            </form>
        
    </section>
</main>