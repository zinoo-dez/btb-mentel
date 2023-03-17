<?php
include("./database/db.php");

$user_id = $_GET['id'];
$sql = 'DELETE FROM users
        WHERE user_id = :user_id';

$statement = $pdo->prepare($sql);
$statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);

if ($statement->execute()) {
    // echo $statement->rowCount() . ' row(s) was deleted successfully.';
    header("location:admin-dashboard.php?message = \"delete successful\"");
}
