<?php

include("./partials/header.php");
include("./partials/navbar.php");

// include("./partials/carousel.php");
?>
<div class="container my-5 rounded-lg p-5 w-50 m-auto p-5 shadow-lg">
    <ul class="nav nav-tabs pl-5" id="myTab" role="tablist">
        <li class="nav-item login" role="presentation">
            <button class="nav-link active fs-5" id="home-tab" data-bs-toggle="tab" data-bs-target="#user-tab-pane"
                type="button" role="tab" aria-controls="user-tab-pane" aria-selected="true">User SignIn</button>
        </li>
        <li class="nav-item login" role="presentation">
            <button class="nav-link fs-5" id="profile-tab" data-bs-toggle="tab" data-bs-target="#doctor-tab-pane"
                type="button" role="tab" aria-controls="doctor-tab-pane" aria-selected="false">Doctor SignIn</button>
        </li>


    </ul>
    <div class="tab-content  p-5" id="myTabContent">
        <div class="tab-pane fade show active" id="user-tab-pane" role="tabpanel" aria-labelledby="home-tab"
            tabindex="0">
            <form action="user-signin.php" method="post" class="">

                <div class="mb-3">
                    <label for="email">User Email</label>
                    <input type="email" placeholder="Type Your Email" name="email" id="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="password">User Password</label>
                    <input type="password" placeholder="Type Your Password" name="password" id="password"
                        class="form-control">
                </div>
                <div class="mb-3">
                    <input type="submit" name="submit" class="btn btn-secondary">
                </div>
                <span>You Don't have an account?</span>
                <button class="btn btn-secondary dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        SignUp
                    </a>
                    <ul class="dropdown-menu mt-3" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="user-signup.php">Normal User</a></li>
                        <li><a class="dropdown-item" href="doctor-signup.php">Doctor</a></li>
                    </ul>
                </button>

            </form>
        </div>
        <div class="tab-pane fade" id="doctor-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
            <form action="doctor-signin.php" method="post" class="">

                <div class="mb-3">
                    <label for="email">Doctor Email</label>
                    <input type="email" placeholder="Type Your Email" name="email" id="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="password">Doctor Password</label>
                    <input type="password" placeholder="Type Your Password" name="password" id="password"
                        class="form-control">
                </div>
                <div class="mb-3">
                    <input type="submit" name="submit" class="btn btn-secondary">
                </div>
                <span>You Don't have an account?</span>
                <button class="btn btn-secondary dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        SignUp
                    </a>
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