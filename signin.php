<?php
session_start();
include("./database/db.php");
include("./partials/header.php");
include("./partials/navbar.php");
$errors = [];
// user signin
if (isset($_POST['user-submit'])) {
    $email = trim($_POST['email']);
    $password = trim(md5($_POST['password']));
    empty($email) ? $errors[] = "email required" : "";
    if (count($errors) === 0) {
        $sql = "SELECT * FROM users WHERE email = :email";
        if ($smpt = $pdo->prepare($sql)) {
            $smpt->bindParam(":email", $email, PDO::PARAM_STR);
            if ($smpt->execute()) {
                if ($smpt->rowCount() === 1) {
                    if ($row = $smpt->fetch()) {
                        $s_email = $row['email'];
                        $s_password = $row['password'];
                        if ($email === $s_email && $password === $s_password) {
                            $_SESSION["loggedin"] = true;
                            $_SESSION["name"] = $row['name'];
                            $_SESSION["user_id"] = $row['user_id'];
                            header("location:index.php");
                        } else {
                            $errors[] = "email and password do not match";
                        }
                    }
                } else {
                    $errors[] = "email not exist!";
                }
            }
        }
    }
}

// doctor signin
if (isset($_POST['doctor-submit'])) {
    $email = trim($_POST['email']);
    $password = trim(md5($_POST['password']));
    empty($email) ? $errors[] = "email required" : "";
    if (count($errors) === 0) {
        $sql = "SELECT * FROM doctors WHERE email = :email";
        if ($smpt = $pdo->prepare($sql)) {
            $smpt->bindParam(":email", $email, PDO::PARAM_STR);

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
                } else {
                    $errors[] = "email not exist!";
                }
            }
        }
    }
}

?>
<div class="container my-5 rounded-lg p-5 w-50 m-auto p-5 shadow-lg">
    <ul class="nav nav-tabs pl-5" id="myTab" role="tablist">
        <li class="nav-item login" role="presentation">
            <button class="nav-link active fs-5" id="home-tab" data-bs-toggle="tab" data-bs-target="#user-tab-pane" type="button" role="tab" aria-controls="user-tab-pane" aria-selected="true">User SignIn</button>
        </li>
        <li class="nav-item login" role="presentation">
            <button class="nav-link fs-5" id="profile-tab" data-bs-toggle="tab" data-bs-target="#doctor-tab-pane" type="button" role="tab" aria-controls="doctor-tab-pane" aria-selected="false">Doctor SignIn</button>
        </li>


    </ul>
    <div class="tab-content  p-5" id="myTabContent">
        <?php include("./errors.php") ?>

        <!-- User Signin Form -->
        <div class="tab-pane fade show active" id="user-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="">
                <div class="mb-3">
                    <label for="email">User Email</label>
                    <input type="email" required minlength="4" maxlength="35" placeholder="Type Your Email" name="email" id="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="password">User Password</label>
                    <input type="password" required minlength="3" maxlength="35" placeholder="Type Your Password" name="password" id="password" class="form-control">
                </div>
                <div class="mb-3">
                    <input type="submit" name="user-submit" class="btn btn-secondary">
                </div>
                <span>You Don't have an account?</span>
                <button class="btn btn-secondary dropdown">
                    <span class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        SignUp
                    </span>
                    <ul class="dropdown-menu mt-3" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="user-signup.php">Normal User</a></li>
                        <li><a class="dropdown-item" href="doctor-signup.php">Doctor</a></li>
                    </ul>
                </button>

            </form>
        </div>
        <!-- Doctor Signin Form -->
        <div class="tab-pane fade" id="doctor-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="">

                <div class="mb-3">
                    <label for="email">Doctor Email</label>
                    <input type="email" required minlength="4" maxlength="35" placeholder="Type Your Email" name="email" id="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="password">Doctor Password</label>
                    <input type="password" required minlength="3" maxlength="35" placeholder="Type Your Password" name="password" id="password" class="form-control">
                </div>
                <div class="mb-3">
                    <input type="submit" name="doctor-submit" class="btn btn-secondary">
                </div>
                <span>You Don't have an account?</span>
                <button class="btn btn-secondary dropdown">
                    <span class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        SignUp
                    </span>
                    <ul class="dropdown-menu mt-3" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="user-signup.php">Normal User</a></li>
                        <li><a class="dropdown-item" href="doctor-signup.php">Doctor</a></li>
                    </ul>
                </button>

            </form>
        </div>


    </div>

</div>
<?php
include("./partials/footer.php")
?>