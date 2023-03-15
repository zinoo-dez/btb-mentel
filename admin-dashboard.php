<?php
include("./partials/header.php");
?>
<div class="container">
    <div class="row">
        <div class="col-lg-2">
            <a href="#">
                <img src="./Images/Logo.png" width="70" alt="logo">
            </a>
            <ul class="list-group">
                <li class="list-group-item active" aria-current="true"> <a href="#"><i class="bi bi-house"></i>
                        Home</a>
                </li>
                <li class="list-group-item"><a href="#doctor"><i class="bi bi-thermometer-high"></i> Doctor</a></li>
                <li class="list-group-item"><a href="#user"><i class="bi bi-people"></i> User</a></li>

            </ul>
        </div>
        <div class="col-lg-10">
            <section id="doctor" class="my-5">
                <h1>Doctor</h1>
                <table class="table table-secondary table-striped table-hover table-bordered table-sm table-responsive-sm">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <!-- <th scope="col"></th> -->
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"></th>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>

            </section>
            <section id="user" class="mt-5">
                <h1>User</h1>

            </section>
        </div>
    </div>
</div>
<?php
include("./partials/footer.php");
?>