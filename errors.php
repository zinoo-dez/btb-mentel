  <?php
    if (count($errors) > 0) {
        foreach ($errors as $key => $err) {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <span class='text-danger'>$err</span>
               <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
             </div>";
        }
    }
    ?>