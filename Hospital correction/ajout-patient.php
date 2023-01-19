<?php include '././partials/header.php'?>

<main class="container">
    <section>
        <form action="./process/process-ajout-patient.php" method="post">
            <input type="text" placeholder="Mickael" name="lastname" id="">
            <input type="text" placeholder="Farre" name="firstname" id="">
            <input type="tel" placeholder="0612457821" name="phone" id="">
            <input type="email" placeholder="example@mail.com" name="mail" id="">
            <input type="text" placeholder="2022-12-04" class="datepicker" name="birthdate">
            <button type="submit" class="btn" >Ajouter</button>
        </form>
    </section>
</main>