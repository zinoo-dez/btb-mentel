<?php

include("./database/db.php");
include("./partials/header.php");
include("./partials/navbar.php");
$user_id = $_GET['id'];
$sql = 'SELECT *
		FROM users
        WHERE user_id = :user_id';

$statement = $pdo->prepare($sql);
$statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$statement->execute();
$user = $statement->fetch(PDO::FETCH_ASSOC);
// echo $user['name'];
// exit();
?>

<div class="container p-5">

    <form action="user-update.php" method="post" class="w-50 m-auto p-5 shadow-lg" enctype="multipart/form-data">

        <h3 class="text-center">User Editing Form</h3>

        <input type="hidden" name="user_id" value="<?php echo $user['user_id'] ?>">
        <div class="mb-3">
            <label for="name">Name</label>
            <input placeholder="Type Your Name" value="<?= $user['name'] ?>" minlength="4" required maxlength="35"
                type="name" name="name" id="name" class="form-control">
        </div>


        <div class="mb-3">
            <label for="age">Age</label>
            <input placeholder="Type Your Age" value="<?= $user['age'] ?>" type="number" required name="age" id="age"
                class="form-control">
        </div>
        <div class="mb-3">
            <label for="gender">Gender</label>
            <select class="form-control" required name="gender" id="gender">
                <?php if ($user['gender'] === "male") : ?>
                <option value="male" selected>Male</option>
                <option value="female">Female</option>
                <?php else : ?>
                <option value="male">male</option>
                <option value="female" selected>Female</option>
                <?php endif ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="phone">Phone</label>
            <input placeholder="Type Your Phone" value="<?= $user['phone'] ?>" required type="tel" name="phone"
                id="phone" class="form-control">
        </div>
        <input hidden name="oldphoto" value="<?php echo $user['photo'] ?>"> <?php echo $user['photo'] ?></input>
        <div class="mb-3">
            <label for="photo">Photo</label><br>
            <input type="file" name="photo" accept="image/*" id="photo" class="form-control">

        </div>
        <div class="mb-3">
            <label for="address">Address</label>
            <textarea placeholder="Type Your Address" required type="tel" name="address" id="address"
                class="form-control"><?= $user['address'] ?> </textarea>
        </div>
        <div class="mb-3">
            <input type="submit" name="submit" class="btn btn-secondary">
        </div>
        <!-- <p>Already have an account? <a href="signin.php" class="btn btn-secondary btn-sm">SignIn</a></p> -->
    </form>

</div>
<?php
include("./partials/footer.php");
?>
<script>

</script>