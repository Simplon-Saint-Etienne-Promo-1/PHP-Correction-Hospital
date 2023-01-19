<?php include './partials/header.php' ?>
<?php include './utils/db_connect.php' ?>
<?php
    $patientStmnt = $pdo->prepare('SELECT * FROM patients WHERE id = '. $_GET['patient_id']);
    $patientStmnt->execute();
    $patient = $patientStmnt->fetch(PDO::FETCH_ASSOC);
?>

<main class="container">
<?php include './utils/alert.php' ?>
    <section>
        <form action="./process/process-modif-patient.php?patient_id=<?=$patient['id']?>" method="post">
            <input value='<?=$patient['lastname']?>'type="text" placeholder="Mikou" name="lastname" id="">
            <input value='<?=$patient['firstname']?>'type="text" placeholder="fou" name="firstname" id="">
            <input value='<?=$patient['phone']?>'type="tel" placeholder="0612457821" name="phone" id="">
            <input value='<?=$patient['mail']?>'type="email" placeholder="example@mail.com" name="mail" id="">
            <input value='<?=$patient['birthdate']?>'type="text" placeholder="2022-12-04" class="datepicker" name="birthdate">
            <button type="submit" class="btn" >Modifier</button>
        </form>
    </section>
</main>