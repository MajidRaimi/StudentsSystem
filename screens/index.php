<?php include "include/header.php" ?>

<?php


if (isset($_COOKIE['email'])) {

    if ($_COOKIE['email'] == "admin@email.com") {
        header("Location:admin.php");
    }

    if ($_COOKIE['email'] == $_SESSION['email']) {
        // Index Screen Login 

        $sql = "SELECT * FROM Students ; ";
        $result = mysqli_query($connection, $sql);
        $students = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $id = 0;


        $file = "../assets/config/students.csv";

        if (file_exists($file)) {
            $handle = fopen($file, "w");

            $content = "";
            foreach ($students as $s) {
                $content = "$content" . $id + 1 . "," . $s['fName'] . "," . $s['sName'] . "," . $s["lName"] . "," . $s["studentId"] . "," . $s["phoneNumber"] . PHP_EOL;
            }
            fwrite($handle, $content);
            fclose($handle);
        }
    } else {
        header("Location:login.php");
    }
} else {
    header("Location:login.php");
}



?>














<div class="section w-100 text-center p-5">
    <table class="table table-striped centerTable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Second</th>
                <th scope="col">Last</th>
                <th scope="col">ID</th>
                <th scope="col">Phone Number</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($students as $student) : ?>
                <?php $id += 1; ?>
                <tr>
                    <th scope="row"><?php echo $id ?></th>
                    <td><?php echo $student["fName"] ?></th>
                    <td><?php echo $student["sName"] ?></th>
                    <td><?php echo $student["lName"] ?></th>
                    <td><?php echo $student["studentId"] ?></td>
                    <td><?php echo $student["phoneNumber"] ?></td>
                </tr>

            <?php endforeach ?>
        </tbody>


    </table>

    <a  href="../assets/config/students.csv" download = "Students">
        <div class="btn btn-dark">
            Download CSV
        </div>
    </a>



</div>
<?php include "include/footer.php" ?>