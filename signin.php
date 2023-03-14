<?php
include("./partials/header.php");
// include("./partials/carousel.php");
?>
<div class="container p-5">

    <form action="" method="post" class="w-50 m-auto p-5 shadow-lg">
        <h3 class="text-center">SignIn</h3>

        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="mb-3">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="mb-3">
            <input type="submit" name="submit" class="btn btn-secondary">
        </div>

    </form>
</div>
<?php 
include("./partials/footer.php")
?>