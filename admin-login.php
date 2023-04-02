<?php
session_start();
$auth = isset($_SESSION['auth']);
include("./database/db.php");
include("./partials/header.php");
include("./partials/navbar.php");
$errors = [];
if (isset($_POST['submit'])) {
    $email = trim($_POST['email']);
    $password = trim(md5($_POST['password']));
    empty($email) ? $errors[] = "email required" : "";
    if (count($errors) === 0) {
        $sql = "SELECT * FROM admin WHERE email = :email";
        if ($smpt = $pdo->prepare($sql)) {
            $smpt->bindParam(":email", $email, PDO::PARAM_STR);

            if ($smpt->execute()) {
                if ($smpt->rowCount() === 1) {
                    if ($row = $smpt->fetch()) {
                        $s_email = $row['email'];
                        $s_password = $row['password'];
                        if ($email === $s_email && $password === $s_password) {
                            $_SESSION["auth"] = "admin";
                            $_SESSION["name"] = $row['name'];
                            $_SESSION["admin_id"] = $row['admin_id'];
                            header("location:admin-dashboard.php");
                        } else {
                            $errors[] = "email and password do not match";
                        }
                    }
                }
            }
        }
    }
}

// include("./partials/carousel.php");
?>
<?php if (!$auth) : ?>
    <div class="container w-50 my-5 m-auto ">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="shadow-lg p-5 rounded">
            <?php include("./errors.php") ?>
            <h2 class="text-center">Admin Login</h2>
            <div class="mb-3">
                <label for="email">Admin Email</label>
                <input type="email" placeholder="Type Your Email" name="email" id="email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password">Admin Password</label>
                <input type="password" placeholder="Type Your Password" name="password" id="password" class="form-control">
            </div>
            <div class="mb-3">
                <input type="submit" name="submit" class="btn btn-secondary">
            </div>


        </form>

    </div>

<?php else : ?>
    <?php header("location:admin-dashboard.php") ?>
<?php endif ?>


<?php
include("./partials/footer.php")
?>