<?php
// print_r($_FILES['oldphoto']);
// print_r($_FILES['photo']);
// die();

include("./database/db.php");

if (isset($_POST['submit'])) {
    $doctor_id = $_POST['docid'];
    $name = trim($_POST['name']);
    $gender = trim($_POST['gender']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $department = trim($_POST['department']);
    $experience = trim($_POST['experience']);

    // documentation
    $oldfile = $_POST['oldfile'];
    // print_r($oldfile);
    // die();
    $documentation = $_FILES['documentation'];
    $file_name = $_FILES['documentation']['name'];
    $file_tmp_name = $_FILES['documentation']['tmp_name'];
    if ($file_name != "") {
        move_uploaded_file($file_tmp_name, "files/$file_name");
    } else {
        $file_name = $oldfile;
    }

    // photo
    $oldphoto = $_POST['oldphoto'];
    // print_r($oldphoto);
    // die();
    $photo = $_FILES['photo'];
    $p_name =  $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    if ($p_name != "") {
        move_uploaded_file($tmp_name, "photo/$p_name");
    } else {
        $p_name = $oldphoto;
    }
    $sql = "UPDATE doctors
        SET  doctor_id=:doctor_id, name=:name,gender=:gender,phone=:phone,address=:address,department=:department,experience=:experience,photo=:photo,documentation=:documentation WHERE doctor_id = :doctor_id";

    // $sql = "UPDATE doctors
    //     SET  doctor_id=:doctor_id, name=:name,gender=:gender,phone=:phone,photo=:photo,address=:address,documentation=:documentaion,department=:department,experience=:experience WHERE doctor_id = doctor_id";

    if ($stmt = $pdo->prepare($sql)) {
        // print_r($stmt);
        // die();
        $stmt->bindParam(":doctor_id", $doctor_id, PDO::PARAM_STR);
        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
        $stmt->bindParam(":gender", $gender, PDO::PARAM_STR);
        $stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
        $stmt->bindParam(":address", $address, PDO::PARAM_STR);
        $stmt->bindParam(":experience", $experience, PDO::PARAM_STR);
        $stmt->bindParam(":department", $department, PDO::PARAM_STR);
        $stmt->bindParam(":photo", $p_name, PDO::PARAM_STR);
        $stmt->bindParam(":documentation", $file_name, PDO::PARAM_STR);
        // $stmt->bindParam(":created_date", $now, PDO::PARAM_STR);
        // $stmt->bindParam(":updated_date", $now, PDO::PARAM_STR);
        // die(123);
        if ($stmt->execute()) {
            // Redirect to login page
            header("location: admin-dashboard.php");
        } else {
            echo  "Oops! Something went wrong. db insert error!.";
        }
    }
}
