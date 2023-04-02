<?php
session_start();
include("./database/db.php");

if (isset($_POST['submit'])) {
    $user_id = $_POST['user_id'];
    $name = trim($_POST['name']);
    $age = trim($_POST['age']);
    $gender = trim($_POST['gender']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $oldfile = $_POST['oldphoto'];
    // print_r($oldfile);
    // die();
    $photo = $_FILES['photo'];
    $p_name =  $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    if ($p_name != "") {
        move_uploaded_file($tmp_name, "photo/$p_name");
    } else {
        $p_name = $oldfile;
    }

    $sql = "UPDATE users
        SET  user_id = :user_id, name = :name,age = :age,gender=:gender,phone=:phone,photo=:photo,address=:address WHERE user_id = :user_id";

    if ($stmt = $pdo->prepare($sql)) {
        $stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);
        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
        $stmt->bindParam(":age", $age, PDO::PARAM_STR);
        $stmt->bindParam(":gender", $gender, PDO::PARAM_STR);
        $stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
        $stmt->bindParam(":photo", $p_name, PDO::PARAM_STR);
        $stmt->bindParam(":address", $address, PDO::PARAM_STR);
        // $stmt->bindParam(":created_date", $now, PDO::PARAM_STR);
        // $stmt->bindParam(":updated_date", $now, PDO::PARAM_STR);
        // die(123);
        if ($stmt->execute()) {
            // Redirect to login page
            $_SESSION['name'] = $name;
            header("location: admin-dashboard.php");
        } else {
            echo  "Oops! Something went wrong. db insert error!.";
        }
    }
}
