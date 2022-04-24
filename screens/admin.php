<?php include "include/header.php" ?>


<?php

if (isset($_COOKIE['email'])) {

    if ($_COOKIE['email'] == "admin@email.com") {
    } else {
        header("Location:admin.php");
    }
} else {
    header("Location:login.php");
}

// Admin Screen Logic
$sql = "SELECT * FROM Students ; ";
$result = mysqli_query($connection, $sql);
$students = mysqli_fetch_all($result, MYSQLI_ASSOC);

$id = 0 ; 





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

            <?php foreach ($students as $student): ?>
            <?php $id += 1 ; ?> 
            <tr>
                <th scope="row"><?php echo $id ?></th>
                <td><?php echo $student["fName"] ?></th>
                <td><?php echo $student["sName"] ?></th>
                <td><?php echo $student["lName"] ?></th>
                <td><?php echo $student["studentId"] ?></td>
                <td><?php echo $student["phoneNumber"] ?></td>
            </tr>
            
            <?php endforeach?>
        </tbody>


    </table>
</div>



<!-- Three Buttons  -->
<div class="section py-4">
    <div class="container">

        <div class="row text-center">
            <div class="col-sm py-3">
                <div class="card bg-dark text-light">
                    <div class="card-body text-center">
                        <h5 class="card-title">Add</h5>
                        <p class="card-text">Add Student To The Students Database</p>
                        <a href="addStudent.php">
                            <div class="btn btn-info">Click Here</div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-sm py-3">
                <div class="card bg-dark text-light">
                    <div class="card-body text-center">
                        <h5 class="card-title">Update</h5>
                        <p class="card-text">Update Student On The Students Database</p>
                        <a href="updateStudent.php">
                            <div class="btn btn-info">Click Here</div>
                        </a>
                    </div>
                </div>
            </div> 

            <div class="col-sm py-3">
                <div class="card bg-dark text-light">
                    <div class="card-body text-center">
                        <h5 class="card-title">Delete</h5>
                        <p class="card-text">Delete Student From The Student Database </p>
                        <a href="deleteStudent.php">
                            <div class="btn btn-info">Click Here</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>






    </div>
</div>



<?php include "include/footer.php" ?>