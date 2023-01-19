<?php include '../utils/db_connect.php';?>
<?php
    $search = "%" . $_GET['search'] . "%";
    $patientStmnt = $pdo->prepare('SELECT * FROM patients WHERE firstname LIKE :search OR lastname LIKE :search');
    $patientStmnt->execute(array(':search' => $search));
