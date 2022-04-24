<?php include "include/header.php" ?>


<?php
$searched = false;


if (isset($_POST["submit"])) {
    $searched = true;
    $searchId = $_POST["studentId"];
    $_SESSION["searchId"] = $searchId;
    $sql = "SELECT * FROM Students WHERE studentId = '$searchId' ;  ";

    $result = mysqli_query($connection, $sql);
    $student = mysqli_fetch_all($result, MYSQLI_ASSOC);


    $firstName = $secondName = $lastName = $phoneNumber = "";

    foreach ($student as $s) {
        $firstName =  $s["fName"];
        $secondName = $s["sName"];
        $lastName = $s["lName"];
        $phoneNumber = $s["phoneNumber"];
    }
}

if (isset($_POST["update"])) {
    $fName = filter_input(INPUT_POST, "fName", FILTER_SANITIZE_SPECIAL_CHARS);
    $sName = filter_input(INPUT_POST, "sName", FILTER_SANITIZE_SPECIAL_CHARS);
    $lName = filter_input(INPUT_POST, "lName", FILTER_SANITIZE_SPECIAL_CHARS);
    $phoneNumber = filter_input(INPUT_POST, "phoneNumber", FILTER_SANITIZE_SPECIAL_CHARS);

    updateStudent();
}

function updateStudent()
{
    global $searchId,  $fName, $sName, $lName, $phoneNumber, $connection;

    $searchId = $_SESSION["searchId"];

    $sqlOne = "UPDATE Students SET fName = '$fName' WHERE studentId = '$searchId' ; ";
    $sqlTwo = "UPDATE Students SET sName = '$sName' WHERE studentId = '$searchId' ; ";
    $sqlThree = "UPDATE Students SET lName = '$lName' WHERE studentId = '$searchId' ; ";
    $sqlFour = "UPDATE Students SET phoneNumber = '$phoneNumber' WHERE studentId = '$searchId' ; ";

    mysqli_query($connection, $sqlOne);
    mysqli_query($connection, $sqlTwo);
    mysqli_query($connection, $sqlThree);
    mysqli_query($connection, $sqlFour);
}





?>


<div>
    <div class="card login align-items-center w-75 h-50 justify-content-center">

        <form action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="mt-4 w-75" method="POST">


            <?php if ($searched == false) : ?>
                <div class="mb-3">
                    <label for="studentId" class="form-label">Student ID</label>
                    <input type="number" class="form-control" id="studentId" name="studentId" placeholder="Enter Student's ID">
                </div>
                <div class="mb-3 justify-content-center">
                    <input type="submit" name="submit" value="Search For Student" class="btn btn-dark w-100 btn-primary">
                </div>
            <?php endif; ?>


            <?php if ($searched == true) : ?>
                <div class="mb-3">
                    <label for="name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="fName" name="fName" value="<?php echo $firstName ?>">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Second Name</label>
                    <input type="text" class="form-control" id="sName" name="sName" value="<?php echo $secondName ?>">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lName" name="lName" value="<?php echo $lastName ?>">
                </div>

                <div class="mb-3">
                    <label for="phoneNumber" class="form-label">Phone Number</label>
                    <input type="number" class="form-control" id="phoneNumber" name="phoneNumber" value="<?php echo $phoneNumber ?>">
                </div>
                <div class="mb-3 justify-content-center">
                    <input type="submit" name="update" value="Update Student" class="btn btn-dark w-100 btn-primary">
                </div>
            <?php endif; ?>

        </form>




    </div>
</div>





<?php include "include/footer.php" ?>