<?php
session_start();
include("./database/db.php");
$admin = isset($_SESSION['auth']);
include("./partials/header.php");
include("./partials/navbar.php");
?>
<div class="container p-5">
    <div class="text-center mb-3">
        <h2>Doctor Gallery</h2>
    </div>
    <div class="row">
        <?php
        $sql = 'SELECT * FROM doctors';
        $statement = $pdo->query($sql);
        $doctors = $statement->fetchAll(PDO::FETCH_ASSOC);
        // print_r($doctors);
        // exit();
        foreach ($doctors as $key => $doc) :
        ?>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="card">
                    <img src="./photo/<?php echo $doc['photo'] ?>" alt="photo">
                    <div class="card-body">
                        <p class="card-title">Name :<?= $doc['name'] ?></p>
                        <p class="card-title">Phone :<?= $doc['phone'] ?></p>
                        <p class="card-title">Department :<?= $doc['department'] ?></p>

                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
<?php
include("./partials/footer.php")
?>