<?php

include("./database/db.php");
include("./partials/header.php");
include("./partials/navbar.php");
$date = new Datetime('now');
$now = $date->format('Y-m-d H:i:s');
$errors = [];
// include("./partials/carousel.php");
if (isset($_POST['doctor_submit'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = md5($_POST['password']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $gender = trim($_POST['gender']);
    $department = trim($_POST['department']);
    $experience = trim($_POST['experience']);
    $position = trim($_POST['position']);
    $photo = $_FILES['photo'];
    $p_name = time() . $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    move_uploaded_file($tmp_name, "photo/$p_name");
    $documentation = $_FILES['documentation'];
    $file_name = $_FILES['documentation']['name'];
    $file_tmp_name = $_FILES['documentation']['tmp_name'];
    move_uploaded_file($file_tmp_name, "files/$file_name");
    // print_r($photo);
    // die();
    empty($name) ? $errors[] = "name required" : "";
    empty($email) ? $errors[] = "email required" : "";
    empty($department) ? $errors[] = "department required" : "";
    empty($experience) ? $errors[] = "experience required" : "";
    empty($documentation) ? $errors[] = "documentation required" : "";
    empty($position) ? $errors[] = "position required" : "";
    empty($gender) ? $errors[] = "gender required" : "";
    empty($phone) ? $errors[] = "phone required" : "";
    empty($address) ? $errors[] = "address required" : "";
    if (count($errors) === 0) {
        $sql = "SELECT * FROM doctors WHERE email = :email";
        if ($stmt = $pdo->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);

            // Set parameters
            $email = $email;
            // print_r($stmt->execute());
            // die();
            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                if ($stmt->rowCount() === 1) {
                    $errors[] = "This doctor's email is already taken.";
                } else {
                    $sql = "INSERT INTO doctors (name,email, password,phone,photo,address,gender,department,documentation,experience,position,created_date,updated_date) VALUES (:name,:email, :password,:phone,:photo,:address,:gender,:department,:documentation,:experience,:position,:created_date,:updated_date)";
                    if ($stmt = $pdo->prepare($sql)) {
                        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
                        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
                        $stmt->bindParam(":password", $password, PDO::PARAM_STR);
                        $stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
                        $stmt->bindParam(":photo", $p_name, PDO::PARAM_STR);
                        $stmt->bindParam(":address", $address, PDO::PARAM_STR);
                        $stmt->bindParam(":gender", $gender, PDO::PARAM_STR);
                        $stmt->bindParam(":department", $department, PDO::PARAM_STR);
                        $stmt->bindParam(":documentation", $file_name, PDO::PARAM_STR);
                        $stmt->bindParam(":experience", $experience, PDO::PARAM_STR);
                        $stmt->bindParam(":position", $position, PDO::PARAM_STR);
                        $stmt->bindParam(":created_date", $now, PDO::PARAM_STR);
                        $stmt->bindParam(":updated_date", $now, PDO::PARAM_STR);
                        if ($stmt->execute()) {
                            // Redirect to login page
                            header("location: signin.php");
                        } else {
                            $errors[] =  "Oops! Something went wrong. Please try again later.";
                        }
                    }
                }
            } else {
                $errors[] = "Oops! Something went wrong. Please try again later.";
            }
        }
    } else {
        $errors[] = "error found";
    }
}
?>
<div class="container p-5">

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="w-50 m-auto p-5 shadow-lg"
        enctype="multipart/form-data">
        <?php include("./errors.php") ?>
        <h3 class="text-center">Doctor SignUp</h3>
        <div class="mb-3">
            <label for="name">Name</label>
            <input placeholder="Type Your Name" required minlength="5" maxlength="35" type="name" name="name" id="name"
                class="form-control">
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input placeholder="Type Your Email" required type="email" name="email" id="email" class="form-control">
        </div>
        <div class="mb-3">
            <label for="password">Password</label>
            <input placeholder="Type Your Password" minlength="5" maxlength="35" type="password" name="password"
                id="password" class="form-control">
        </div>
        <div class="mb-3">
            <label for="phone">Phone</label>
            <input placeholder="Type Your Phone" required type="tel" name="phone" id="phone" class="form-control">
        </div>
        <div class="mb-3">
            <label for="photo">Photo</label>
            <input type="file" name="photo" required accept="image/*" id="photo" class="form-control">
        </div>
        <div class="mb-3">
            <label for="address">Address</label>
            <textarea placeholder="Type Your Address" required name="address" id="address"
                class="form-control"> </textarea>
        </div>
        <div class="mb-3">
            <label for="gender">Gender</label>
            <select class="form-control" required name="gender" id="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="department">Department</label>
            <input placeholder="Type Your Department" required type="text" name="department" id="department"
                class="form-control">
        </div>
        <div class="mb-3">
            <label for="documentation">Documentation</label>
            <input placeholder="Type Your documentation" required accept=".pdf,.doc,docx" type="file"
                name="documentation" id="documentation" class="form-control">
        </div>
        <div class="mb-3">
            <label for="experience">Experience</label>
            <select class="form-control" required name="experience" id="experience">
                <option value="1">1 Year Above</option>
                <option value="2">2 Years Above </option>
                <option value="3">3 Years Above </option>
                <option value="4">4 Years Above </option>
                <option value="5">5 Years Above </option>
            </select>
        </div>
        <div class="mb-3">
            <label for="position">Position</label>
            <input placeholder="Type Your Position" required type="text" name="position" id="position"
                class="form-control">
        </div>
        <div class="mb-3">
            <input type="submit" name="doctor_submit" class="btn btn-secondary">
        </div>
        <p>Already have an account? <a href="signin.php" class="btn btn-secondary btn-sm">SignIn</a></p>
    </form>
</div>
<?php
include("./partials/footer.php")
?>