<?php include "include/header.php" ?>


<?php 

    if(isset($_GET["submit"])){
        $search = $_GET["studentId"];
        $sql = "DELETE FROM Students WHERE studentId = '$search' " ; 

        mysqli_query($connection , $sql);

    }

?>


<div class="card login align-items-center w-75 h-25 justify-content-center">

    <form action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="mt-4 w-75" method="GET">


        <div class="mb-3">
            <label for="studentId" class="form-label">Student ID</label>
            <input type="number" class="form-control" id="studentId" name="studentId" placeholder="Enter Student's ID">
        </div>
        <div class="mb-3 justify-content-center">
            <input type="submit" name="submit" value="Delete Student" class="btn btn-dark w-100 btn-primary">
        </div>
</div>
</form>



<?php include "include/footer.php" ?>