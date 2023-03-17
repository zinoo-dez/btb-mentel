<?php
include("./database/db.php");

$doctor_id = $_GET['id'];
$sql = 'DELETE FROM doctors
        WHERE doctor_id = :doctor_id';

$statement = $pdo->prepare($sql);
$statement->bindParam(':doctor_id', $doctor_id, PDO::PARAM_INT);

if ($statement->execute()) {
    // echo $statement->rowCount() . ' row(s) was deleted successfully.';
    header("location:admin-dashboard.php?message = \"delete successful\"");
}
