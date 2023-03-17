<?php
session_start();
include("./database/db.php");
$admin = isset($_SESSION['auth']);
include("./partials/header.php");
?>
<?php if ($admin) : ?>

<div class="container-xxl">
    <div class="row">
        <div class="col-lg-2">
            <a href="index.php">
                <img src="./Images/Logo.png" width="70" alt="logo">
            </a>
            <ul class="list-group">
                <li class="list-group-item active" aria-current="true"> <a href="index.php"><i class="bi bi-house"></i>
                        Home</a>
                </li>
                <li class="list-group-item"><a href="#doctor"><i class="bi bi-thermometer-high"></i> Doctor</a></li>
                <li class="list-group-item"><a href="#user"><i class="bi bi-people"></i> User</a></li>

            </ul>
        </div>
        <div class="col-lg-10">
            <!-- Doctor section start -->

            <section id="doctor" class="my-5">
                <h3>Doctor</h3>
                <div class="table-responsive">
                    <table
                        class="table table-secondary table-striped table-hover table-bordered table-sm table-responsive-sm">
                        <thead>
                            <tr class="text-center align-middle">
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Address</th>
                                <th scope="col">Documentation</th>
                                <th scope="col">Experience</th>
                                <th scope="col" colspan="2">Changes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = 'SELECT * FROM doctors';
                                $statement = $pdo->query($sql);
                                $doctors = $statement->fetchAll(PDO::FETCH_ASSOC);
                                // print_r($doctors);
                                // exit();
                                foreach ($doctors as $key => $doc) :
                                ?>

                            <tr class="text-center align-middle">
                                <th scope="row"> <?= ++$key ?></th>
                                <td>
                                    <img src="./photo/<?php echo $doc['photo'] ?>" class="mr-2" width="40" alt="photo">
                                    <?= $doc['name'] ?>
                                </td>
                                <td> <?= $doc['phone'] ?></td>
                                <td><?= $doc['address'] ?></td>
                                <td><a href="files/<?= $doc['documentation'] ?>"> <?= $doc['documentation'] ?></a></td>
                                <td><?= $doc['experience'] ?> Years</td>
                                <td><a href="doctor-edit.php">
                                        <div class="btn btn-sm btn-warning">Edit</div>
                                    </a></td>
                                <td><a href="doctor-del.php">
                                        <div class="btn btn-sm btn-danger doctor-del-btn"
                                            title="<?= $doc['doctor_id'] ?>" id="<?php echo $doc['doctor_id'] ?>">Delete
                                        </div>
                                    </a></td>
                            </tr>
                            <?php endforeach ?>


                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Doctor section end -->
            <!-- User section start -->

            <section id="user" class="mt-5">
                <h3>User</h3>
                <div class="table-responsive">
                    <table
                        class="table table-secondary table-striped table-hover table-bordered table-sm table-responsive-sm">
                        <thead>
                            <tr class="text-center align-middle">
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Age</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Address</th>
                                <th scope="col" colspan="2">Changes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = 'SELECT * FROM users';
                                $statement = $pdo->query($sql);
                                $users = $statement->fetchAll(PDO::FETCH_ASSOC);
                                // print_r($users);
                                // exit();
                                foreach ($users as $key => $user) :
                                ?>

                            <tr class="text-center align-middle">
                                <th scope="row"> <?= ++$key ?></th>
                                <td>
                                    <img src="./photo/<?php echo $user['photo'] ?>" class="mr-2" width="40" alt="photo">
                                    <?= $user['name'] ?>
                                </td>
                                <td> <?= $user['email'] ?></td>
                                <td> <?= $user['phone'] ?></td>
                                <td> <?= $user['age'] ?></td>
                                <td> <?= $user['gender'] ?></td>

                                <td><a href="files/<?= $user['address'] ?>"> <?= $user['address'] ?></a></td>

                                <td><a href="">
                                        <div class="btn btn-sm btn-warning">Edit</div>
                                    </a></td>
                                <td><a href="user-del.php">
                                        <div class="btn btn-sm btn-danger user-del-btn" title="<?= $user['user_id'] ?>"
                                            id="<?php echo $user['user_id'] ?>">Delete</div>
                                    </a></td>


                            </tr>
                            <?php endforeach ?>


                        </tbody>


                    </table>

                </div>
            </section>
            <!-- User section end -->
        </div>
    </div>
</div>
<?php else : ?>
<?php header('location:index.php') ?>
<?php endif ?>
<?php
include("./partials/footer.php");
?>
<script>

</script>