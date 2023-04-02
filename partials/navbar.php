      <nav class="navbar navbar-expand-lg navbar-dark px-2 px-lg-5">
          <div class="container-fluid">
              <a class="navbar-brand" href="index.php"><img src="./Images/Logo.png" width="60" alt=""></a>
              <button class="navbar-toggler text-bg-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="bi bi-list text-white py-4"></i>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                      </li>

                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Mentel Health
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="#">Depression</a></li>
                              <li><a class="dropdown-item" href="#">Anxiety</a></li>
                              <li><a class="dropdown-item" href="#">Bipolor</a></li>
                              <li><a class="dropdown-item" href="#">Adication </a></li>

                          </ul>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="#">Doctor Gallery</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="#article">Article</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="#contact-us">Contact Us</a>
                      </li>
                      <?php $auth = isset($_SESSION['auth']) ?>
                      <?php if ($auth) : ?>
                          <li class="nav-item">
                              <a class="nav-link" href="admin-login.php">Admin-Dashboard</a>
                          </li>
                      <?php endif; ?>

                  </ul>
                  <ul class="navbar-nav">
                      <?php $auth = isset($_SESSION['name']) ?>
                      <!-- <?= $_SESSION['user_id'] ?> -->
                      <?php if ($auth) : ?>
                          <?php $admin = $_SESSION['name'] ?>
                          <?php if ($admin == "admin") : ?>
                              <a href="admin/profile.php?id=<?php echo $_SESSION['admin_id'] ?>" class="btn btn-secondary text-white "><?= $admin ?></a>
                          <?php else : ?>
                              <a href="profile.php?id=<?php echo $_SESSION['user_id'] ?>" class="btn btn-secondary text-white "><?= $_SESSION['name'] ?></a>
                          <?php endif ?>
                          <a href="logout.php" class="btn btn-secondary text-white ">Logout</a>
                      <?php else : ?>
                          <a href="signin.php" class="btn btn-secondary text-white ">SignIn</a>
                      <?php endif; ?>

                  </ul>

              </div>
          </div>
      </nav>