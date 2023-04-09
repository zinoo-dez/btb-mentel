<?php
session_start();
include("./database/db.php");
include("./partials/header.php");
include("./partials/navbar.php");
$date = new Datetime('now');
$now = $date->format('Y-m-d H:i:s');
$auth = isset($_SESSION['name']);

if (isset($_POST['save'])) {
    $uid = $_POST['userid'];
    // echo $uid;
    $result_name = $_POST['result_name'];

    $sql = "INSERT INTO check_results (result_name,userid,created_date,updated_date) VALUES (:result_name,:userid,:created_date,:updated_date)";
    if ($stmt = $pdo->prepare($sql)) {

        $stmt->bindParam(":result_name", $result_name, PDO::PARAM_STR);
        $stmt->bindParam(":userid", $uid, PDO::PARAM_STR);
        $stmt->bindParam(":created_date", $now, PDO::PARAM_STR);
        $stmt->bindParam(":updated_date", $now, PDO::PARAM_STR);
        if ($stmt->execute()) {
            // Redirect to login page
            header("location: anxiety.php");
        } else {
            echo "something wrong!";
        }
    }
}
?>

<div class="container">
    <form action="" method="post">
        <h3 id="mental-health-result"></h3>

        <input type="hidden" id="result" name="result_name">
        <?php if ($auth) : ?>
            <input type="hidden" value="<?php echo $_SESSION["user_id"] ?>" name="userid">
        <?php endif ?>
        <input type="submit" id="hh" name="save" value="save" class="btn btn-info text-white">
    </form>
    <h1 class="mt-4">Anxiety Test</h1>
    <p>Over the last 2 weeks, how often have you been bothered by any of the following problems?</p>
    <p>Please note, all fields are required.</p>


    <form id="mental-health-form" onsubmit="return false;">
        <div class="mb-3">
            <h5 for="question1">1. How often have you been feeling down or depressed?</h5>
            <select id="question1" required class="form-control w-25" name="question1">
                <option value="0">Not at all</option>
                <option value="1">Several days</option>
                <option value="2">More than half the days</option>
                <option value="3">Nearly every day</option>
            </select>
        </div>

        <div class="mb-3">
            <h5 for="question2">2. How often have you been feeling nervous, anxious or on edge?</h5>
            <select id="question2" required class="form-control w-25" name="question2">
                <option value="0">Not at all</option>
                <option value="1">Several days</option>
                <option value="2">More than half the days</option>
                <option value="3">Nearly every day</option>
            </select>
        </div>

        <div class="mb-3">
            <h5 for="question3">3. How often have you been unable to stop worrying or control your
                worrying?</h5>
            <select id="question3" required class="form-control w-25" name="question3">
                <option value="0">Not at all</option>
                <option value="1">Several days</option>
                <option value="2">More than half the days</option>
                <option value="3">Nearly every day</option>
            </select>
        </div>

        <div class="mb-3">
            <h5 for="question4">4. I have been experiencing changes in my sleep pattern (e.g. trouble falling
                asleep, staying asleep, or sleeping too much) lately.</h5>
            <select id="question4" required class="form-control w-25" name="question3">
                <option value="0">Not at all</option>
                <option value="1">Several days</option>
                <option value="2">More than half the days</option>
                <option value="3">Nearly every day</option>
            </select>
        </div>
        <div class="mb-3">
            <h5 for="question5">5. I have been experiencing changes in my appetite or weight lately..</h5>
            <select id="question5" required class="form-control w-25" name="question3">
                <option value="0">Not at all</option>
                <option value="1">Several days</option>
                <option value="2">More than half the days</option>
                <option value="3">Nearly every day</option>
            </select>
        </div>
        <div class="mb-3">
            <h5 for="question6">6.I have been experiencing physical symptoms such as headaches, stomachaches, or
                other pains lately.</h5>
            <select id="question6" required class="form-control w-25" name="question3">
                <option value="0">Not at all</option>
                <option value="1">Several days</option>
                <option value="2">More than half the days</option>
                <option value="3">Nearly every day</option>
            </select>
        </div>
        <div class="mb-3">
            <h5 for="question7">7. I have had thoughts of harming myself or others lately.</h5>
            <select id="question7" required class="form-control w-25" name="question3">
                <option value="0">Not at all</option>
                <option value="1">Several days</option>
                <option value="2">More than half the days</option>
                <option value="3">Nearly every day</option>
            </select>
        </div>
        <div class="mb-3">
            <h5 for="question8">8.I have been feeling sad, down, or hopeless lately.</h5>
            <select id="question8" required class="form-control w-25" name="question3">
                <option value="0">Not at all</option>
                <option value="1">Several days</option>
                <option value="2">More than half the days</option>
                <option value="3">Nearly every day</option>
            </select>
        </div>
        <?php if ($auth) : ?>
            <button onclick="calculateMentalHealthScore()" class="btn btn-primary text-white btn-lg">Submit</button>
        <?php else : ?>
            <p class="text-warning">You Need to Login</p>
            <a href="signin.php" class="btn btn-warning">Login</a>
        <?php endif ?>
    </form>




    <script>
        function calculateMentalHealthScore() {
            const question1 = document.getElementById('question1').value;
            const question2 = document.getElementById('question2').value;
            const question3 = document.getElementById('question3').value;
            const totalScore = parseInt(question1) + parseInt(question2) + parseInt(question3);

            let result = '';

            if (totalScore >= 0 && totalScore <= 3) {
                result = 'You seem to be doing well mentally.';
            } else if (totalScore >= 4 && totalScore <= 6) {
                result =
                    'You may be experiencing some mild symptoms of anxiety or depression. Consider seeking professional help if these symptoms persist.';
            } else if (totalScore >= 7 && totalScore <= 8) {
                result =
                    'You may be experiencing moderate to severe symptoms of anxiety or depression. It is recommended that you seek professional help as soon as possible.';
            } else if (totalScore >= 8 && totalScore <= 9) {
                result =
                    ' You appear to be experiencing mild symptoms of depression or anxiety. It may be helpful to seek support from a mental health professional';
            } else if (totalScore >= 9 && totalScore <= 10) {
                result =
                    'You appear to be experiencing moderate symptoms of depression or anxiety. It is recommended that you seek support from a mental health professional';
            } else if (totalScore >= 10 && totalScore <= 11) {
                result =
                    'You appear to be experiencing moderate symptoms of depression or anxiety. It is recommended that you seek support from a mental health professional';
            }

            document.getElementById('mental-health-result').style.margin = "20px";
            document.getElementById('mental-health-result').style.padding = "20px";
            document.getElementById('mental-health-result').style.background = "lightgreen";
            document.getElementById('mental-health-result').style.color = "#fff";
            document.getElementById('mental-health-result').textContent = result;
            document.getElementById('hh').style.display = "block";
            document.getElementById('result').value = result;
        }
    </script>
</div>

<?php
include("./partials/footer.php")
?>