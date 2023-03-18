<?php

include("./database/db.php");
include("./partials/header.php");
include("./partials/navbar.php");
$doctor_id = $_GET['id'];
$sql = 'SELECT *
		FROM doctors
        WHERE doctor_id = :doctor_id';

$statement = $pdo->prepare($sql);
$statement->bindParam(':doctor_id', $doctor_id, PDO::PARAM_INT);
$statement->execute();
$doc = $statement->fetch(PDO::FETCH_ASSOC);
// print_r($doc);
// echo $user['name'];
// exit();
?>

<div class="container p-5">

    <form action="doctor-update.php" method="post" class="w-50 m-auto p-5 shadow-lg" enctype="multipart/form-data">

        <h3 class="text-center">Docotr Editing Form</h3>

        <input type="hidden" name="docid" value="<?php echo $doc['doctor_id'] ?>">
        <div class="mb-3">
            <label for="name">Name</label>
            <input placeholder="Type Your Name" value="<?= $doc['name'] ?>" minlength="4" required maxlength="35"
                type="name" name="name" id="name" class="form-control">
        </div>


        <div class="mb-3">
            <label for="gender">Gender</label>
            <select class="form-control" required name="gender" id="gender">
                <option value="male" <?php if ($doc['gender'] == "male") echo "selected"; ?>>Male</option>
                <option value="female" <?php if ($doc['gender'] == "female") echo "selected"; ?>>Female</option>

            </select>
        </div>
        <div class="mb-3">
            <label for="phone">Phone</label>
            <input placeholder="Type Your Phone" value="<?= $doc['phone'] ?>" required type="tel" name="phone"
                id="phone" class="form-control">
        </div>
        <div class="mb-3">
            <label for="address">Address</label>
            <textarea placeholder="Type Your Address" required type="tel" name="address" id="address"
                class="form-control"><?= $doc['address'] ?> </textarea>
        </div>
        <div class="mb-3">
            <label for="department">Department</label>
            <input placeholder="Type Your Department" value="<?= $doc['department'] ?>" required type="text"
                name="department" id="department" class="form-control">
        </div>
        <div class="mb-3">
            <label for="experience">Experience</label>
            <?php echo $doc['experience'] ?>

            <select class="form-control" id="experience" name="experience" id="experience">
                <option value="1" <?php if ($doc['experience'] == "1") echo "selected"; ?>>1 Years</option>
                <option value="2" <?php if ($doc['experience'] == "2") echo "selected"; ?>> 2 Years</option>
                <option value="3" <?php if ($doc['experience'] == "3") echo "selected"; ?>> 3 Years</option>
                <option value="4" <?php if ($doc['experience'] == "4") echo "selected"; ?>>4 Years</option>
                <option value="5" <?php if ($doc['experience'] == "5") echo "selected"; ?>>5 Years</option>
            </select>

        </div>
        <!-- photo edit -->
        <input hidden name="oldphoto" value="<?php echo $doc['photo'] ?>"> <?php echo $doc['photo'] ?></input>
        <div class="mb-3">
            <label for="photo">Photo</label><br>
            <input type="file" name="photo" accept="image/*" id="photo" class="form-control">

        </div>
        <!-- file edit -->
        <div class="mb-3">
            <label for="documentation">Documentation</label>
            <input hidden name="oldfile"
                value="<?php echo $doc['documentation'] ?>"><?php echo $doc['documentation'] ?></input>
            <input placeholder="Type Your documentation" accept=".pdf,.doc,docx" type="file" name="documentation"
                id="documentation" class="form-control">
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