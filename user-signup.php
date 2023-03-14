<?php
include("./partials/header.php");
// include("./partials/carousel.php");
?>

<div class="container p-5">

    <form action="" method="post" class="w-50 m-auto p-5 shadow-lg">
        <h3 class="text-center">SignUp</h3>
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
                <option value="male">Select Your Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="phone">Phone</label>
            <input placeholder="Type Your Phone" type="tel" name="phone" id="phone" class="form-control">
        </div>
        <div class="mb-3">
            <label for="address">Address</label>
            <textarea placeholder="Type Your Address" type="tel" name="address" id="address"
                class="form-control"> </textarea>
        </div>
        <div class="mb-3">
            <input type="submit" name="submit" class="btn btn-secondary">
        </div>

    </form>
</div>
<?php 
include("./partials/footer.php")
?>