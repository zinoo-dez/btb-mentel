<?php
session_start();
include("./database/db.php");
include("./partials/header.php");
include("./partials/navbar.php");
$date = new Datetime('now');
$now = $date->format('Y-m-d H:i:s');
$errors = [];
if (isset($_POST['submit'])) {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $image = $_FILES['image'];
    $p_name = time() . $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmp_name, "images/$p_name");
    // print_r($photo);
    // die();
    empty($title) ? $errors[] = "title required" : "";
    empty($content) ? $errors[] = "content required" : "";
    if (count($errors) === 0) { {
            $sql = "INSERT INTO posts (title,content, image,created_date,updated_date) VALUES (:title,:content,:image,:created_date,:updated_date)";
            if ($stmt = $pdo->prepare($sql)) {
                $stmt->bindParam(":title", $title, PDO::PARAM_STR);
                $stmt->bindParam(":content", $content, PDO::PARAM_STR);
                $stmt->bindParam(":image", $p_name, PDO::PARAM_STR);
                $stmt->bindParam(":created_date", $now, PDO::PARAM_STR);
                $stmt->bindParam(":updated_date", $now, PDO::PARAM_STR);
                if ($stmt->execute()) {
                    // Redirect to login page
                    header("location: admin-dashboard.php");
                } else {
                    $errors[] =  "Oops! Something went wrong. db insert error!.";
                }
            }
        }
    } else {
        $errors[] = "Oops! Something went wrong. stmt error occur!.";
    }
}

?>
<main class="p-lg-5 p-2">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="w-50 rounded shadow p-5 m-auto" enctype="multipart/form-data">
        <h1 class="text-center">Create New Post</h1>
        <?php include("./errors.php") ?>
        <div class="mb-3">
            <label for="image">Image</label>
            <input type="file" name="image" required accept="image/*" id="image" class="form-control">
        </div>
        <div class="mb-3">
            <label for="title">Title</label>
            <input placeholder="Type Your title" type="title" required name="title" id="title" class="form-control">
        </div>
        <div class="mb-3">
            <label for="content">Content</label>
            <input placeholder="Type Your content" type="content" required name="content" id="content" class="form-control">
        </div>
        <div class="mb-3">
            <input type="submit" name="submit" class="btn btn-secondary">
        </div>
    </form>
</main>
<?php
include("./partials/footer.php")
?>