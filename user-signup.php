<?php
include("./database/db.php");
include("./partials/header.php");
include("./partials/navbar.php");
$date = new Datetime('now');
$errors = [];
// include("./partials/carousel.php");
if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = md5($_POST['password']);
    $age = trim($_POST['age']);
    $gender = trim($_POST['gender']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $photo = $_FILES['photo'];
    $p_name = time() . $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    move_uploaded_file($tmp_name, "photo/$p_name");
    // print_r($photo);
    // die();
    empty($name) ? $errors[] = "name required" : "";
    empty($email) ? $errors[] = "email required" : "";
    empty($age) ? $errors[] = "age required" : "";
    empty($gender) ? $errors[] = "gender required" : "";
    empty($phone) ? $errors[] = "phone required" : "";
    empty($address) ? $errors[] = "address required" : "";
    if (count($errors) === 0) {
        $sql = "SELECT * FROM users WHERE email = :email";
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
                    $errors[] = "This email is already taken.";
                } else {
                    $sql = "INSERT INTO users (name,email, password,age,gender,phone,photo,address,created_date,updated_date) VALUES (:name,:email, :password,:age,:gender,:phone,:photo,:address,:created_date,:updated_date)";
                    if ($stmt = $pdo->prepare($sql)) {
                        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
                        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
                        $stmt->bindParam(":password", $password, PDO::PARAM_STR);
                        $stmt->bindParam(":age", $age, PDO::PARAM_STR);
                        $stmt->bindParam(":gender", $gender, PDO::PARAM_STR);
                        $stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
                        $stmt->bindParam(":photo", $p_name, PDO::PARAM_STR);
                        $stmt->bindParam(":address", $address, PDO::PARAM_STR);
                        $stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
                        $stmt->bindParam(":created_date", $date->format('Y-m-d H:i:s'), PDO::PARAM_STR);
                        $stmt->bindParam(":updated_date", $date->format('Y-m-d H:i:s'), PDO::PARAM_STR);
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

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="w-50 m-auto p-5 shadow-lg" enctype="multipart/form-data">
        <?php include("./errors.php") ?>
        <h3 class="text-center">User SignUp</h3>
        <div class="mb-3">
            <label for="name">Name</label>
            <input placeholder="Type Your Name" type="name" name="name" id="name" class="form-control">
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input placeholder="Type Your Email" type="email" name="email" id="email" class="form-control">
        </div>
        <div class="mb-3">
            <label for="password">Password</label>
            <input placeholder="Type Your Password" type="password" name="password" id="password" class="form-control">
        </div>
        <div class="mb-3">
            <label for="age">Age</label>
            <input placeholder="Type Your Age" type="number" name="age" id="age" class="form-control">
        </div>
        <div class="mb-3">
            <label for="gender">Gender</label>
            <select class="form-control" name="gender" id="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="phone">Phone</label>
            <input placeholder="Type Your Phone" type="tel" name="phone" id="phone" class="form-control">
        </div>
        <div class="mb-3">
            <label for="photo">Photo</label>
            <input type="file" name="photo" accept="image/*" id="photo" class="form-control">
        </div>
        <div class="mb-3">
            <label for="address">Address</label>
            <textarea placeholder="Type Your Address" type="tel" name="address" id="address" class="form-control"> </textarea>
        </div>
        <div class="mb-3">
            <input type="submit" name="submit" class="btn btn-secondary">
        </div>
        <p>Already have an account? <a href="signin.php" class="btn btn-secondary btn-sm">SignIn</a></p>
    </form>

</div>
<?php
include("./partials/footer.php");
?>