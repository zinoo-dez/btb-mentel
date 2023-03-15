<?php
session_start();
include("./database/db.php");

$errors = [];
if (isset($_POST['submit'])) {
    $email = trim($_POST['email']);
    $password = trim(md5($_POST['password']));
    empty($email) ? $errors[] = "email required" : "";
    if (count($errors) === 0) {
        $sql = "SELECT * FROM doctors WHERE email = :email";
        if ($smpt = $pdo->prepare($sql)) {
            $smpt->bindParam(":email", $email, PDO::PARAM_STR);
            $email = $email;
            if ($smpt->execute()) {
                if ($smpt->rowCount() === 1) {
                    if ($row = $smpt->fetch()) {
                        $s_email = $row['email'];
                        $s_password = $row['password'];
                        if ($email === $s_email && $password === $s_password) {
                            $_SESSION["loggedin"] = true;
                            $_SESSION["name"] = $row['name'];
                            header("location:index.php");
                        } else {
                            $errors[] = "email and password do not match";
                        }
                    }
                }
            }
        }
    }
}
